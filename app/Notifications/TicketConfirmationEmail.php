<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use App\Models\ParkingLot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketConfirmationEmail extends Notification
{
    use Queueable;
    
    protected $user;
    protected $ticket;
    protected $parking_lot;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user,ParkingLot $parking_lot, Ticket $ticket)
    {
        $this->user = $user;
        $this->parking_lot = $parking_lot;
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Ticket Confirmation')
                ->greeting('Greetings, '.$this->user->username)
                ->line('These are your ticket details: ')
                ->line('    Vehicle Licence Plate: '.$this->user->vehicle_lp)
                ->line('    Time Issued: '.Carbon::parse($this->ticket->created_at)->format('d/m/Y h:i A'))
                ->line('    Parking Lot: '.$this->parking_lot->id.' '.$this->parking_lot->pl_name)
                ->line('    Rate per hour: '.$this->parking_lot->price);
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}