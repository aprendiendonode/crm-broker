<?php

namespace App\Jobs;

use App\Exports\FaildLeadsExport;
use App\Mail\EmailGeneral;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExportFailedLeadsFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email,$agency,$filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$agency,$filename)
    {
        $this->email = $email;
        $this->agency = $agency;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Excel::store(new FaildLeadsExport($this->agency),$this->filename );
    }
}
