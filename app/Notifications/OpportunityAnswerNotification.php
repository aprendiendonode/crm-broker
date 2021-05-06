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
    public $opportunity;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity_answer,$opportunity)
    {
        $this->opportunity_answer = $opportunity_answer;
        $this->opportunity = $opportunity->id;
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
            'opportunity_id' => $this->opportunity->id,
            'type'    => 'answer',

        ];
    }
}