<?php

namespace Domain\Moderators\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Support\Facades\Hash;


class UpdateModeratorData extends DataTransferObject
{

    public  $business_id;
    public  $agency_id;
    public  $team_id;
    public  $email;
    public  $brn;
    public  $active;
    public  $name_en;
    public  $name_ar;
    public  $description_en;
    public  $description_ar;
    public  $image;
    public  $nationality_id;
    public  $phone;
    public  $cell;
    public  $staff_fax;
    public  $address;
    public  $zip;
    public  $skype;
    public  $whatsapp;
    public  $password;
    public  $can_access;
    public  $country_code;
    public  $city_code;
    public  $cell_code;
    public  $fax_country_code;
    public  $fax_city_code;

    public static function  fromRequest(Request $request): self
    {
        $id = $request->id;
//        dd($request->all(),$id,$request->{'edit_email_' . $id});
        return new self([

            'email'              => $request->{'edit_email_' . $id},
            'brn'                => $request->{'edit_brn_' . $id},
            'name_en'            => $request->{'edit_name_en_' . $id},
            'name_ar'            => $request->{'edit_name_ar_' . $id},
            'description_en'     => $request->{'edit_description_en_' . $id},
            'description_ar'     => $request->{'edit_description_ar_' . $id},


            'country_code'       => $request->{'edit_country_code_' . $id},
            'city_code'          => $request->{'edit_city_code_' . $id},
            'phone'              => $request->{'edit_phone_' . $id},


            'cell_code'          => $request->{'edit_cell_code_' . $id},
            'cell'               => $request->{'edit_cell_' . $id},


            'fax_country_code'   => $request->{'edit_fax_country_code_' . $id},
            'fax_city_code'      => $request->{'edit_fax_city_code_' . $id},
            'staff_fax'          => $request->{'edit_staff_fax_' . $id},


            'address'            => $request->{'edit_address_' . $id},
            'zip'                => $request->{'edit_zip_' . $id},
            'nationality_id'     => $request->{'edit_nationality_id_' . $id},
            "skype"              => $request->{'edit_skype_' . $id},
            "active"             => $request->{'edit_active_' . $id},
            "whatsapp"           => $request->{'edit_whatsapp_' . $id},
            "team_id"            => $request->{'edit_team_id_' . $id},


            "agency_id"          => $request->agency_id,
            'business_id'        => $request->business_id,
            'can_access'         => $request->agency_id,
            'image'              => $request->hasFile('edit_image_' . $id) ? $request->{'edit_image_' . $id} :null,

        ]);
    }
}
