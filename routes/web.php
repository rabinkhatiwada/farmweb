<?php

use App\Helper;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MsgController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Models\Blog;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClientController::class, 'index']);

Route::get('/about-us', [ClientController::class, 'about'])->name('about');

Route::get('/services', [ClientController::class, 'services'])->name('services');

Route::get('/blogs', [ClientController::class, 'blogs'])->name('blogs');

Route::get('/blogs/{blog}', [ClientController::class, 'blogShow'])->name('blog.show');

Route::get('/contact', [ClientController::class, 'contact'])->name('contact');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');


Route::post('/contact', [MsgController::class, 'store'])->name('msg.send');

Route::match(['GET','POST'],'/login', [AdminController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], '/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/@{type}', [BlogController::class, 'index'])->name('index');
        Route::match(['GET','POST'],'add/@{type}', [BlogController::class, 'store'])->name('store');
        Route::match(['get', 'put'], 'edit/{blog}', [BlogController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
    });
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('', [MsgController::class, 'index'])->name('index');
        Route::get('/{id}', [MsgController::class, 'show'])->name('show');
        Route::delete('/delete/{id}', [MsgController::class, 'destroy'])->name('delete');
    });
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('', [TestimonialController::class, 'index'])->name('index');
        Route::match(['GET','POST'],'add/', [TestimonialController::class, 'create'])->name('add');
        Route::match(['GET','POST'],'store/', [TestimonialController::class, 'store'])->name('store');

        Route::match(['get', 'put'], 'edit/{testimonial}', [TestimonialController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{testimonial}', [TestimonialController::class, 'update'])->name('update');
        Route::delete('/delete/{testimonial}', [TestimonialController::class, 'destroy'])->name('delete');
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
