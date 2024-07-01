<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticket-submitted')
                    ->subject('New Ticket Submitted')
                    ->with('ticket', $this->ticket);
    }
}
