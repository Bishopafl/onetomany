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

    $post = new Post(['title'=>'This is my second title','body'=>'This is some cool body text using laravel']);

    $user->posts()->save($post);

});

/* 
* |--------------------------------------------------------------------------
* | READ
* |-------------------------------------------------------------------------- 
*/
Route::get('/read',function() {
    
    $user = User::findOrFail(1);

    foreach ($user->posts as $posts ) {
        echo $posts->title . "<br>";
    }

});

/* 
* |--------------------------------------------------------------------------
* | UPDATE
* |-------------------------------------------------------------------------- 
*/
Route::get('/update', function() {
    $user = User::find(1);

    // two ways to update using whereId (camelcase) & where()
    // $user->posts()->whereId(1)->update(['title'=>'I have updated the title. I love this shit.']);
    
    $user->posts()->where('id','=', 2)->update(['title'=>'I have updated the title. I love this shit.']);

});

/* 
* |--------------------------------------------------------------------------
* | DELETE
* |-------------------------------------------------------------------------- 
*/
Route::get('/delete',function() {

    $user = User::find(1);

    $user->posts()->whereId(1)->delete();

});