<?php

use Illuminate\Support\Facades\Gate;
use \Illuminate\Support\Str;

if (!function_exists('get_permission_name')) {
    function get_permission_name(string $modelName, string $permission): string
    {
        $modelName = explode("\\", $modelName);
        $modelName = $modelName[count($modelName) - 1];
        $modelName = Str::plural(Str::lower($modelName));

        return $modelName . "." . $permission;
    }
}

if (!function_exists('validate_permission')) {
    function validate_permission(string $permission)
    {
        if (auth()->user()->email != config('starter.super_admin_email')) {
            abort_if(Gate::denies($permission), 403);
        }
    }
}

if (!function_exists('only_dev_env')) {
    function allow_only_dev_env()
    {
        $possibleEnvs = ['local', 'dev', 'development']; // TODO: Move to starter.php
        abort_if(!in_array(config('app.env'), $possibleEnvs), 403);
    }
}
