<?php

use App\Http\Controllers\DeleteCompanyController;
use App\Http\Controllers\DeleteConsoleController;
use App\Http\Controllers\DeleteGameController;
use App\Http\Controllers\DeleteGenreController;
use App\Http\Controllers\DeletePublisherController;
use App\Http\Controllers\IndexCompanyController;
use App\Http\Controllers\IndexConsoleController;
use App\Http\Controllers\IndexGameController;
use App\Http\Controllers\IndexGenreController;
use App\Http\Controllers\IndexPublisherController;
use App\Http\Controllers\StoreCompanyController;
use App\Http\Controllers\StoreConsoleController;
use App\Http\Controllers\StoreGameController;
use App\Http\Controllers\StoreGenreController;
use App\Http\Controllers\StorePublisherController;
use App\Http\Controllers\UpdateCompanyController;
use App\Http\Controllers\UpdateConsoleController;
use App\Http\Controllers\UpdateGameController;
use App\Http\Controllers\UpdateGenreController;
use App\Http\Controllers\UpdatePublisherController;
use App\Http\Controllers\ViewCompanyController;
use App\Http\Controllers\ViewConsoleController;
use App\Http\Controllers\ViewGameByConsoleController;
use App\Http\Controllers\ViewConsoleByCompanyController;
use App\Http\Controllers\ViewGameByPublisherController;
use App\Http\Controllers\ViewGameController;
use App\Http\Controllers\ViewGenreController;
use App\Http\Controllers\ViewPublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('games')->group(function () {
    Route::get('/', IndexGameController::class);
    Route::get('/{game}', ViewGameController::class);
    Route::post('/', StoreGameController::class);
    Route::patch('/{game}', UpdateGameController::class);
    Route::delete('/{game}', DeleteGameController::class);
    Route::get('/publishers/{publisher}', ViewGameByPublisherController::class);
});


Route::prefix('consoles')->group(function () {
    Route::get('/', IndexConsoleController::class);
    Route::get('/{console}', ViewConsoleController::class);
    Route::post('/', StoreConsoleController::class);
    Route::patch('/{console}', UpdateConsoleController::class);
    Route::delete('/{console}', DeleteConsoleController::class);
    Route::get('/companies/{company}', ViewConsoleByCompanyController::class);
    Route::get('/{console}/games', ViewGameByConsoleController::class);
});

Route::prefix('companies')->group(function () {
    Route::get('/', IndexCompanyController::class);
    Route::get('/{company}', ViewCompanyController::class);
    Route::post('/', StoreCompanyController::class);
    Route::patch('/{company}', UpdateCompanyController::class);
    Route::delete('/{company}', DeleteCompanyController::class);
});

Route::prefix('publishers')->group(function () {
    Route::get('/', IndexPublisherController::class);
    Route::get('/{publisher}', ViewPublisherController::class);
    Route::post('/', StorePublisherController::class);
    Route::patch('/{publisher}', UpdatePublisherController::class);
    Route::delete('/{publisher}', DeletePublisherController::class);
});

Route::prefix('genres')->group(function () {
    Route::get('/', IndexGenreController::class);
    Route::get('/{genre}', ViewGenreController::class);
    Route::post('/', StoreGenreController::class);
    Route::patch('/{genre}', UpdateGenreController::class);
    Route::delete('/{genre}', DeleteGenreController::class);
});
