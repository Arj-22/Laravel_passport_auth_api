<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Login Route
Route::post("/login", [AuthController::class, "Login"]);

// Register Route
Route::post("/register", [AuthController::class, "Register"]);

// Forget Password Route
Route::post("/forgetpassword", [ForgetController::class, "ForgotPassword"]);

// Reset Password Route
Route::post("/resetpassword", [ResetController::class, "ResetPassword"]);

// Current User Route
Route::get("/user", [UserController::class, "User"])->middleware("auth:api");