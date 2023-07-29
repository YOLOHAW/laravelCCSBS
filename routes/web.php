<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
////////// php artisan tinker //////////////
Route::get('/',function(){
    $blogs=Blog::all();
    return view('blogs',[
        'blogs'=>$blogs
    ]);
});
Route::get('/blogs/{blog}',function($slug){
   $blog=Blog::findOrFail($slug);
   
    return view('blog',[
        'blog'=>$blog
    ]);
})->where('blog','[A-z\d\-_]+');

