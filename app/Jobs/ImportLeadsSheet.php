<?php

namespace App\Jobs;

use App\Exports\FaildLeadsExport;
use App\Imports\LeadsImport;
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

class ImportLeadsSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $source_id, $qualification_id, $type_id, $communication_id, $priority_id, $business, $agency, $file,$email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$source_id, $qualification_id, $type_id, $communication_id, $priority_id, $business, $agency, $file)
    {
        $this->email = $email ;
        $this->source_id = $source_id ;
        $this->qualification_id = $qualification_id ;
        $this->type_id = $type_id ;
        $this->communication_id = $communication_id ;
        $this->priority_id = $priority_id ;
        $this->business = $business ;
        $this->agency = $agency ;
        $this->file = $file ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Excel::Import(new LeadsImport(
            $this->email,
            $this->source_id,
            $this->qualification_id,
            $this->type_id,
            $this->communication_id,
            $this->priority_id,
            $this->business,
            $this->agency
        ), public_path('leads_sheets/'.$this->file));
    }
}
