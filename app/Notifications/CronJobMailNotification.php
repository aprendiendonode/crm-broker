<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CronJobMailNotification extends Notification
{
    use Queueable;

    public $module;
    public $message;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($module, $message,$type)
    {
        $this->module   = $module;
        $this->message  = $message;
        $this->type     = $type;
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

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
//            'message' => 'A New Lead Task Has Been Assigned To You',
            'message'   => $this->message,
            'module_id' => $this->module && $this->module->id ? $this->module->id : $this->module,
            'type'      => $this->type
        ];
    }
}
