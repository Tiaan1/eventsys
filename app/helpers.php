<?php

use Illuminate\Support\Facades\Auth;

function isActive($route, $recurrence = false)
{
    $request = str_replace('.', '/', $route);

    if (Request::is($request))
        return 'active';

    if ($recurrence) {
        if (Request::is($request . '/*'))
            return 'active';
    }

    return '';
}

function getUser(){
    if (Auth::check()){
        return auth()->user();
    }
};