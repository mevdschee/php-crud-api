<?php

/**
 * Declarations of the Wordpress functions that the "wpAuth" middleware calls.
 *
 * This file is never loaded, the middleware loads "wp-load.php" and Wordpress
 * provides the real implementations. It only exists so that PHPStan knows the
 * functions, see the "scanFiles" section in "phpstan.neon".
 */

/**
 * @param array<string,mixed> $credentials
 * @return object
 */
function wp_signon($credentials)
{
}

/**
 * @return bool
 */
function is_user_logged_in()
{
}

/**
 * @return void
 */
function wp_logout()
{
}

/**
 * @return object
 */
function wp_get_current_user()
{
}
