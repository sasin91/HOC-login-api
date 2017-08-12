<?php

namespace App;

use App\Server;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
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
        'photo_url'
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
    }

    /**
     * Get the profile photo URL attribute.
     *
     * @param  string|null  $value
     * @return string|null
     */
    public function getPhotoUrlAttribute($value)
    {
        if (empty($value)) {
            return url('avatars/Random_Normal.png');
        }

        return url("avatars/{$value}");
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function servers()
    {
        return $this->belongsToMany(Server::class, 'players');
    }
}
