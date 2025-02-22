<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about'); // about us page
});

Route::get('/contact', function () {
    return view('contact'); // contact us page
});

Route::post('/contact', function () {
    // Validate form data
    $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Or save the message to the database, if you prefer
    // ContactMessage::create($data);
    // Redirect back with a success message
    return redirect()->route('contact')->with('success', 'Your message has been sent!');
})->name('contact.submit');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');  // Display the form
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');  // Handle form submission
Route::get('/about-us', [ContactController::class, 'about'])->name('about.us'); 


Route::get('/projects', function () {
    return view('projects'); // projects page
});

Route::get('/donate', function () {
    return view('donate'); // donation page
})->name('donate');

// Redirect /dashboard based on user role
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

});



Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome'); // Redirect to the welcome page
})->name('logout'); // logout

require __DIR__.'/auth.php';
