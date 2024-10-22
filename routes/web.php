<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('plantilla.app');
});



Route::resource('evento', EventoController::class);