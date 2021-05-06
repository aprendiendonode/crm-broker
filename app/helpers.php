<?php




if (!function_exists('owner')) {
    function owner()
    {
        return auth()->user()->type == 'owner' ? true : false;
    }
}




if (!function_exists('get_owner')) {
    function get_owner()
    {
        $owner  = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type',  'owner')->get();

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
    function upload_image($file, $path, $time = null)
    {
        if ($file != null) {
            if ($time) {

                $fileName =  time() . '-' . $file->getClientOriginalName();
            } else {

                $fileName =  $file->getClientOriginalName();
            }
            if (!file_exists($path)) {
                mkdir($path);
            }
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
        $agency_setting  = \App\Models\AgencySetting::where('agency_id', request('agency'))->first();
        $agency_setting_data = [];

        if ($agency_setting != null) {

            $agency_setting_data = $agency_setting;
        } else {

            $agency_setting_data = (object)[
                "quick_show_number_of_bedrooms" => "yes",
                "quick_show_number_of_parkings" =>  "yes",
                "quick_show_number_of_photos" =>  "yes",
                "quick_show_number_of_videos" =>  "yes",
                "listings_landlord_should_be_mandatory" =>  "yes",
                "listings_source_should_be_mandatory" =>  "yes",
                "listings_reference_should_contain_staff_initial" =>  "no",
                "listings_show_building_name" =>  "no",

                "leads_can_assign_multiple_agents" =>  "no",
                "leads_source_should_be_mandatory" =>  "no",
                "leads_contacts_should_be_mandatory" =>  "no",
                "leads_area_min_should_be_mandatory" =>  "no",
                "leads_budget_max_should_be_mandatory" =>  "no",

                "contacts_per_page" => 20,
                "company_profile_primary_number_should_be_mandatory" => "no",
                "lsm_overall_status"     => "activated",
                "lsm_share_status"       => "private",
                "lsm_listings_per_page"  => 20,
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
            return  $agency_setting_data->{$setting};
        } else {
            return $agency_setting_data;
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
            $staff       = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type',  'staff')->where('agency_id', $agency)->get();
            $moderators  = \App\Models\User::where('type', 'moderator')->get()->filter(function ($q) use ($agency) {
                $can_access = explode(',', $q->can_access);
                return in_array($agency, $can_access);
            });


            $merged = $staff->merge($moderators);


            $owner  = \App\Models\User::where('business_id', auth()->user()->business_id)->Where('type',  'owner')->get();

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

            foreach (scandir($dir) as $item) {
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
}
