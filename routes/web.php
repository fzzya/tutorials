<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\appController;
use App\Http\Controllers\logicController;
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

Route::group(['middleware' => ['auth','role:admin']], function(){
    Route::get('/admin',[adminController::class,'index'])->name('admin');
    Route::get('/admin/user',[adminController::class,'user']);
    Route::post('/admin/user',[adminController::class,'userPost']);
    Route::get('/admin/user/{id}',[adminController::class,'userEdit']);
    Route::delete('/admin/user/{id}',[adminController::class,'userHapus']);

    Route::get('/admin/register',[adminController::class,'userregis']);
    Route::get('/admin/register/{id}',[adminController::class,'regpros']);
});

Route::middleware(['auth','role:petugas|admin'])->group(function(){
    Route::get('/petugas',[petugasController::class,'index'])->name('petugas');
    Route::post('/petugas/tanggapan/proses',[petugasController::class,'tanggapanProses']);
    Route::post('/petugas/tanggapan/selesai',[petugasController::class,'tanggapanSelesai']);

});

Route::group(['middleware' => ['auth','role:masyarakat']], function(){
    Route::get('/masyarakat',[masyarakatController::class,'index'])->name('masyarakat');
    Route::get('/masyarakat/pengaduan',[masyarakatController::class,'pengaduan']);
    Route::post('/masyarakat/pengaduan',[masyarakatController::class,'pengaduanPost']);
    Route::delete('/masyarakat/pengaduan/{id}',[masyarakatController::class,'pengaduanHapus']);
    Route::get('/masyarakat/tanggapan/{id}',[masyarakatController::class,'tanggapan']);

});

Route::get('/',[appController::class,'show'])->name('login');
Route::post('/login',[logicController::class,'login']);

Route::get('/about',[appController::class,'rpl']);
Route::get('/register',[appController::class,'register']);
Route::get('/logout',[logicController::class,'logout']);
Route::post('/register',[appController::class,'registerPost']);
Route::get('/logout',[logicController::class,'logout']);
