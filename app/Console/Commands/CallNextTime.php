<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use Illuminate\Console\Command;

class CallNextTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'call:next_time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail and notification to reminder the call';

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
        $content = '<p>Hi {STAFF_NAME},</p>
                <p> Reminder The Next Call Date To {MODULE} Of #{MODULE_ID} at {TIME}  in {NEXT_DATE} .</p>
                <br><br>Regards<br>The {SITE_NAME} Team</p>';
        $subject = 'NEXT DATE CALL';

//        if (date('h:i').':00' == '09:00:00'){
        $calls = getCallUpcoming();

        foreach($calls as $call){
            $company_name = $call->agency && $call->agency->company_name_en ? $call->agency->company_name_en : 'Broker';
            $template = get_template($call->agency_id, 'next_call');
            if ($template){

                $content = $template->description_en ?? $content;
                $subject = $template->title ?? $subject;
            }

            $message = str_replace("{STAFF_NAME}",$call->madeBy && $call->madeBy->name_en ? $call->madeBy->name_en :'',$content);
            $message = str_replace("{MODULE}",$call->module ?? '',$message);
            $message = str_replace("{MODULE_ID}",$call->module_id ?? '',$message);
            $message = str_replace("{NEXT_DATE}",$call->next_action_date ?? '----',$message);
            $message = str_replace("{TIME}",$call->next_action_time ?? '----',$message);
            $message = str_replace("{SITE_NAME}",$company_name,$message);

            $user_email = $call->madeBy && $call->madeBy->email ? $call->madeBy->email : null ;
            if ($user_email){

                $next_time = $call->next_action_time;

                if (!$next_time && date('H:i') == '09:00'){

                    SendEmail::dispatch($user_email, $message, $subject);

                } elseif ( $next_time == date('H:i').':00'){

                    SendEmail::dispatch($user_email, $message, $subject);
                }
            }

        }

        return 0;
    }
}
