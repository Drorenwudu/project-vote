<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;

Route::match(['get', 'post'], '/', [AuthController::class, 'form']);
Route::get("/vote",[QuestionnaireController::class, 'show'])->name('vote');
Route::post("/send", [FormController::class, 'store']);
