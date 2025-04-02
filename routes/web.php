<?php

use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\JwtAuthenticate;
use App\Http\Middleware\SetAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(SetAuthMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::post('/contact', function () {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    })->name('contact.submit');

    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
    Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    Route::get('/about-us', [ContactController::class, 'about'])->name('about.us');
    Route::get('/project', [ContactController::class, 'project'])->name('project');

    Route::get('/donate', function () {
        return view('donate');
    })->name('donate');
});




Route::middleware(JwtAuthenticate::class)->group(function () {
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
        Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

        Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects');
        Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');

        Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::post('/admin/projects/store/{id?}', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    });

    Route::get('/user/dashboard', function () {
        return  view('dashboard');
    })->name('user.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user/projects', [DonationController::class, 'index'])->name('user.projects');
    Route::get('/user/donated/projects', [DonationController::class, 'donateProject'])->name('user.denatedProjects');
    Route::get('/selected/project/{id}', [DonationController::class, 'selectProject'])->name('selected.projects');
});
