<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ClientAnswerNotification extends Notification
{
    use Queueable;



    public $client_answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($client_answer)
    {
        $this->client_answer = $client_answer;
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

            'message' => 'Questiion Answer On Client By Staff',
            'client_answer_id' => $this->client_answer->id,
            'type'    => 'answer'
        ];
    }
}