<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Gym\UserController;
use App\Http\Controllers\Gym\PasstypeController;
use App\Http\Controllers\Gym\PassController;
use App\Http\Controllers\Gym\DiscountController;

Route::group(["middleware" => ["auth:sanctum"]], function() {
    //All
    Route::post("/logout",[AuthController::class,"signOut"]);
    
    Route::put("/user/{id}",[UserController::class, "update"]);

    Route::get("/userPass/{id}",[PassController::class,"indexPass"]);
    
    //Admin
    Route::delete("/user/{id}", [UserController::class, "destroy"]);
    Route::post("/user",[UserController::class,"addAdmin"]);
    
    Route::post("/discount",[DiscountController::class,"createDiscount"]);
    Route::put("/discount/{id}",[DiscountController::class,"updateDiscount"]);
    Route::delete("/discount/{id}",[DiscountController::class,"deleteDiscount"]);
    
    Route::post("/pass",[PassController::class,"createPass"]);
    Route::put("/pass/{id}",[PassController::class,"updatePass"]);
    Route::delete("/pass/{id}",[PassController::class,"deletePass"]);
    
    Route::post("/passtype",[PasstypeController::class,"createPassType"]);
    Route::put("/passtype/{id}",[PasstypeController::class,"updatePassType"]);
    Route::delete("/passtype/{id}",[PasstypeController::class,"deletePassType"]);
});

//Auth
Route::post("/register",[AuthController::class,"register"]);
Route::post("/login",[AuthController::class,"signIn"]);

//User
Route::get("/users",[UserController::class, "index"]);
Route::get("/user/{id}",[UserController::class, "show"]);

//Passtypes
Route::get("/passtypes",[PasstypeController::class,"indexPassType"]);

//Discount
Route::get("/discounts",[DiscountController::class,"indexDiscount"]);