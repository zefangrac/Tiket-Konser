<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers =Customer::all();
        return CustomerResource::collection($customers);
    }
    public function create()
    {
        //
    }

    // public function getAllCustomer(){
    //   $customers = Customer::all();
    //   //return CustomerResource::collection($customers);
    //   return $this->sendResponse(CustomerResource::collection($customers), 'Customers Retrieved Successfully.');
    // }

    public function store(CustomerRequest $request)
    {
        $customers = Customer::create($request->all());
        $ticket = new Ticket();
        $ticket->customerId = $customers->id;
        $ticket->location = "Cimahi";
        $ticket->date = "2023-06-20";
        $ticket->isAlreadyCheckIn = false;
        $ticket->save();
        return new CustomerResource($customers);
    }

    public function show(Customer $customers)
    {
        //
    }
    public function edit(Customer $customers)
    {
        //
    }
    public function update(CustomerRequest $request, Customer $customers)
    {
        $customers->update($request->all());

        return new CustomerResource($customers);
    }


    public function destroy(Customer $customers)
    {
        $customers->delete();

        return response(null, 204);
    }
}
