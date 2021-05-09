<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareRequest extends Mailable
{


    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $message;
    public $subject;

    public function __construct($message,$subject)
    {
        $this->message  = $message;
        $this->subject  = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->html($this->message);
    }
}
