<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OpportunityResultEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_task_id;
    public $id;
    public $type;
    public $opportunity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity_task, $id,$opportunity)
    {
        $this->opportunity_task_id = $opportunity_task->id;
        $this->id        = $id;
        $this->type      = 'result';
        $this->message   = 'A New Opportunity Result Has Been Confirmed To You';
        $this->opportunity   = $opportunity->id;
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