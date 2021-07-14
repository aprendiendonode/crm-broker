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

class FinishedStatisticsSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('id', $this->id)->get();
        event(new StatisticsFinishedEvent($this->id));
        Notification::send($users, new StatisticsFinishedNotification());
    }

}
