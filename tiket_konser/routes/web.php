<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/all', 'App\Http\Controllers\TicketController@index');
// Route::post('/create', 'App\Http\Controllers\TicketController@createTicket');
//Route::put('/tickets/check-ticket', function(){return "helloworld";})->withoutMiddleware(['web']);
// Route::get('/buy/{id}', 'TicketController@buy');
// Route::post('/checkin', 'TicketController@checkin');
