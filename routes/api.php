<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\NotesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('customers/{id}',[CustomersController::class,"view"]);
Route::patch('customers/{id}',[CustomersController::class,"update"]);
Route::delete('customers/{id}',[CustomersController::class,"delete"]);
Route::get('customers',[CustomersController::class,"index"]);
Route::post('customers',[CustomersController::class,"create"]);



Route::get('customers/{customer_id}/notes/{id}',[NotesController::class,"view"]);
Route::patch('customers/{customer_id}/notes/{id}',[NotesController::class,"update"]);
Route::delete('customers/{customer_id}/notes/{id}',[NotesController::class,"delete"]);
Route::get('customers/{customer_id}/notes',[NotesController::class,"index"]);
Route::post('customers/{customer_id}/notes',[NotesController::class,"create"]);
