<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticketModel;
    public function __construct()
    {
        $this->ticketModel = new Ticket();
    }

    public function index()
    {
        $tickets = $this->ticketModel->getTicket();
        return TicketResource::collection($tickets);
    }
    public function create()
    {
        //
    }

    public function store(CreateTicketRequest $request)
    {
        $tickets = Ticket::create($request->all());

        return new TicketResource($tickets);
    }

    public function show(Ticket $tickets)
    {
        //
    }
    public function edit(Ticket $tickets)
    {
        //
    }
    public function update(CreateTicketRequest $request, Ticket $tickets)
    {
        $tickets->update($request->all());

        return new TicketResource($tickets);
    }


    public function destroy(Ticket $tickets)
    {
        $tickets->delete();

        return response(null, 204);
    }
}
