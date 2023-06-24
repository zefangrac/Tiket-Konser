<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('tickets', TicketController::class);
Route::apiResource('customers', CustomerController::class);
Route::post('/tickets/check-ticket', function (Request $request) {
    $ticketId = $request->input('ticketId');
    $tickets = Ticket::all();
    $ticket = $tickets->find($ticketId);
    $ticket->isAlreadyCheckIn = true;
    $ticket->save();
    return response()->json($ticket);
});
Route::post('/customers/get-customers-by-ticket-status', function (Request $request) {
    $ticketStatus = $request->input('ticketStatus');
    $tickets = Ticket::all();
    $status = 0;
    if ($ticketStatus == 'true') {
        $status = 1;
    }
    $ticket = $tickets->where('isAlreadyCheckIn', $status);
    $customerArr = [];
    for ($i = 0; $i < count($ticket); $i++) {
        $customer = Customer::all()->find($ticket[$i]->customerId);
        array_push($customerArr, $customer);
    }
    return response()->json($customerArr);
});
