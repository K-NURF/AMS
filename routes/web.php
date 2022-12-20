<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/apply', function () {
        return view('guests.apply');
    });

    Route::post('/apply', [StudentController::class, 'apply']);
});


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/students', function () {
    return view('student.dashboard');});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/applicants', [AdminController::class, 'applicants']);
    Route::get('/all_students', [AdminController::class, 'all_students']);
    
    Route::get('/availableunits', [StudentController::class, 'displayAllunits']);
    Route::get('/registeredunits', [StudentController::class, 'displayRegUnits']);
    Route::get('/grades', [StudentController::class, 'displayGrades']);
    Route::get('/progress', [StudentController::class, 'displayProgress']);


    
});



require __DIR__ . '/auth.php';
