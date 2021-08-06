<?php

use Illuminate\Support\Facades\Route;

if(!function_exists('page_title')) {
    function page_title($title) {
        $base_title = config('app.name') ;
        return empty($title) ? $base_title : $title .' | '. $base_title;
    }
}

if (!function_exists('page_active')) {
    function page_active($route) {
        return Route::is($route) ? 'active' : '';
    }
}

