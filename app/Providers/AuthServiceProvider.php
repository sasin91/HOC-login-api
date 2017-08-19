<?php

namespace App\Providers;

use App\Player;
use App\Server;
use App\Thread;
use App\Reply;
use App\Channel;
use App\Board;
use App\User;

use App\Policies\ServerPolicy;
use App\Policies\PlayerPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\ReplyPolicy;
use App\Policies\ChannelPolicy;
use App\Policies\BoardPolicy;
use App\Policies\UserPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Player::class  => PlayerPolicy::class,
        Server::class  => ServerPolicy::class,
        Thread::class  => ThreadPolicy::class,
        Reply::class   => ReplyPolicy::class,
        User::class    => UserPolicy::class,
        Channel::class => ChannelPolicy::class,
        Board::class   => BoardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('upload channel cover', function ($user, $channel) {
            return $user->hasRole('Admin') || $channel->creator->is($user);
        });

        Gate::define('list players on server', function ($user, $server) {
            return $user->hasRole('Admin')
            || $user->players()->whereHas('server', function ($query) use($server) {
                return $query->where('server_id', $server->id);
            });
        });

        Passport::routes();
    }
}
