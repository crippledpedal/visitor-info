<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Mezbilisim\VisitorInfo\Http\Controller'], function () {
    Route::get('visitors', 'VisitorInfoController@index')->name('visitors');
    Route::post('visitors', 'VisitorInfoController@download')->name('visitors');
});
