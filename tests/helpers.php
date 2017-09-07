<?php

/**
 * Create a saved model.
 *
 * @param string $class
 * @param array $attributes
 * @param integer $times
 * @return \Illuminate\Database\Eloquent\Model
 */
function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

/**
 * make a unsaved model.
 *
 * @param string $class
 * @param array $attributes
 * @param integer $times
 * @return \Illuminate\Database\Eloquent\Model
 */
function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}