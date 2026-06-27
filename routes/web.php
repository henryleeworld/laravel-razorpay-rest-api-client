<?php

use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;

Route::resource('razorpay', RazorpayController::class)->only([
    'index', 'store'
]);
