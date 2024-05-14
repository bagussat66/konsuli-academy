<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('courses', CourseController::class)->only(['index', 'show']);
Route::resource('lessons', LessonController::class)->only(['show']);
Route::resource('enrollments', EnrollmentController::class)->only(['store']);
Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');
Route::resource('assignments', AssignmentController::class)->only(['index', 'show']);
Route::resource('quizzes', QuizController::class)->only(['index', 'show']);
Route::resource('users', UserController::class)->only(['show']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Registration routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

require __DIR__.'/auth.php';
