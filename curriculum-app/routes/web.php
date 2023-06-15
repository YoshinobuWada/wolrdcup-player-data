<?php

use Illuminate\Routing\Controllers\Middleware;
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
// ログイン前
Route::group(['middleware' => ['guest']],function(){
//ログイン画面
Route::get('/login',[PlayersController::class,'login'])->name('players.login');
//ログイン画面→サインイン
Route::post('/logup',[PlayersController::class,'logup'])->name('players.logup');
//新規登録画面
Route::get('/setting',[PlayersController::class,'setting'])->name('players.setting');
//新規登録画面→登録
Route::post('/register',[PlayersController::class,'register'])->name('players.register');
});

Route::group(['middleware' => ['auth']],function(){
//一覧画面の表示
Route::get('/', [PlayersController::class, 'index'])->name('players.index');
//ログアウト機能
Route::post('logout',[PlayersController::class,'logout'])->name('players.logout');

Route::post('/edit/{id}',[PlayersController::class, 'edit'])->name('players.edit');
//選手詳細
Route::get('/detail/{id}',[PlayersController::class,'detail'])->name('players.detail');
//選手編集
Route::get('/update/{id}',[PlayersController::class,'update'])->name('players.update');
//論理削除
Route::get('/{id}',[PlayersController::class, 'delete']);
});
