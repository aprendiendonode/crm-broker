<?php

namespace App\Jobs;

use App\Exports\FaildLeadsExport;
use App\Mail\EmailGeneral;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SendFailedLeadsMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filename = 'failed leads'.time().'.xlsx';
        Excel::store(new FaildLeadsExport(),$filename );
        Mail::to($this->email )->send(new EmailGeneral('this is some leads failed to insert some data','Broker Leads',storage_path('app/'.$filename)));
    }
}
