<?php

namespace App\Console\Commands;

use App\Events\CronJobMailEvent;
use App\Jobs\SendEmail;
use App\Mail\EmailGeneral;
use App\Models\Agency;
use App\Notifications\CronJobMailNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class TaskReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email To Reminder Staff The Deadline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $agencies = Agency::all();

        foreach ($agencies as $agency){
            $tasks_with_custom_reminder = tasks_with_custom_reminder($agency->id);
            $tasks_reminder = tasks_reminder($agency->id);

            $content = '<p>Hi {STAFF_NAME},</p>
                <p>Reminder The Task <strong>#{TASK_ID}</strong> &nbsp;has a deadline to you at <strong>{TIME}</strong> in <strong>{DEADLINE}</strong>.</p>
                <p>Please check the task and Update it.</p>
                <p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>';
            $subject = 'TASK DEADLINE';

            $merged = array_merge($tasks_with_custom_reminder, $tasks_reminder);

            foreach ($merged as $date_remind => $custom_reminder){


                if (date('Y-m-d') == $date_remind){

                    foreach ($custom_reminder as $time_remind => $tasks){

                        if (date('h:i').':00' == $time_remind){
//                        if ($time_remind == $time_remind){
                            foreach ($tasks as $task){

                                $staffs = $task->staff;
                                $company_name = $task->agency && $task->agency->company_name_en ? $task->agency->company_name_en : 'Broker';
                                foreach ($staffs as $staff){

                                    $link = 'activity/tasks/'.$task->agency_id.'/show/'.$task->id;
                                    $message = str_replace("{STAFF_NAME}",$staff->name_en,$content);
                                    $message = str_replace("{TASK_ID}",$task->id,$message);
                                    $message = str_replace("{DEADLINE}",$task->deadline,$message);
                                    $message = str_replace("{{TIME}}",$task->time,$message);
                                    $message = str_replace("{TASK_URL}",url($link),$message);
                                    $message = str_replace("{SITE_NAME}",$company_name,$message);

                                    SendEmail::dispatch($staff->email, $message, $subject);

                                    event(new CronJobMailEvent($task ,$staff->id,'Send Email To Reminder Staff The Deadline',
                                        'task_reminder'));
//                                    Mail::to($staff->email)->send(new EmailGeneral($message, $subject ));

                                }
                                Notification::send($staffs, new CronJobMailNotification($task,
                                    'Send Email To Reminder Staff The Deadline','task_reminder'));

                            }
                        }
                    }
                }
            }
        }
        return 0;
    }
}
