<?php

namespace Domain\Staffs\Actions;

use App\Models\Business;
use App\Models\User;
use Domain\Staffs\DataTransferObjects\StaffChangeTeamData;


class StaffChangeTeamAction
{

    public function __invoke(StaffChangeTeamData $staffChangeTeamData): User
    {

        $business = Business::where('id', $staffChangeTeamData->business_id)->firstOrFail();
        if ($business->id != auth()->user()->business_id) {

            abort(404);
        }

        $staff = User::where('id', $staffChangeTeamData->staff_id)->firstOrFail();

        $staff->update(['team_id' => $staffChangeTeamData->team_id]);


        return $staff;
    }
}
