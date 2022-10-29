<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// ホーム画面表示
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    // // 一覧画面表示
    // Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    // 登録画面表示
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // 登録処理
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // 詳細画面表示
    Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail']);
    // 編集画面表示
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
    // 編集処理
    Route::put('/edit/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    // 削除処理
    Route::delete('/edit/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
    // 車名検索
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'searchindex'])->name('items.search');
});
