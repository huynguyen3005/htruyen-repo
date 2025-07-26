<?php

;


use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Client\ChapterController;
use App\Http\Controllers\Client\ComicController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/comics/listComicIDs', [ComicController::class, 'getListComic'])->name('api.listcomics');
Route::get('/danh-sach/{comic}/{name}', [ChapterController::class, 'apiShow'])->name('api.chapter');
Route::get('/get-google-sign-in-url', [GoogleController::class, 'getGoogleSignInUrl'])->name('api.google-sign-in');
