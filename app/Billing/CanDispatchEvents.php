<?php

namespace App\Billing;

use Illuminate\Contracts\Events\Dispatcher;

trait CanDispatchEvents
{
    /**
     * The event dispatcher instance.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected static $dispatcher;

    /**
     * Array of Gateway specific events
     *
     * @var array
     */
    protected $events = [];

    /**
     * Register a charging PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function charging($callback, $priority = 0)
    {
        static::registerGatewayEvent('charging', $callback, $priority);
    }
    
    /**
     * Register a Gateway event with the dispatcher.
     *
     * @param  string          $event
     * @param  \Closure|string $callback
     * @param  int             $priority
     * @return void
     */
    protected static function registerGatewayEvent($event, $callback, $priority = 0)
    {
        if (isset(static::$dispatcher)) {
            $name = static::class;
            
            static::$dispatcher->listen("billing.gateway.{$event}: {$name}", $callback, $priority);
        }
    }

    /**
     * Register a charged PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function charged($callback, $priority = 0)
    {
        static::registerGatewayEvent('charged', $callback, $priority);
    }

    /**
     * Register a refunding PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function refunding($callback, $priority = 0)
    {
        static::registerGatewayEvent('refunding', $callback, $priority);
    }

    /**
     * Register a refunded PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function refunded($callback, $priority = 0)
    {
        static::registerGatewayEvent('refunded', $callback, $priority);
    }

    /**
     * Register a invoicing PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function invoicing($callback, $priority = 0)
    {
        static::registerGatewayEvent('invoicing', $callback, $priority);
    }

    /**
     * Register a invoiced PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function invoiced($callback, $priority = 0)
    {
        static::registerGatewayEvent('invoiced', $callback, $priority);
    }

    /**
     * Register a subscribing PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function subscribing($callback, $priority = 0)
    {
        static::registerGatewayEvent('subscribing', $callback, $priority);
    }

    /**
     * Register a subscribed PaymentGateway event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @param  int $priority
     * @return void
     */
    public static function subscribed($callback, $priority = 0)
    {
        static::registerGatewayEvent('subscribed', $callback, $priority);
    }

    /**
     * Remove all of the event listeners for the model.
     *
     * @return void
     */
    public static function flushEventListeners()
    {
        if (!isset(static::$dispatcher)) {
            return;
        }

        $instance = new static;

        foreach ($instance->getEvents() as $event) {
            static::$dispatcher->forget("billing.gateway.{$event}: " . static::class);
        }
    }

    /**
     * Get the Gateway Event names
     *
     * @return array
     */
    public function getEvents()
    {
        return array_merge([
            'charging','charged',
            'refunding','refunded',
            'invoicing', 'invoiced',
            'subscribing', 'subscribed'
        ], $this->events);
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $dispatcher
     * @return void
     */
    public static function setEventDispatcher(Dispatcher $dispatcher)
    {
        static::$dispatcher = $dispatcher;
    }
    
    /**
     * Unset the event dispatcher for models.
     *
     * @return void
     */
    public static function unsetEventDispatcher()
    {
        static::$dispatcher = null;
    }

    /**
     * Fire the given event for the gateway.
     *
     * @param  string  $event
     * @param  bool  $halt
     * @return mixed
     */
    protected function fireGatewayEvent($event, $halt = true)
    {
        if (! isset(static::$dispatcher)) {
            return true;
        }

        // We will append the names of the class to the event to distinguish it from
        // other model events that are fired, allowing us to listen on each gateway
        // event set individually instead of catching event for all the gateways.
        $event = "billing.gateway.{$event}: ".static::class;

        $method = $halt ? 'until' : 'fire';

        return static::$dispatcher->$method($event, $this);
    }
}
