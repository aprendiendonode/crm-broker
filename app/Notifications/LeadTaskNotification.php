<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class LeadTaskNotification extends Notification
{
    use Queueable;



    public $lead_task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lead_task)
    {
        $this->lead_task = $lead_task;
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
            'message' => 'A New Lead Task Has Been Assigned To You',
            'lead_task_id' => $this->lead_task->id,
            'type'    => 'task'
        ];
    }
}