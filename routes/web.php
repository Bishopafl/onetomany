<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
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

/* The CRUD for our laravel application that has one to many relationships between users and posts
* |--------------------------------------------------------------------------
* | CREATE
* |-------------------------------------------------------------------------- 
*/
Route::get('/create', function() {

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'This is my cool title','body'=>'This is some cool body text using laravel']);

    $user->posts()->save($post);

});