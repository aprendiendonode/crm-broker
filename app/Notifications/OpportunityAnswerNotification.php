<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OpportunityAnswerNotification extends Notification
{
    use Queueable;



    public $opportunity_answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity_answer)
    {
        $this->opportunity_answer = $opportunity_answer;
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

            'message' => 'Opportunity Answer Has Been Made Staff',
            'opportunity_answer_id' => $this->opportunity_answer->id,
            'type'    => 'answer'
        ];
    }
}