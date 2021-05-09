<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ListingTaskEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $listing_task_id;
    public $id;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($listing_task, $id)
    {
        $this->listing_task_id = $listing_task->id;
        $this->id        = $id;
        $this->type      = 'task';
        $this->message   = 'A New Listing Task Has Been Assigned To You';
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