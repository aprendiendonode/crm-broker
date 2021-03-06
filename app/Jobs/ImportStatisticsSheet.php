<?php

namespace App\Jobs;

use App\Events\StatisticsFinishedEvent;
use App\Exports\FaildLeadsExport;
use App\Imports\LeadsImport;
use App\Imports\StatisticsImport;
use App\Mail\EmailGeneral;
use App\Models\User;
use App\Notifications\StatisticsFinishedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportStatisticsSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $business, $agency, $file,$id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $business, $agency, $file,$id)
    {
        $this->business = $business ;
        $this->agency = $agency ;
        $this->file = $file ;
        $this->id = $id ;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::Import(new StatisticsImport(
            $this->business,
            $this->agency
        ), public_path('statistics_sheets/'.$this->file));
    }

}
