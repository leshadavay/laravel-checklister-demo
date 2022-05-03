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

Route::redirect('/', 'welcome');

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::group(['middleware'=>'auth'],function(){

    Route::get('welcome',[Controllers\PageController::class,'welcome'])->name('welcome');
    Route::get('consultation',[Controllers\PageController::class,'consultation'])->name('consultation');

    Route::group(['prefix' => 'user','as'=> 'user.', 'middleware'=>'is_user'],function(){
        Route::get('checklists/{checklist}',[Controllers\User\ChecklistController::class,'show'])->name('checklists.show');
    });


    //'as'=> 'admin.' => route name would start like 'admin.bla bla'
    Route::group(['prefix' => 'admin','as'=> 'admin.', 'middleware'=>'is_admin'],function(){

        Route::get('users',[Controllers\Admin\UserController::class,'index'])->name('users.index');

        Route::resource('pages',Controllers\Admin\PageController::class)->only(['edit','update']);
        Route::resource('checklists.tasks',Controllers\Admin\TaskController::class);
        Route::resource('checklist_groups',Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists',Controllers\Admin\ChecklistController::class);
    });


});
