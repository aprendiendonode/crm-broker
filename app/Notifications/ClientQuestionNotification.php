<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ClientQuestionNotification extends Notification
{
    use Queueable;



    public $client_question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($client_question)
    {
        $this->client_question = $client_question;
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

            'message' => 'A New Client Question Has Been Made By Management',
            'client_question_id' => $this->client_question->id,
            'type'    => 'question'
        ];
    }
}