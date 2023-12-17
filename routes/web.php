<?php

use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

//CONTROLADORES 
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

//create post por el method get
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');

//create post por el method post
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');

//detail de un post desde su controller postcontroller
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//ROUTES GENERADAS POR CONVENCION DARIAN RESULTADO DE 7 RUTAS IGUALES A LAS ANTERIORES
//Manera 1
//Route::resource('posts', PostController::class);

//Manera 2
// Route::resource('blog', PostController::class, [
//     'names'         => 'posts',
//     'parameters'    => ['blog'  => 'post']
// ]);




// $posts = [
//     ['title' => 'First post'],
//     ['title' => 'Second post'],
//     ['title' => 'Third post'],
//     ['title' => 'Fourth post']
// ];
// Route::get('/', function () {
//     return view('welcome');
// });

//personal.site.com         =>  welcome
//personal.site.com/contact =>  contact
//personal.site.com/blog    =>  blog
//personal.site.com/about   =>  about
Route::view('/', 'welcome')->name('home');
Route::view('/contacto', 'contact')->name('contact');
//Route::view('/blog', 'blog')->name('blog');
// Route::view('/blog', 'blog', ['posts' => $posts])->name('blog');
Route::view('/about', 'about')->name('about');

Route::get('/login', function(){
    return 'Login Page';
})->name('login');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
