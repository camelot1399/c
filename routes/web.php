<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Doctors\DoctorsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/doctors', [DoctorsController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{specialist}', [DoctorsController::class, 'show'])->name('doctors.show');
Route::get('/doctors/{specialist}/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/doctors/{specialist}/book_info', [ScheduleController::class, 'personalInfo'])->name('schedule.info');
Route::resource('books', BookController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/patient', [PatientController::class, 'index'])->middleware(['auth'])->name('patient.index');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
