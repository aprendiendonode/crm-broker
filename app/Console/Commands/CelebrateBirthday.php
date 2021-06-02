<?php

namespace App\Console\Commands;

use App\Events\CronJobMailEvent;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CronJobMailNotification;
use Illuminate\Console\Command;
use Modules\Sales\Entities\Client;
use App\Mail\EmailGeneral;
use Illuminate\Support\Facades\Mail;

class CelebrateBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to congratulate the user on his birthday';

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
        $content = '<p>Hi {SALUTATION} {CLIENT_NAME},</p>
                <p>We\'re wishing you a Happy birthday!!, May your birthday be the start of a year filled with good luck, good health and much happiness.</p>
                <br><br>Regards<br>The {SITE_NAME} Team</p>';
        $subject = 'HAPPY BIRTHDAY';

//        if (date('H:i') == '09:00'){
            $clients = getClientUpcomingBirthdays();

            foreach ($clients as $client){
                $company_name = $client->agency && $client->agency->company_name_en ? $client->agency->company_name_en : 'Broker';
                    $template = get_template($client->agency_id, 'happy_birthday');
                    if ($template){

                        $content = $template->description_en ?? $content;
                        $subject = $template->title ?? $subject;
                    }

                    $message = str_replace("{CLIENT_NAME}",$client->name,$content);
                    $message = str_replace("{SALUTATION}",$client->salutation,$message);
                    $message = str_replace("{SITE_NAME}",$company_name,$message);

                    $client_email = $client->email1;
                    if (!$client_email){
                        $client_email = $client->email2 ?? null;
                    }

                    if ($client_email){

                        SendEmail::dispatch($client_email, $message, $subject);

                        event(new CronJobMailEvent($template ?? null,$client->id,'Send an email to congratulate the user on his birthday',
                            'happy_birthday'));

//                        Mail::to($client_email)->send(new EmailGeneral($message, $subject));
                    }

            }
            Notification::send($clients, new CronJobMailNotification($template ?? null,
                'Send an email to congratulate the user on his birthday','happy_birthday'));
//        }
        return 0;
    }
}
