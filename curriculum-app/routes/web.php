<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;

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
Route::get('/', function(){
    return view('players/index');
});
//一覧画面の表示
Route::get('/', [PlayersController::class, 'index']);
//選手詳細
Route::get('/detail/{id}',[PlayersController::class,'detail'])->name('players.detail');