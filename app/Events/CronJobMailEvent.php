<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CronJobMailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $module_id;
    public $id;
    public $type;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($module, $id, $message,$type)
    {
        $this->module_id    = $module && $module->id ? $module->id : $module;
        $this->id           = $id;
        $this->type         = $type;
        $this->message      = $message;
//        $this->message      = 'A New Lead Task Has Been Assigned To You';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
        return ['private.mychannel.' . $this->id];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
