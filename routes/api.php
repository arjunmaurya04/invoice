<?php

use App\Http\Controllers\AddServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->get('/dashboard', function (Request $request) {
    return response('dashboard');
});




Route::post('/addclient', [ClientController::class, 'store']);
Route::post('/addservice', [AddServiceController::class, 'storeser']);
Route::middleware('api')->group(function () {
    Route::get('/showclient', [ClientController::class, 'show']);
});
Route::middleware('api')->group(function () {
    Route::get('/servicelist', [AddServiceController::class, 'showser']);
});

use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\ServiceController;

Route::get('clients', [ClientController::class, 'index']);
Route::get('services', [AddServiceController::class, 'index']);
Route::post('invoices', [InvoiceController::class, 'store']);
Route::post('/addinvoices', [InvoiceController::class, 'store']);
