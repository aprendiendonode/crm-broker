<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OpportunityResultNotification extends Notification
{
    use Queueable;



    public $opportunity_result;
    public $opportunity;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity_result,$opportunity)
    {
        $this->opportunity_result = $opportunity_result;
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
            'message' => 'A New Opportunity Result Has Been Confirmed To You',
            'opportunity_result_id' => $this->opportunity_result->id,
            'type'    => 'result',
            'opportunity_id' => $this->opportunity->id
        ];
    }
}