<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OpportunityQuestionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_question_id;
    public $id;
    public $type;
    public $opportunity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity_question, $id,$opportunity)
    {
        $this->opportunity_question_id = $opportunity_question->id;
        $this->id        = $id;
        $this->type      = 'question';
        $this->message   = 'A New Opportunity Question Has Been Made By Management';
        $this->opportunity   = $opportunity;
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