<?php

namespace Domain\Staffs\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class StaffChangeTeamData extends DataTransferObject
{

    public  $business_id;
    public  $agency_id;
    public  $staff_id;
    public  $team_id;

    public static function  fromRequest(Request $request): self
    {

        return new self([

            "business_id"                              => $request->business_id,
            "agency_id"                                => $request->agency_id,
            "staff_id"                                 => $request->staff_id,
            "team_id"                                  => $request->team_id,

        ]);
    }
}
