<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClientAnswerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_answer_id;
    public $id;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity_answer, $id)
    {
        $this->opportunity_answer_id = $opportunity_answer->id;
        $this->id        = $id;
        $this->type      = 'answer';
        $this->message   = 'Question On Client Has Been Answered  By ' . auth()->user()->name_en;
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