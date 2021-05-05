<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OpportunityTaskNotification extends Notification
{
    use Queueable;



    public $opportunity_task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($opportunity_task)
    {
        $this->opportunity_task = $opportunity_task;
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
            'message' => 'A New Opportunity Task Has Been Assigned To You',
            'opportunity_task_id' => $this->opportunity_task->id,
            'type'    => 'task'
        ];
    }
}