<?php declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Helper functions
|--------------------------------------------------------------------------
*/

/**
 * Dump variable.
 */
if ( ! function_exists('d') ) {
    function d() {
        call_user_func_array('dump' , func_get_args() );
    }
}
