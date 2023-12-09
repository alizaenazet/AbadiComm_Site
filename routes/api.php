<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\GalleryActivity;

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

Route::get('/tes/{key}', function (string $key) {
    $galleries = Cache::rememberForever("galleries", function () {
        return GalleryActivity::all()->sortByDesc('updated_at');
    });
    return [$galleries,gettype($galleries)];
    // return Cache::get($key,"value of ". $key . "is noting");
});
