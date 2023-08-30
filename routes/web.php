<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MigrateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/run_migrate', [MigrateController::class, 'runMigrate']);

Route::get('/', function () {
    return view('welcome');
});
