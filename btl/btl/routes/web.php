<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Backend\UserController;
// Sửa lỗi bằng cách thêm đường dẫn đầy đủ cho CommentController
// use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentsssController;
use App\Http\Controllers\AdminCommentsssController;
use App\Http\Controllers\Admin\UsersController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);
Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware(AuthenticateMiddleware::class);
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::resource('users', UserController::class)->names('admin.users');
// });

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', function () {
    return view('backend.auth.dangki');
})->name('register');

Route::post('dangki', [AuthController::class, 'register'])->name('auth.dangki');


// Các phiên bản trang chủ
Route::get('/home-02', function () {
    return view('home-02');
})->name('home-02');

Route::get('/home-03', function () {
    return view('home-03');
})->name('home-03');
Route::get('/blog-detail-01', function () {
    return view('blog-detail-01');
})->name('blog-detail-01');
Route::get('/blog-detail-02', function () {
    return view('blog-detail-02');
})->name('blog-detail-02');
Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');
Route::get('/blog-list-01', function () {
    return view('blog-list-01');
})->name('blog-list-01');
Route::get('/blog-list-02', function () {
    return view('blog-list-02');
})->name('blog-list-02');
Route::get('/category-01', function () {
    return view('category-01');
})->name('category-01');
Route::get('/category-02', function () {
    return view('category-02');
})->name('category-02');
Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/navigation-menu', function () {
    return view('navigation-menu');
})->name('navigation-menu');

// Trang liên hệ
Route::get('/contact', function () {
    return view('contact');
});

// Trang giới thiệu
Route::get('/a', function () {
    return view('about');
});
Route::prefix('admin')->middleware(AuthenticateMiddleware::class)->group(function () {
    Route::resource('category', CategoryController::class);
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/post/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/comments/{postId}', [CommentsssController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentsssController::class, 'destroy'])->name('comments.destroy');
Route::get('/admin/comments', [AdminCommentsssController::class, 'index'])->name('comments.index');
Route::delete('/admin/comments/{id}', [AdminCommentsssController::class, 'destroy'])->name('comments.destroy');

Route::prefix('admin')->middleware(AuthenticateMiddleware::class)->group(function () {
    Route::resource('users', UserController::class);
});

