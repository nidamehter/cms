<?php
date_default_timezone_set('Europe/Istanbul');

require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';
require __DIR__ . '/database.php';
require __DIR__ . '/model.php';
require __DIR__ . '/helper.php';


Route::run('/admin/giris','giris@index');
Route::run('/admin/giris','giris@login', 'POST');

Route::run('/admin', 'index@home');

Route::run('/admin/kullaniciekle', 'user@index');
Route::run('/admin/kullaniciSubmit', 'user@addUser','POST');

Route::run('/admin/postekle', 'post@index');
Route::run('/admin/postVeri', 'post@postVeriKaydet','POST');
Route::run('/admin/postResim', 'post@postResimKaydet','POST');

Route::run('/admin/guncelle/{url}', 'post@guncelle','GET');

Route::run('/admin/Ayar', 'settings@index');
Route::run('/admin/Ayar', 'settings@index', "POST");

//Bakım Modu Aktifse Anasayfaya girmemesi için /admin yolu olmayan diğer sayfaları engelle
if(settings('bakim')==1 && getLastPath(1)!="admin"){
    Route::run('/'. getLastPath(1), 'bakim@index');
    exit;
}

//Public
Route::run('/anasayfa', 'blog@index');