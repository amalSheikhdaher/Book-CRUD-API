<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * BookController Routes
 * 
 * Routes for managing books
 * books API resource routing for standard actions (index, show, store, update, destroy).
 */
Route::apiResource('/books', BookController::class);
