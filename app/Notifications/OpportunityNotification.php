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

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity)
    {
        $this->opportunity = $opportunity;
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
            'message'        => 'A New Opportunity Has Been Assigned To You',
            'opportunity_id' => $this->opportunity->id,
            'type'           => 'assign'
        ];
    }
}