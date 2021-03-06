<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App
 *
 * @method static Collection onlyOnline()
 */
class User extends Authenticatable
{
    use HasPurchases, HasRoles, HasApiTokens, Notifiable, Friendable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'online',
        'photo_path',
        'password',
        'verification_token',
        'verified_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * @inheritdoc
     */
    protected $appends = ['token'];

    /**
     * @inheritdoc
     */
    protected $dates = ['verified_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('withRoles', function ($query) {
            $query->with('roles');
        });

        static::creating(function ($user) {
            $user->verification_token = EmailVerification::token();
        });

        static::created(function ($user) {
            $user->assignRole('User');
        });

        static::saving(function ($user) {
            if ($user->isDirty('photo_path')) {
                ScrapOldPhoto::dispatch($user, 'avatars');
            }
        });
    }

    /**
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        if ($value = $this->photo_path) {
            return url("{$value}");
        }

        return url('avatars/Random_Normal.png');
    }

    public function getTokenAttribute()
    {
        return $this->token();
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function servers()
    {
        return $this->belongsToMany(Server::class, 'players');
    }

    /**
     * Fetch all threads that were created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    /**
     * Fetch the last published reply for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    /**
     * Get all activity for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
