<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
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

Route::group(['middleware'=>"auth"],function () {
    Route::get("/", [TodoController::class, "index"]);
    Route::get("/create", [TodoController::class, "create"]);
    Route::post("/create", [TodoController::class, "store"]);
    Route::get("/update/{id}", [TodoController::class, "edit"]);
    Route::post("/update/{id}", [TodoController::class, "update"]);
    Route::get("/delete/{id}", [TodoController::class, "destroy"]);
    Route::post("/logout",[AuthController::class,"logout"]);
    Route::post("/search",[TodoController::class,"search"]);
});

Route::group(['middleware'=>"guest"],function(){
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "authenticate"]);
    Route::get("/register", [AuthController::class, "register"]);
    Route::post("/register", [AuthController::class, "store"]);
});
