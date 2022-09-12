<?php

use App\Http\Controllers\FormController;
use App\Models\Form;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/RealIndex',[FormController::class,'index']);
Route::get('/index',[FormController::class,'create']);
Route::post('/create',[FormController::class,'store']);
//Download
Route::get('/download/{id}',[FormController::class,'download']);
Route::delete('/delete/{id}',[FormController::class,'destroy']);

Route::get('/show/{id}',[FormController::class,'show']);
Route::put('/show/{id}/update',[FormController::class,'update']);
