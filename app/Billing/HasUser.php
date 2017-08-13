<?php

namespace App\Billing;

use Illuminate\Contracts\Auth\Authenticatable;

trait HasUser
{
    /**
     * @var \App\User|null
     */
    protected $user;

    /**
     * @throws \RuntimeException
     * @return \App\User
     */
    public function user()
    {
        if (is_null($this->user)) {
            throw GatewayException::missingUser();
        }

        return $this->user;
    }

    /**
     * @param Authenticatable|null $user
     * @return $this
     */
    public function withUser(Authenticatable $user = null)
    {
        $this->user = $user;
        return $this;
    }
}
