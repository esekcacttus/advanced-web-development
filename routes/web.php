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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'welcome');

Route::redirect('/test', '/studenti');

Route::get('/test2', function (){
    return redirect()->route('student_with_id');
});

Route::get('/studentat/{id?}', function ($id=1){
    return "The ID=".$id;
})->name('student_with_id');

Route::get('/studenti', 'App\Http\Controllers\StudentiController@studenti');

Route::prefix('shkolla')->group(function (){
    Route::get('klasa', function (){return 'Klasa';});
    Route::get('studenti', function (){return 'Studenti';});
});

Route::get('/create-new-student', 'App\Http\Controllers\StudentiController@createNewStudent');
Route::get('/rename-all-students/{firstName}', 'App\Http\Controllers\StudentiController@renameAllStudents');
Route::get('/show-student/{id}', 'App\Http\Controllers\StudentiController@showStudent')->name('show.student');
Route::get('/show-students/{gender}/{isActive?}', 'App\Http\Controllers\StudentiController@showStudents');
Route::get('/create-student/', 'App\Http\Controllers\StudentiController@getCreateStudent')->name('get.create.student');
Route::post('/edit-student/', 'App\Http\Controllers\StudentiController@postEditStudent')->name('post.edit.student');
Route::delete('/delete-student/{id}', 'App\Http\Controllers\StudentiController@deleteStudent')->name('delete.student');
Route::put('/add-profile-picture/{id}', 'App\Http\Controllers\StudentiController@addProfilePicture')->name('add.profile.picture');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
