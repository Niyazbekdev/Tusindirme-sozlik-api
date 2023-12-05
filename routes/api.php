<?php

use App\Http\Controllers\AntonymWordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SynonymWordController;
use App\Http\Controllers\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', CategoryController::class);
Route::apiResource('categories.words', WordController::class)->shallow();
Route::apiResource('words.synonyms', SynonymWordController::class);
Route::apiResource('words.antonyms', AntonymWordController::class);
