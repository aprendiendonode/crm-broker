<?php

namespace Domain\Moderators\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Support\Facades\Hash;


class CreateModeratorData extends DataTransferObject
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

    public static function  fromRequest(Request $request): self
    {

        return new self([

            'email'              => $request->email,
            'brn'                => $request->brn,
            'name_en'            => $request->name_en,
            'name_ar'            => $request->name_ar,
            'description_en'     => $request->description_en,
            'description_ar'     => $request->description_ar,
            'password'           => $request->password,
            'phone'              => $request->phone,
            'cell'               => $request->cell,
            'staff_fax'          => $request->staff_fax,
            'address'            => $request->address,
            'zip'                => $request->zip,
            'nationality_id'     => $request->nationality_id,
            "skype"              => $request->skype,
            "active"             => $request->active,
            "whatsapp"           => $request->whatsapp,
            "team_id"            => $request->team_id,
            "agency_id"          => $request->agency_id,
            'business_id'        => $request->business_id,
            'can_access'         => $request->agency_id,
            'image'              => $request->hasFile('image') ? $request->image :null,

        ]);
    }
}
