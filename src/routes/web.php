<?php

use Illuminate\Support\Facades\Route;

Route::get('visitors', function () {
    return view('visitor-info::deneme');
});
