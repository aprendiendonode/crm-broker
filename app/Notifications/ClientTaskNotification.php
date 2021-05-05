<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ClientTaskNotification extends Notification
{
    use Queueable;



    public $client_task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($client_task)
    {
        $this->client_task = $client_task;
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
            'message' => 'A New Client Task Has Been Assigned To You',
            'client_task_id' => $this->client_task->id,
            'type'    => 'task'
        ];
    }
}