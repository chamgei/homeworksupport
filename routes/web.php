<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\HomeworkController;
use App\Http\Controllers\Admin\HomeworkUploadController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', function (Request $request) {
    if($request->has('homework_search')){
        $homework = \App\Models\Homework::search($request->homework_search)
            ->paginate(7);
    }else{
        $homework = \App\Models\Homework::paginate(12);
    }
    return view('welcome', compact('homework'));
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/storage/{extra}', function ($extra) {
    return redirect('/public/storage/$extra');
}
)->where('extra', '.*');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('categories',CategoryController::class);
        Route::resource('homework',HomeworkController::class);

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

//        Homework Upload
        Route::get('/homework-files/{id}', [HomeworkUploadController::class, 'index'])->name('HomeworkUpload');
        Route::post('/homework-files', [HomeworkUploadController::class, 'store'])->name('saveHomeworkFiles');
        Route::delete('/homework-files/{id}', [HomeworkUploadController::class, 'destroy'])->name('deleteHomeworkFiles');
    });
});