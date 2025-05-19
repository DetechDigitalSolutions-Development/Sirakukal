<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\SiteSetting;

if (!function_exists('is_join_form_enabled')) {
    function is_join_form_enabled()
    {
        return SiteSetting::where('key', 'join_form_enabled')->value('value'); // returns the value directly
    }
}

if (!function_exists('greet')) {
    function greet($name = 'Guest') {
        return "Hello, {$name}!";
    }
}
