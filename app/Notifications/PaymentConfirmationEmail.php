<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\PaymentOption;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentConfirmationEmail extends Notification
{
    use Queueable;

    protected $payment;
    /**
     * Create a new notification instance.
     */
    public function __construct(Payment $payment, PaymentOption $paymentOption)
    {
        $this->payment = $payment;
        $this->paymentOption = $paymentOption;
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
            ->subject('Payment Confirmation')
            ->greeting('Greetings,' )
            ->line('This is to confirm your payment for ticket '.$this->payment->ticket_id)
            ->line('Receipt Details:')
            ->line('    price: Ksh.' .$this->payment->price)
            ->line('    payment option: '.$this->paymentOption->payment_option)
            ->line('    paid at: '.Carbon::parse($this->payment->created_at)->format('d/m/Y h:i A')); 
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
