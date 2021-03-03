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

Route::get('/studenti', function (){
    $studenti = new \App\Models\Studenti("2", "Filane2 Fisteku",
        "18.10.1900", "F");

    return view('studenti', [
        "studenti" => $studenti
    ]);
});
