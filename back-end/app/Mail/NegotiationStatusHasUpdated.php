<?php

namespace App\Mail;

use App\Models\Negotiation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NegotiationStatusHasUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public Negotiation $negotiation;

    public User $receiver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Negotiation $negotiation, User $receiver)
    {
        $this->negotiation = $negotiation;
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
