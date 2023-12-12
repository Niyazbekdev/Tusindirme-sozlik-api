<?php

use App\Http\Controllers\AntonymWordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExportExcelWordController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImportExcelWordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SynonymWordController;
use App\Http\Controllers\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'ability:SuperAdmin,Admin' ])->group(function (){

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('words', WordController::class);
    Route::apiResource('words.synonyms', SynonymWordController::class);
    Route::apiResource('words.antonyms', AntonymWordController::class);
    Route::apiResource('import-excel-words', ImportExcelWordController::class);
    Route::apiResource('export-excel-words', ExportExcelWordController::class);

});

Route::middleware(['auth:sanctum', 'ability:SuperAdmin'])->group(function (){
    Route::apiResource('histories', HistoryController::class);
});

require 'user.php';
