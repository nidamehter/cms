<?php
date_default_timezone_set('Europe/Istanbul');
session_start();
ob_start();


require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';
require __DIR__ . '/database.php';
require __DIR__ . '/model.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/helper.php';


Route::run('/admin', 'index@home');

Route::run('/admin/login', 'login@index');
Route::run('/admin/login', 'login@loginSubmit', 'POST');

Route::run('/admin/userAdd', 'user@index');
Route::run('/admin/userAdd', 'user@add', 'POST');
Route::run('/admin/userList', 'user@userList');
Route::run('/admin/userEdit/{url}', 'user@edit', 'GET'); 
Route::run('/admin/userEdit', 'user@editSubmit', 'POST');       
Route::run('/admin/userDelete/{url}', 'user@delete', 'GET');

Route::run('/admin/postList', 'post@postList');
Route::run('/admin/postekle', 'post@index');
Route::run('/admin/postekle', 'post@kaydet', 'POST');
Route::run('/admin/postDelete/{url}', 'post@delete', 'GET');

Route::run('/admin/postEdit/{url}', 'post@edit', 'GET');
Route::run('/admin/postEdit', 'post@editSubmit', 'POST');

Route::run('/admin/categoryList', 'category@list');
Route::run('/admin/categoryAdd', 'category@index');
Route::run('/admin/categoryAdd', 'category@add', 'POST');
Route::run('/admin/categoryDelete/{url}', 'category@delete', 'GET');
Route::run('/admin/categoryEdit/{url}', 'category@edit', 'GET');   
Route::run('/admin/categoryEdit', 'category@editSubmit', 'POST');


Route::run('/admin/Ayar', 'setting@index');
Route::run('/admin/ayarBlog', 'setting@ayarBlog', "POST");

Route::run('/test', 'settings@test');

//Bakım Modu Aktifse Anasayfaya girmemesi için /admin yolu olmayan diğer sayfaları engelle
if (settings('bakim') == 1 && getLastPath(1) != "admin") {
    Route::run('/' . getLastPath(1), 'bakim@index');
    exit;
}

//Public
Route::run('/anasayfa', 'blog@index');
Route::run('/anasayfa/{url}', 'blog@blogGetCategoryPost', 'GET');
