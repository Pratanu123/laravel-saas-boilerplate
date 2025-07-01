<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crash', function () {
    abort(500, 'Intentional crash for test');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Test route is working!']);
});
