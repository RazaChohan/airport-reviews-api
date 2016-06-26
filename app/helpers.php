<?php

if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
    /**
     * Check if given string is null or empty.
     *
     * @param  string $string
     * @return bool
     */
    function IsNullOrEmptyString($string){
        return (!isset($string) && trim($string)=='');
    }
}