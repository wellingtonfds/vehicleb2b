<?php

namespace App\Events;

use App\Mail\NegotiationStatusHasUpdated;
use App\Models\Negotiation;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NegotiationStatusUpdateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Negotiation $negotiation;

    public User $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Negotiation $negotiation, User $dispatcher)
    {
        $this->negotiation = $negotiation;

        $receiver = $dispatcher->type !== User::TYPE_CONSULTOR ? $negotiation->vehicle->store->user : $negotiation->user;

        $this->user = $receiver;

        $negotiationStatusUpdateMail = new NegotiationStatusHasUpdated($negotiation, $receiver);
        Mail::send($negotiationStatusUpdateMail);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
