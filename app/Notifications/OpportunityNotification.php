<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OpportunityNotification extends Notification
{
    use Queueable;



    public $opportunity;
    public $type;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity, $type=null, $message=null)
    {
        $this->opportunity = $opportunity;
        $this->type           = $type ?? 'assign';
        $this->message        = $message ?? 'A New Opportunity Has Been Assigned To You';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }




    public function toArray($notifiable)
    {
        return [
            'message'        => $this->message,
            'opportunity_id' => $this->opportunity->id,
            'type'           => $this->type
        ];
    }
}