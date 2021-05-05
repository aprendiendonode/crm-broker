<?php

use Pusher\Pusher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['checkauth', 'authority', 'lang'])->group(function () {



    Route::prefix('sales')->group(function () {

        // Route::get('sendmessage/{agency}', function () {
        //     header('location:https://api.whatsapp.com/send?phone=201006143107&text=test');
        // });

        // manage staff routes

        Route::get('month/{agency}', function () {


            // dd(date('Y-m', strtotime('-1 months', strtotime('2021-03'))));
            // $period_count = 28;

            $month        =  '2021-03';
            $date_of_join = '2021-03-01';

            // dd(date('Y-m', strtotime($month . ' - 1 month')));
            $count  = cal_days_in_month(CAL_GREGORIAN, (date('m', strtotime($month)) - 1), date('Y', strtotime($month)));

            $before_month = date('Y-m', strtotime($month . ' - 1 month'));

            // dd($count, $before_month, date('Y-m-d', strtotime($before_month . '-' . $count)));

            if (date('Y-m', strtotime($date_of_join)) > $before_month) {

                if ($count < 30) {

                    $difference = 30 - $count;


                    if ($difference > 0) {

                        for ($i = 0; $i < $difference; $i++) {

                            dump($i);
                        }
                    }
                }
            }



            dd('here');
            // $count = cal_days_in_month(CAL_GREGORIAN, (date('m', strtotime($month)) - 1), date('Y', strtotime($month)));
            $count = cal_days_in_month(CAL_GREGORIAN, (date('Y-m', strtotime($month)) - 1), date('Y', strtotime($month)));
            dd($count);


            if ($count < 30) {
                $diff = 30 - $count;

                for ($i = 1; $i <= $diff; $i++) {
                    //     $data_absent = array(
                    //         'user_id' => $user->user_id,
                    //         'date'    => $date,

                    //         'method' =>'count_holiday'
                    //     );

                    //     $this->db->insert('tbl_absent', $data_absent);
                }
            }
        });
        Route::get('leads/{agency}', 'LeadsController@index');
        Route::get('leads/bulk_uploads/{agency}', 'LeadsController@bulk_uploads');
        Route::post('leads/smart_import_sheet', 'LeadsController@bulk_uploads_process')->name('smart_import_sheet');


        Route::get('lead-sources/{agency}', 'LeadSourcesController@index');
        Route::get('call-status/{agency}', 'CallStatusController@index');

        Route::get('lead-qualifications/{agency}', 'LeadQualificationsController@index');

        Route::get('developers/{agency}', 'DeveloperController@index');

        Route::get('lead-types/{agency}', 'LeadTypesController@index');


        Route::get('lead-priorities/{agency}', 'LeadPrioritiesController@index');
        Route::get('lead-communications/{agency}', 'LeadCommunicationsController@index');
        Route::get('lead-property/{agency}', 'LeadPropertyController@index');



        Route::get('opportunity-stage/{agency}', 'OpportunityStagesController@index');



        Route::get('opportunities/{agency}', 'OpportunitiesController@index');
        Route::get('clients/{agency}', 'ClientsController@index');
    });
});

Route::middleware(['checkauth', 'lang'])->group(function () {


    Route::prefix('sales')->group(function () {
        Route::post('manage_leads', 'LeadsController@store');
        Route::post('manage_leads/{id}', 'LeadsController@update');
        Route::post('delete-manage_leads', 'LeadsController@destroy');



        Route::post('manage_lead_source', 'LeadSourcesController@store');
        Route::post('lead_source_from_leads', 'LeadsController@add_lead_source');
        Route::patch('manage_lead_sources/{staff_id}', 'LeadSourcesController@update');
        Route::post('delete-leadsource', 'LeadSourcesController@destroy');

        Route::post('manage_developer', 'DeveloperController@store');
        Route::post('developer_from_leads', 'LeadsController@add_developer');
        Route::patch('manage_developers/{developer_id}', 'DeveloperController@update');
        Route::post('delete-developer', 'DeveloperController@destroy');


        Route::post('manage_call_status', 'CallStatusController@store');
        Route::patch('manage_call_status/{call_id}', 'CallStatusController@update');
        Route::post('call_status_from_index', 'CallStatusController@add_call_status');
        Route::post('delete-callstatus', 'CallStatusController@destroy');



        Route::post('manage_lead_qualifications', 'LeadQualificationsController@store');
        Route::post('lead_qualification_from_leads', 'LeadsController@add_lead_qualification');

        Route::patch('manage_lead_qualifications/{staff_id}', 'LeadQualificationsController@update');
        Route::post('delete-leadqualification', 'LeadQualificationsController@destroy');




        Route::post('manage_lead_types', 'LeadTypesController@store');
        Route::post('lead_type_from_leads', 'LeadsController@add_lead_type');

        Route::patch('manage_lead_types/{staff_id}', 'LeadTypesController@update');
        Route::post('delete-leadtype', 'LeadTypesController@destroy');



        Route::post('manage_lead_priorities', 'LeadPrioritiesController@store');
        Route::post('lead_priority_from_leads', 'LeadsController@add_lead_priority');

        Route::patch('manage_lead_priorities/{staff_id}', 'LeadPrioritiesController@update');
        Route::post('delete-leadpriority', 'LeadPrioritiesController@destroy');


        Route::post('manage_lead_communications', 'LeadCommunicationsController@store');
        Route::post('lead_communication_from_leads', 'LeadsController@add_lead_communication');

        Route::patch('manage_lead_communications/{staff_id}', 'LeadCommunicationsController@update');
        Route::post('delete-leadcommunication', 'LeadCommunicationsController@destroy');


        Route::post('manage_lead_property', 'LeadPropertyController@store');
        Route::post('lead_property_from_leads', 'LeadsController@add_lead_property');

        Route::patch('manage_lead_property/{staff_id}', 'LeadPropertyController@update');
        Route::post('delete-leadproperty', 'LeadPropertyController@destroy');



        //update leads table from index
        Route::post('leads-update-source', 'LeadsController@update_source_index');
        Route::post('leads-update-type', 'LeadsController@update_type_index');
        Route::post('update-qualification-leads', 'LeadsController@update_qualification_index');


        // make call
        Route::patch('manage_leads/assign_call/{lead_id}', 'LeadsController@make_call');

        Route::post('delete-calls', 'LeadsController@delete_call');
        Route::post('assign_staff', 'LeadsController@assign_staff');


        // assign task
        Route::patch('manage_leads/assign_task/{lead_id}', 'LeadsController@assign_task');
        Route::post('delete-tasks', 'LeadsController@delete_task');


        // oportunities

        Route::post('manage_opportunity_stage', 'OpportunityStagesController@store');


        Route::post('opportunity_stage_from_leads', 'OpportunitiesController@add_opportunity_stage');

        Route::patch('manage_opportunity_stage/{stage_id}', 'OpportunityStagesController@update');


        Route::post('delete-stage', 'OpportunityStagesController@destroy');


        Route::post('convert-to-opportunity', 'LeadsController@convert_to_opportunity');



        // Route::post('opportunities-update-stage', 'OpportunitiesController@update_stage_index');
        Route::post('opportunities-update-qualification', 'OpportunitiesController@update_qualification_index');

        Route::post('delete-opportunities', 'OpportunitiesController@destroy');

        Route::post('opportunity_stage_from_leads', 'OpportunitiesController@add_opportunity_stage');




        Route::patch("manage_opportunities/{opportunity_id}", 'OpportunitiesController@update');

        Route::patch('manage_opportunities/assign_task/{opportunity_id}', 'OpportunitiesController@assign_task');
        Route::patch('manage_opportunities/edit_assign_task/{opportunity_id}', 'OpportunitiesController@edit_assign_task');

        Route::post('delete-opportunity-tasks', 'OpportunitiesController@delete_task');

        Route::post('assign_opportunity_staff', 'OpportunitiesController@assign_staff');

        Route::patch('manage_opportunities/assign_call/{opportunity_id}', 'OpportunitiesController@make_call');

        Route::post('delete-opportunity-calls', 'OpportunitiesController@delete_call');

        Route::post('convert-to-client', 'OpportunitiesController@convert_to_client');
        Route::patch('manage_opportunities/result/{opportunity_id}', 'OpportunitiesController@result');
        Route::patch('manage_opportunities/question/{opportunity_id}', 'OpportunitiesController@question');
        Route::post('answer', 'OpportunitiesController@answer');


        Route::post('clients-update-stage', 'ClientsController@update_stage_index');

        Route::post('delete-clients', 'ClientsController@destroy');

        Route::post('client_stage_from_leads', 'ClientsController@add_client_stage');


        Route::patch("manage_clients/{client_id}", 'ClientsController@update');

        Route::patch('manage_clients/assign_task/{client_id}', 'ClientsController@assign_task');
        Route::patch('manage_clients/question/{client_id}', 'ClientsController@question');


        Route::post('delete-client-tasks', 'ClientsController@delete_task');

        Route::post('assign_client_staff', 'ClientsController@assign_staff');

        Route::patch('manage_clients/assign_call/{client_id}', 'ClientsController@make_call');

        Route::post('delete-client-calls', 'ClientsController@delete_call');



        Route::post('client-reject', 'OpportunitiesController@client_reject');
        Route::post('client-hold', 'OpportunitiesController@client_hold');


        Route::post('suggest-for-approve', 'OpportunitiesController@suggest_new_convert');
        Route::post('client-approve', 'OpportunitiesController@approve');

        Route::post('opportunity-remove-document', 'OpportunitiesController@remove_document');

        Route::post('approve-opportunity-to-client', 'OpportunitiesController@approve_client');


        Route::post('pusher/auth', function () {

            if (!auth()->check()) {
                header('HTTP/1.1 403 Forbidden');
                return response()->json(['error' => 'Not Authorized']);
            }

            if (true) {
                $app_id = env('PUSHER_APP_ID');
                $app_key = env('PUSHER_APP_KEY');
                $app_secret = env('PUSHER_APP_SECRET');
                $channel_name = trim($_REQUEST['channel_name']);
                $socket_id = trim($_REQUEST['socket_id']);

                $pusher = new Pusher($app_key, $app_secret, $app_id);
                $auth = $pusher->socket_auth($channel_name, $socket_id);

                header('Content-Type: application/javascript');
                echo ($auth);

                // dd($auth);
            } else {
                header('HTTP/1.1 403 Forbidden');
                return response()->json(['error' => 'Not Authorized']);
            }
        });
    });
});
