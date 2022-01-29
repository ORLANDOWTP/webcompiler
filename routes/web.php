<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/',function(){
    return redirect('/login');
});
Route::get('/webcompiler', [HomeController::class,'index'])->name('home');
Route::get('/login', [AuthController::class,'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::post('setLanguage',[HomeController::class,'setLanguage']);
Route::post('saveSetting',[HomeController::class,'saveSetting']);
Route::post('getSnippetValue',[HomeController::class,'getSnippetValue']);
Route::post('getSnippet',[HomeController::class,'getSnippet']);
Route::post('changePDF',[HomeController::class,'changePDF']);
Route::post('openFile',[HomeController::class,'openFile']);
Route::post('runCode',[HomeController::class,'compileCode']);
Route::post('getTutorial',[HomeController::class,'getTutorial']);

Route::post('getTutorialByLanguage',[HomeController::class,'getTutorialByLanguage']);

Route::post('getDirectory',[HomeController::class,'getDirectory']);
Route::post('getDirectoryFiles',[HomeController::class,'getDirectoryFiles']);
Route::post('checkAvailability',[HomeController::class,'checkAvailability']);

Route::post('createFile',[HomeController::class,'createFile']);
Route::post('renameFile',[HomeController::class,'renameFile']);
Route::post('checkRenameFileAvailability',[HomeController::class,'checkRenameFileAvailability']);
Route::post('deleteFile',[HomeController::class,'deleteFile']);

Route::post('createFolder',[HomeController::class,'createFolder']);
Route::post('renameFolder',[HomeController::class,'renameFolder']);
Route::post('deleteFolder',[HomeController::class,'deleteFolder']);

Route::post('sendStartDebug',[HomeController::class,'sendStartDebug']);
Route::get('test',[HomeController::class,'testCode']);
