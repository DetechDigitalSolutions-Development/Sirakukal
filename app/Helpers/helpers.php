<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\SiteSetting;


if (!function_exists('is_join_form_enabled')) {
    function is_join_form_enabled()
    {
        $value = SiteSetting::where('key', 'join_form_enabled')->value('value');

        return !empty($value) ? $value : 'false';
    }
}
if (!function_exists('whatsapp_number')) {
    function whatsapp_number()
    {
        $value = SiteSetting::where('key', 'whatsapp_number')->value('value');

        return !empty($value) ? $value : "+94123456789";
    }
}

if (!function_exists('greet')) {
    function greet($name = 'Guest') {
        return "Hello, {$name}!";
    }
}
