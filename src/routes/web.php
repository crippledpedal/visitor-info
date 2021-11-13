<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Mezbilisim\VisitorInfo\Http\Controller'], function () {
    Route::get('visitors', 'VisitorInfoController@index');
});
