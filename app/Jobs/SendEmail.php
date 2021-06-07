<?php

namespace App\Jobs;

use App\Mail\EmailGeneral;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $to;
    public $template;
    public $message;
    public $attach;
    public $cc;
    public $bcc;

    public function __construct($to, $template, $message,$attach=null,$cc=null,$bcc=null)
    {
        $this->to       = $to;
        $this->template = $template;
        $this->message  = $message;
        $this->attach   = $attach;
        $this->cc       = $cc;
        $this->bcc      = $bcc;
        // dd($this->to, $this->template, $this->message);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if ($this->cc){
            if ($this->bcc){

                Mail::to($this->to)->cc($this->cc)->bcc($this->bcc)
                    ->send(new EmailGeneral($this->template, $this->message,$this->attach));
            }else{

                Mail::to($this->to)->cc($this->cc)
                    ->send(new EmailGeneral($this->template, $this->message,$this->attach));
            }

        }else if ($this->bcc){

            Mail::to($this->to)->bcc($this->bcc)
                ->send(new EmailGeneral($this->template, $this->message,$this->attach));
        }else{
            Mail::to($this->to)->send(new EmailGeneral($this->template, $this->message,$this->attach));
        }

    }
}