<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('currentRouteActive')) {
    function currentRouteActive(...$routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteNamed($route)) return 'active';
        }
    }
}

if (!function_exists('currentChildActive')) {
    function currentChildActive($children)
    {
        foreach ($children as $child) {
            if (Route::currentRouteNamed($child['route'])) return 'active';
        }
    }
}
/*
if (!function_exists('menuOpen')) {
    function menuOpen($children)
    {
        foreach ($children as $child) {
            if (Route::currentRouteNamed($child['route'])) return 'menu-open';
        }
    }
} */
