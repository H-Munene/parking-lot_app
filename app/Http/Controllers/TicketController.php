<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\ParkingLot;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\TicketConfirmationEmail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        //retrieve user using user_id
        $user = User::findorFail($request->user_id);
        //get the first empty parking lot id, if none is available fail
        $parking_lot_id = DB::table('parking_lots')->get()->where('occupied', false)->firstOrFail()->id;
        //retrieve parking lot id model
        $parking_lot = ParkingLot::find($parking_lot_id); 

        //if user and pl found, create ticket
        $ticket = new Ticket;
        $ticket->user_id = $request->user_id;
        $ticket->parking_lot_id = $parking_lot->id;

        //update the respective parking lot, parking_lot.occupied, to true
        DB::table('parking_lots')->where('id', $parking_lot_id)->update(['occupied'=>true]);

        //send email
        $user->notify(new TicketConfirmationEmail($user, $parking_lot, $ticket));
        // $user->notify(new TicketConfirmationEmail($user));
        
        $ticket->save();

        return $ticket;
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
