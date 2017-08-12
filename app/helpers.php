<?php

use Carbon\Carbon;

if (!function_exists('is_email')) {
    /**
     * Determines whether an email was given.
     *
     * @param  mixed $email
     * @return boolean
     */
    function is_email($email)
    {
        return is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

if (!function_exists('liveDebug')) {
    function liveDebug($object = null)
    {
        $object = $object ?? $this;

        return eval('extract(\Psy\debug(get_defined_vars(), isset($object) ? $object : null));');
    }
}

if (!function_exists('now')) {
	/**
	 * Return a Carbon instance for now.
	 *
	 * @param string | \DateTimeZone $timezone
	 *
	 * @return \Carbon\Carbon
	 */
	function now($timezone = null)
	{
		return Carbon::now($timezone);
	}
}
