<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\DispositivoController;
use App\Http\Controllers\API\SalaController;
use App\Http\Controllers\API\PermisoController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\API\InformeAnomaliaController;
use App\Http\Controllers\API\OrdenReparacionController;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::Resource('dispositivos', DispositivoController::class);
    Route::Resource('salas', SalaController::class);
    Route::Resource('permisos', PermisoController::class);
    Route::Resource('roles', RolController::class);
    Route::Resource('informe_anomalia', InformeAnomaliaController::class);
    Route::Resource('orden_reparacion', OrdenReparacionController::class);
});


