<?php

use Intervention\Image\Facades\Image;
use  Modules\Activity\Entities\ActivityLog;
use Modules\Setting\Entities\EmailNotify;
use Modules\Setting\Entities\EmailNotifyReminder;
use Modules\Activity\Entities\TaskStatus;
use Modules\Activity\Entities\Task;
use Modules\Setting\Entities\Template;
use App\Models\SystemTemplate;
use App\Models\Agency;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Call;


if (!function_exists('owner')) {
    function owner()
    {
        return auth()->user()->type == 'owner' ? true : false;
    }
}


if (!function_exists('get_owner')) {
    function get_owner()
    {
        $owner = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type', 'owner')->get();

        return $owner->first() ? $owner->first() : [];
    }
}


if (!function_exists('moderator')) {
    function moderator()
    {
        return auth()->user()->type == 'moderator' ? true : false;
    }
}

if (!function_exists('upload_profile_image')) {
    function upload_profile_image($file, $path, $user)
    {
        if ($file != null) {
            if ($user->image != null) {

                if (file_exists(public_path($path . '/' . $user->image)))
                    unlink(public_path($path . '/' . $user->image));
            }
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);

            return $fileName;
        }
        return null;
    }
}


if (!function_exists('upload_agency_image')) {
    function upload_agency_image($file, $path, $agency)
    {
        if ($file != null) {
            if ($agency->image != null) {

                if (file_exists(public_path($path . '/' . $agency->image)))
                    unlink(public_path($path . '/' . $agency->image));
            }
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);

            return $fileName;
        }
        return null;
    }
}
if (!function_exists('upload_image')) {
    function upload_image($file, $path, $time = null, $watermark = null)
    {
        if ($file != null) {
            if ($time) {

                $fileName = time() . '-' . $file->getClientOriginalName();
            } else {

                $fileName = $file->getClientOriginalName();
            }
            if (!file_exists($path)) {
                mkdir($path);
            }


            $file->move($path, $fileName);



            if ($watermark) {

                

                dd();
//                $img =  (string) Image::make($file)->encode('png', 75);

                $filename = imagepng(imagecreatefromstring($path .$fileName));
                dd($filename);

//                $img = Image::make($file);

// perform some modifications
//                $img->resize(100, 100);
//                $img->invert();
//                $img->save('public/small.jpg');

//                $img->resize(100, 100, function ($constraint) {
//                    $constraint->aspectRatio();
////                    $constraint->upsize();
//                });
//                $img->opacity(20);
//                dd($file->getClientOriginalNameWi());
//                $img->save($path . '/' . $fileName);
//
//                return $fileName;

//                $file = $img;
            }



            return $fileName;
        }
        return null;
    }
}


if (!function_exists('upload_flag')) {
    function upload_flag($file, $path, $name, $country)
    {
        if ($file != null) {
            if ($country->flag != null) {

                if (file_exists(public_path($path . '/' . $country->flag)))
                    unlink(public_path($path . '/' . $country->flag));
            }
            $fileName = $name;
            $file->move($path, $fileName);

            return $fileName;
        }
        return null;
    }
}


if (!function_exists('remove_image')) {
    function remove_image($image, $path)
    {


        if (file_exists(public_path($path . '/' . $image))) {
            unlink(public_path($path . '/' . $image));
        }

        return true;
    }
}


if (!function_exists('flash')) {
    function flash($message = 'No Message Set', $type = 'info')
    {

        return [
            'message' => $message,
            'alert-type' => $type
        ];
    }
}


if (!function_exists('agency_settings')) {
    function agency_settings($setting = null)
    {
        $agency_setting = \App\Models\AgencySetting::where('agency_id', request('agency'))->first();
        $agency_setting_data = [];

        if ($agency_setting != null) {

            $agency_setting_data = $agency_setting;
        } else {

            $agency_setting_data = (object)[
                "quick_show_number_of_bedrooms" => "yes",
                "quick_show_number_of_parkings" => "yes",
                "quick_show_number_of_photos" => "yes",
                "quick_show_number_of_videos" => "yes",
                "listings_landlord_should_be_mandatory" => "yes",
                "listings_source_should_be_mandatory" => "yes",
                "listings_reference_should_contain_staff_initial" => "no",
                "listings_show_building_name" => "no",

                "leads_can_assign_multiple_agents" => "no",
                "leads_source_should_be_mandatory" => "no",
                "leads_contacts_should_be_mandatory" => "no",
                "leads_area_min_should_be_mandatory" => "no",
                "leads_budget_max_should_be_mandatory" => "no",

                "contacts_per_page" => 20,
                "company_profile_primary_number_should_be_mandatory" => "no",
                "lsm_overall_status" => "activated",
                "lsm_share_status" => "private",
                "lsm_listings_per_page" => 20,
            ];
        }
        $filters = [
            "quick_show_number_of_bedrooms",
            "quick_show_number_of_parkings",
            "quick_show_number_of_photos",
            "quick_show_number_of_videos",
            "listings_landlord_should_be_mandatory",
            "listings_source_should_be_mandatory",
            "listings_reference_should_contain_staff_initial",
            "listings_show_building_name",

            "leads_can_assign_multiple_agents",
            "leads_source_should_be_mandatory",
            "leads_contacts_should_be_mandatory",
            "leads_area_min_should_be_mandatory",
            "leads_budget_max_should_be_mandatory",

            "contacts_per_page",
            "company_profile_primary_number_should_be_mandatory",
            "lsm_overall_status",
            "lsm_share_status",
            "lsm_listings_per_page",
        ];


        if (!in_array($setting, $filters)) {
            return $agency_setting_data;
        }
        if ($setting != null) {
            return $agency_setting_data->{$setting};
        } else {
            return $agency_setting_data;
        }
    }
}
if (!function_exists('words')) {

    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}


if (!function_exists('staff')) {

    function staff($agency)
    {
        $staff = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type', 'staff')->where('agency_id', $agency)->get();
        $moderators = \App\Models\User::where('type', 'moderator')->get()->filter(function ($q) use ($agency) {
            $can_access = explode(',', $q->can_access);
            return in_array($agency, $can_access);
        });


        $merged = $staff->merge($moderators);


        $owner = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type', 'owner')->get();

        $final = $merged->merge($owner);


        return $final;
    }
}


function array_replace_key($search, $replace, array $subject)
{
    $updatedArray = [];

    foreach ($subject as $key => $value) {
        if (!is_array($value) && $key == $search) {
            $updatedArray = array_merge($updatedArray, [$replace => $value]);

            continue;
        }

        $updatedArray = array_merge($updatedArray, [$key => $value]);
    }

    return $updatedArray;
}

if (!function_exists('deleteDirectory')) {

    function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }
        $loop_dir = scandir($dir);
        foreach ($loop_dir as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
}

if (!function_exists('setActivity')) {

    function setActivity($group, $group_id, $agency_id, $business_id, $log_en, $log_ar)
    {
        $activityData = [
            'add_by' => auth()->user()->id,
            'group' => $group,
            'group_id' => $group_id,
            'agency_id' => $agency_id,
            'business_id' => $business_id,
            'log_en' => $log_en,
            'log_ar' => $log_ar,
        ];

        ActivityLog::create($activityData);
    }
}


if (!function_exists('tasks_with_custom_reminder')) {

    function tasks_with_custom_reminder($agency_id)
    {

        $tasks = Task::with('staff', 'agency')->where('agency_id', $agency_id)->get();
        $tasks_reminder_byDate = [];

        foreach ($tasks as $task) {
            if ($task->custom_reminder == 'on') {
                if ($task->period_reminder == 'before') {
                    if ($task->type_reminder == 'days') {

                        $date = strtotime('-' . $task->type_reminder_number . ' day', strtotime($task->deadline));
                        $date_remind = date('Y-m-d', $date);
                        if (date('Y-m-d') == $date_remind) {

                            $tasks_reminder_byDate[$date_remind][$task->time][] = $task;
                        }
                    } else {
                        //hours
                        $time = strtotime('-' . $task->type_reminder_number . ' hour', strtotime($task->time));
                        $time_remind = date('h:i:s', $time);
                        if (date('Y-m-d') == $task->deadline) {

                            $tasks_reminder_byDate[$task->deadline][$time_remind][] = $task;
                        }
                    }
                } else {
                    //after
                    if ($task->type_reminder == 'days') {

                        $date = strtotime('+' . $task->type_reminder_number . ' day', strtotime($task->deadline));
                        $date_remind = date('Y-m-d', $date);
                        if (date('Y-m-d') == $date_remind) {

                            $tasks_reminder_byDate[$date_remind][$task->time][] = $task;
                        }
                    } else {
                        //hours
                        $time = strtotime('+' . $task->type_reminder_number . ' hour', strtotime($task->time));
                        $time_remind = date('h:i:s', $time);
                        if (date('Y-m-d') == $task->deadline) {

                            $tasks_reminder_byDate[$task->deadline][$time_remind][] = $task;
                        }
                    }
                }
            }
        }

        return $tasks_reminder_byDate;
    }
}

if (!function_exists('tasks_reminder')) {
    function tasks_reminder($agency_id)
    {
        $email_notify = EmailNotify::where('agency_id', $agency_id)->first();

        $status_complete = TaskStatus::where('agency_id', $agency_id)->where('type_complete', 'on')->pluck('id');

        $tasks = Task::with('staff', 'agency')->where('agency_id', $agency_id)
            ->where('custom_reminder', 'off')
            ->whereNotIn('task_status_id', $status_complete)
            ->get();


        $tasks_reminder_byDate = [];
        if ($email_notify) {

            $general_reminders = EmailNotifyReminder::where('email_notify_id', $email_notify->id)->where('category', 'general_reminder')->get();

            foreach ($general_reminders as $general_reminder) {

                $type = $general_reminder->type;
                $day = $general_reminder->day;
                $time = $general_reminder->time;


                foreach ($tasks as $task) {
                    if ($type == 'before') {

                        $date = strtotime('-' . $day . ' day', strtotime($task->deadline));
                        $date_remind = date('Y-m-d', $date);
                        if (date('Y-m-d') == $date_remind) {
                            $tasks_reminder_byDate[$date_remind][$time][] = $task;
                        }
                    } else {
                        //after
                        $date = strtotime('+' . $day . ' day', strtotime($task->deadline));
                        $date_remind = date('Y-m-d', $date);
                        if (date('Y-m-d') == $date_remind) {
                            $tasks_reminder_byDate[$date_remind][$time][] = $task;
                        }
                    }
                }
            }
            return $tasks_reminder_byDate;
        } else {

            foreach ($tasks as $task) {

                $type = '';
                $day = 0;
                $time = $task->time;

                if ($type == 'before') {

                    $date = strtotime('-' . $day . ' day', strtotime($task->deadline));
                    $date_remind = date('Y-m-d', $date);
                    if (date('Y-m-d') == $date_remind) {
                        $tasks_reminder_byDate[$date_remind][$time][] = $task;
                    }
                } else {
                    //after
                    $date = strtotime('+' . $day . ' day', strtotime($task->deadline));
                    $date_remind = date('Y-m-d', $date);
                    if (date('Y-m-d') == $date_remind) {
                        $tasks_reminder_byDate[$date_remind][$time][] = $task;
                    }
                }
            }
        }
        return $tasks_reminder_byDate;
    }
}


if (!function_exists('get_template')) {
    function get_template($agency_id, $slug)
    {
        $template = Template::where('agency_id', $agency_id)->where('slug', $slug)->where('system', 'yes')->where('type', 'email')->first();

        if ($template) {
            return $template;
        }

        $system_template = SystemTemplate::where('slug', $slug)->where('type', 'email')->first();

        if ($system_template) {
            $agency = Agency::where('id', $agency_id)->first();
            if ($agency) {
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $agency->id,
                    'business_id' => $agency->business_id,
                ]);
            }
        }
        return $template;
    }
}

if (!function_exists('getClientUpcomingBirthdays')) {
    function getClientUpcomingBirthdays()
    {
        $date = now();
        $clients = Client::with('agency')->Where(function ($query) use ($date) {

            $query->whereMonth('date_of_birth', $date->month)
                ->whereDay('date_of_birth', $date->day);
        })->get();

        return $clients;
    }
}

if (!function_exists('getCallUpcoming')) {
    function getCallUpcoming()
    {
        $date = now();
        $calls = Call::with('agency', 'madeBy')->Where('next_action_date', date('Y-m-d'))->get();

        return $calls;
    }
}
