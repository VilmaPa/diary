<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LectureController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Lecture
Route::group(['prefix' => 'lectures'], function(){
Route::get('', [LectureController::class, 'index'])->name('lecture.index');
Route::get('create', [LectureController::class, 'create'])->name('lecture.create');
Route::post('store', [LectureController::class, 'store'])->name('lecture.store');
Route::get('edit/{lecture}', [LectureController::class, 'edit'])->name('lecture.edit');
Route::post('update/{lecture}', [LectureController::class, 'update'])->name('lecture.update');
Route::post('delete/{lecture}', [LectureController::class, 'destroy'])->name('lecture.destroy');
Route::get('show/{lecture}', [LectureController::class, 'show'])->name('lecture.show');
}); 

//Student
Route::group(['prefix' => 'students'], function(){
Route::get('', [StudentController::class, 'index'])->name('student.index');
Route::get('create', [StudentController::class, 'create'])->name('student.create');
Route::post('store', [StudentController::class, 'store'])->name('student.store');
Route::get('edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('update/{student}', [StudentController::class, 'update'])->name('student.update');
Route::post('delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('show/{student}', [StudentController::class, 'show'])->name('student.show');
}); 

//Grade
Route::group(['prefix' => 'grades'], function(){
Route::get('', [GradeController::class, 'index'])->name('grade.index');
Route::get('create', [GradeController::class, 'create'])->name('grade.create');
Route::post('store', [GradeController::class, 'store'])->name('grade.store');
Route::get('edit/{grade}', [GradeController::class, 'edit'])->name('grade.edit');
Route::post('update/{grade}', [GradeController::class, 'update'])->name('grade.update');
Route::post('delete/{grade}', [GradeController::class, 'destroy'])->name('grade.destroy');
Route::get('show/{grade}', [GradeController::class, 'show'])->name('grade.show');
}); 