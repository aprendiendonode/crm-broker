<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ListingTaskNotification extends Notification
{
    use Queueable;



    public $listing_task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($listing_task)
    {
        $this->listing_task = $listing_task;
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
            'message' => 'A New Listing Task Has Been Assigned To You',
            'listing_task_id' => $this->listing_task->id,
            'type'    => 'task'
        ];
    }
}