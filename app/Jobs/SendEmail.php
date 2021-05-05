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
    public function __construct($to, $template, $message)
    {
        $this->to = $to;
        $this->template = $template;
        $this->message = $message;
        // dd($this->to, $this->template, $this->message);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {



        Mail::to($this->to)->send(new EmailGeneral($this->template, $this->message));
    }
}