<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//ruta početnog zaslona
Route::get('/', function () {
    return view('welcome');
});

//ruta za autentifikaciju korisnika
Route::auth();

//ruta početne stranice kad se korisnik logira u aplikaciju
Route::get('/home', 'HomeController@index');

//ruta za mjenjanje uloge korisnika
Route::get('/home/{id}','HomeController@edit');

//ruta za spremanje promjena u bazu
Route::put('/home/{id}','HomeController@update');