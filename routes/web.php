<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;


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

Route::get('/dosen', function(){
    $dosenn = ["Intan","Rini","Arip","Garno","Susi","Iqbal","Ratna","Aji","Dadang","Riza"];
    return view('dosen.index')->with('dsn',$dosenn);
});

Route::get('/mahasiswa', function(){
    $mahasiswaa = ["Mirza","Miftah","Mifat","Sidqih","Ali","Alif","Adrian","Aufa","Ray","Alpin"];
    return view('mahasiswa.index')->with('mahasiswaa',$mahasiswaa);
});

Route::get('/matakuliah',function(){
    $matkul = ["Algoritma dan Pemrograman","Technopreneur","Cloud Computing","Teori Bahasa dan Automata","Embedded","Aljabar Linear","Data Mining","Framework","Pemrograman Basis Web","Metode Numerik"];
    return view('matakuliah.index')->with('matkul',$matkul);
});

Route::controller(MatakuliahController::class)->group(function () {
    Route::get('/insert_mk', 'insert');
    Route::get('/select_mk', 'select');
    Route::get('/update_mk', 'update');
    Route::get('/delete_mk', 'delete');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/insert_mhs', 'insert');
    Route::get('/select_mhs', 'select');
    Route::get('/update_mhs', 'update');
    Route::get('/delete_mhs', 'delete');
});

Route::controller(DosenController::class)->group(function () {
    Route::get('/insert_dsn', 'insert');
    Route::get('/select_dsn', 'select');
    Route::get('/update_dsn', 'update');
    Route::get('/delete_dsn', 'delete');
});