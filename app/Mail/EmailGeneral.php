<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailGeneral extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

//    protected $email;
//    protected $name;
    protected $message;
    public $subject;
    public $attach;

    public function __construct($message,$subject,$attach=null)
    {
//        $this->email    = $email;
//        $this->name     = $name;
        $this->message  = $message;
        $this->subject  = $subject;
        $this->attach   = $attach;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->from($this->email, $this->name)->subject($this->subject)->html($this->message);
        if ($this->attach != null){

            return $this->subject($this->subject)->html($this->message)->attach($this->attach);
        }

        return $this->subject($this->subject)->html($this->message);
//        return $this->view('view.name');
    }
}
