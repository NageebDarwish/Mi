<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImagesController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/user/edit', [AuthController::class, 'edituser']);

    // HomePage
    Route::post('/home', [HomePageController::class, 'update']);

    // Services Page

    Route::prefix('/services')->controller(ServiceController::class)->group(function () {
        Route::post('/', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    // Gallery
    Route::prefix('/gallery')->controller(GalleryController::class)->group(function () {
        Route::post('/', 'store');
        Route::post('/update/{id}', 'update');

        Route::delete('/{id}', 'destroy');
    });
    Route::post('gallery-img/{id}', [GalleryImagesController::class, 'update']);
    Route::delete('gallery-img/{id}', [GalleryImagesController::class, 'destroy']);
});
// Public Routes


// Auth
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'Login']);


// Services
Route::get('/home', [HomePageController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::post('/services/best', [ServiceController::class, 'bestServices']);
Route::post('/services/unbest', [ServiceController::class, 'unbestservices']);

// Gallery

Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery-img/{id}', [GalleryImagesController::class, 'show']);
