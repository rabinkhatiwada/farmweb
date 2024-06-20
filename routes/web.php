<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MsgController;
use App\Http\Controllers\SettingController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $blogs=Blog::all();

    return view('user.home', ['blogs'=>$blogs]);
});

Route::get('/about-us', function () {

    return view('user.about');
});
Route::get('/services', function () {

    return view('user.service');
});

Route::get('/blogs', function () {
    $blogs = Blog::all();

    return view('user.blog',['blogs'=>$blogs]);
});
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', function () {

    return view('user.contact');
});
Route::post('/contact', [MsgController::class, 'store'])->name('msg.send');

Route::match(['GET','POST'],'/login', [AdminController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], '/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name('index');
        Route::post('', [BlogController::class, 'store'])->name('store');
        Route::match(['get', 'put'], 'edit/{blog}', [BlogController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
    });
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('', [MsgController::class, 'index'])->name('index');
        Route::get('/{id}', [MsgController::class, 'show'])->name('show');
        Route::delete('/delete/{id}', [MsgController::class, 'destroy'])->name('delete');
    });
    Route::prefix('setting')->name('setting.')->group(function(){
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'],'/contact', [SettingController::class, 'contactPage'])->name('contact');
        Route::match(['GET', 'POST'],'/footer', [SettingController::class, 'footerPage'])->name('footer');



    });


});

Route::get('/admin', function () {
    return redirect()->route('login');
});
