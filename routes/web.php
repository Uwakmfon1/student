<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['name'=>'john doe'];
});
