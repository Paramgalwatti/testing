<?php


use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UsersController::class, 'index'])->name('users');
Route::get('edit_user/{id}',[UsersController::class, 'edit_user'])->name('edit_user');
Route::post('edit_info/{id}',[UsersController::class, 'edit_info'])->name('edit_info');
Route::get('delete_user/{id}',[UsersController::class, 'delete_user'])->name('delete_user');
Route::get('add_user',[UsersController::class, 'add_user'])->name('add_user');
Route::post('user_info',[UsersController::class, 'user_info'])->name('user_info');



