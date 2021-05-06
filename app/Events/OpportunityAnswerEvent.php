<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OpportunityAnswerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_answer_id;
    public $id;
    public $type;
    public $opportunity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity_answer, $id,$opportunity)
    {
        $this->opportunity_answer_id = $opportunity_answer->id;
        $this->id        = $id;
        $this->type      = 'answer';
        $this->message   = 'Opportunity Answer Has Been Made By ' . auth()->user()->name_en;
        $this->opportunity   =  $opportunity;
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