<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Antvel\Address')->middleware('auth')->group(function ($router) {
    $router->resource('address', 'AddressController');
    $router->post('address/default', 'AddressController@setDefault')->name('address.default');
});
