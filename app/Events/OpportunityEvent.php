<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OpportunityEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_id;
    public $type;
    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity, $id)
    {
        $this->opportunity_id = $opportunity->id;
        $this->id = $id;
        $this->type           = 'assign';
        $this->message        = 'A New Opportunity Has Been Assigned To You';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('private-channel');
        return ['private.mychannel.' . $this->id];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}