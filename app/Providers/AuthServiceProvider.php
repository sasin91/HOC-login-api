<?php

namespace App\Providers;

use App\{Player, Server};
use App\Policies\{ServerPolicy, PlayerPolicy};

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
        Player::class => PlayerPolicy::class,
        Server::class => ServerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('list players on server', function ($user, $server) {
            return $user->hasRole('Admin')
            || $user->players()->whereHas('server', function ($query) use($server) {
                return $query->where('server_id', $server->id);
            });
        });

        Passport::routes();
    }
}
