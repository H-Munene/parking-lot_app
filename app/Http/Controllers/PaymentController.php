<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\ParkingLot;
use App\Models\PaymentOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Notifications\PaymentConfirmationEmail;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
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
    public function store(StorePaymentRequest $request)
    {
        //get ticket model by id
        $ticket = Ticket::findOrFail($request->ticket_id);
        
        //get user model from ticket using user_id
        $user_id = DB::table('tickets')->where('id',$request->ticket_id)->value('user_id');
        $user = User::find($user_id);
        
        //get payment
        $payment = new Payment;
        $payment->ticket_id = $request->ticket_id;
        
        //calculate price based on time taken
        //timetaken = entry_time - exit time
        $entry_time = DB::table('tickets')->where('id',$request->ticket_id)->value('created_at');
        $time_taken = Carbon::now()->diffInHours($entry_time);

        if($time_taken <= 1) {
            $payment->price = 200;
        }else {
            $payment->price = 200 * $time_taken;
        }

        $payment->payment_option_id = $request->payment_option_id;

        //get paymentOptions model
        $paymentOption = PaymentOption::find($request->payment_option_id);
        //send payment confirmation email
        $user->notify(new PaymentConfirmationEmail($payment,  $paymentOption));
        $payment->save();

        //set payment status in ticket to paid
        DB::table('tickets')->where('id', $request->ticket_id)->update(['payment_status'=>true]);
        
        //update parking lot occupied after payment is made
        $parking_lot_id = DB::table('tickets')->where('id', $request->ticket_id )->value('parking_lot_id');
        DB::table('parking_lots')->where('id', $parking_lot_id)->update(['occupied'=> false]);

        return $payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
