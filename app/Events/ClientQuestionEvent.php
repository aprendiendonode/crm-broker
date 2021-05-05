<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClientQuestionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $opportunity_question_id;
    public $id;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($opportunity_question, $id)
    {
        $this->opportunity_question_id = $opportunity_question->id;
        $this->id        = $id;
        $this->type      = 'question';
        $this->message   = 'A New Client Question Has Been Made By Management';
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