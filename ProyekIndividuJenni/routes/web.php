<?php
use App\Http\Controllers\Anggota_Controller;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\detail_peminjaman_controller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('app'); })->name('app.blade.php');

Route::resource('anggota', Anggota_Controller::class);
Route::resource('buku', BukuController::class);
Route::resource('detailpeminjaman', detail_peminjaman_controller::class);
