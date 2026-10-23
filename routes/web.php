<?php

use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('aprendices.index');
});

Route::resource('aprendices', AprendizController::class);