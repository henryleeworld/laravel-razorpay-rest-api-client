<?php

use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;

Route::get('razorpay/payment', [RazorpayController::class, 'index']);
Route::post('razorpay/payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
