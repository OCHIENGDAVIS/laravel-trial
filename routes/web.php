<?php

use Illuminate\Database\Schema\PostgresBuilder;
use Illuminate\Http\Request;
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


Route::post('/signup', 'UserController@postSignUp')->name('signup');
Route::post('/signin', 'UserController@postSignIn')->name('signin');
Route::post('/upload', 'UserController@uploadAvavtar')->name('upload');
Route::get('/flights', 'FlightController@listFlight')->name('flights');
Route::get('/oneflight', 'FlightController@getFlight');
Route::post('/create', 'PostController@createPost')->name('create-post');
Route::get('/allposts', 'PostController@allposts')->name('allposts');
Route::get('/delete/{post_id}', 'PostController@getDeletePost')->name(('delete'));
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
