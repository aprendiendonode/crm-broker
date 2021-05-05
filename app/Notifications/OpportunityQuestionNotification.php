<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OpportunityQuestionNotification extends Notification
{
    use Queueable;



    public $opportunity_question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity_question)
    {
        $this->opportunity_question = $opportunity_question;
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

            'message' => 'A New Opportunity Question Has Been Made By Management',
            'opportunity_question_id' => $this->opportunity_question->id,
            'type'    => 'question'
        ];
    }
}