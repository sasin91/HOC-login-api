<?php

namespace App;

class Fluent extends \Illuminate\Support\Fluent
{
    /**
     * Tap the current instance.
     *
     * @param \Closure $callback
     * @return mixed
     */
    public function tap($callback = null)
    {
        return tap($this, $callback);
    }
}
