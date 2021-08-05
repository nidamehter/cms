<?php
date_default_timezone_set('Europe/Istanbul');

require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';
require __DIR__ . '/database.php';
require __DIR__ . '/model.php';
require __DIR__ . '/helper.php';

Route::run('/', 'index@home');
Route::run('/kullaniciekle', 'user@index');
Route::run('/kullaniciSubmit', 'user@addUser','POST');

Route::run('/postekle', 'post@index');
Route::run('/anasayfa', 'blog@index');
Route::run('/postResim', 'post@postResimKaydet','POST');
Route::run('/postVeri', 'post@postVeriKaydet','POST');

Route::run('/guncelle/{url}', 'post@guncelle','GET');

Route::run('/AyarKaydet', 'settings@save', "POST");
Route::run('/Ayar', 'settings@index');


Route::run('/blogSayfasi', 'blog@index');
//Route::run('/uyeler', 'uyeler@index');
//Route::run('/uyeler','uyeler@post','post');
//Route::run('/profil/sifre-degistir','profile/changepassword@index');


