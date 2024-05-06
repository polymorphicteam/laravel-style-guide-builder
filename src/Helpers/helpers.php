<?php

if (!function_exists('styleguide_assets')) {
    function styleguide_assets($path, $secure = null)
    {
        $base = '/vendor/cswiley/styleguide/assets';
        return asset($base . '/' . $path, $secure);
    }
}
