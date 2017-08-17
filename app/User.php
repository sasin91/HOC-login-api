<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use App\Server;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App
 *
 * @method static Collection onlyOnline()
 */
class User extends Authenticatable
{
    use HasRoles, HasApiTokens, Notifiable, Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'online',
        'photo_path'
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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->assignRole('User');
        });

        static::saving(function ($user) {
            if ($user->isDirty('photo_path')) {
                ScrapOldPhoto::dispatch($user);
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
