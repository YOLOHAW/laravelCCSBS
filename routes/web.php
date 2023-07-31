<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    // DB::listen(function($query){
    //     logger($query->sql);
    // });
    // $blogs=Blog::with('category','author')->get();
    $blogs=Blog::latest()->get();
    return view('blogs',[
        'blogs'=>$blogs,
        'categories'=>Category::all()
    ]);
});
Route::get('/blogs/{blog:slug}',function(Blog $blog){
   //$blog=Blog::findOrFail($id);
    return view('blog',[
        'blog'=>$blog,
        'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
    ]);
})->where('blog','[A-z\d\-_]+');
Route::get('/categories/{category:slug}',function(Category $category){
    //dd($category->blogs);
    return view('blogs',[
        // 'blogs'=>$category->blogs->load('author','category')
        'blogs'=>$category->blogs,
        'categories'=>Category::all(),
        'currentCategory'=>$category
    ]);
});
Route::get('/users/{user:username}',function(User $user){
    //dd($category->blogs);
    return view('blogs',[
        // 'blogs'=>$user->blogs->load('author','category')
        'blogs'=>$user->blogs,
        'categories'=>Category::all()
    ]);
});
