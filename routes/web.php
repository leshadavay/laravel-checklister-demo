<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){

    //'as'=> 'admin.' => route name would start like 'admin.bla bla'
    Route::group(['prefix' => 'admin','as'=> 'admin.', 'middleware'=>'is_admin'],function(){
        Route::resource('pages',Controllers\Admin\PageController::class)->only(['edit','update']);
        Route::resource('checklists.tasks',Controllers\Admin\TaskController::class);
        Route::resource('checklist_groups',Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists',Controllers\Admin\ChecklistController::class);
    });

});
