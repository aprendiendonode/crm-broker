<?php

namespace Domain\Moderators\Actions;

use App\Models\Business;
use App\Models\User;
use Domain\Moderators\DataTransferObjects\CreateModeratorData;
use Illuminate\Support\Facades\Hash;


class CreateModeratorAction
{

    public function __invoke(CreateModeratorData $createModeratorData): User
    {

        $business = Business::where('id', $createModeratorData->business_id)->firstOrFail();
        if ($business->id != auth()->user()->business_id) {

            abort(404);
        }

        $user = User::create([
            'email'              => $createModeratorData->email,
            'brn'                => $createModeratorData->brn,
            'name_en'            => $createModeratorData->name_en,
            'name_ar'            => $createModeratorData->name_ar,
            'description_en'     => $createModeratorData->description_en,
            'description_ar'     => $createModeratorData->description_ar,
            'password'           => Hash::make($createModeratorData->password),
            'phone'              => $createModeratorData->phone,
            'cell'               => $createModeratorData->cell,
            'staff_fax'          => $createModeratorData->staff_fax,
            'address'            => $createModeratorData->address,
            'zip'                => $createModeratorData->zip,
            'nationality_id'     => $createModeratorData->nationality_id,
            "skype"              => $createModeratorData->skype,
            "active"             => $createModeratorData->active,
            "whatsapp"           => $createModeratorData->whatsapp,
            "team_id"            => $createModeratorData->team_id,
            "agency_id"          => $createModeratorData->agency_id,
            'business_id'        => $createModeratorData->business_id,
            'can_access'         => $createModeratorData->agency_id,
            'type'               => 'moderator',
        ]);

        $defaul_permissions = [1, 2, 3, 5, 6, 8, 9, 10, 48, 17, 42, 45, 52, 19, 20, 30, 35, 50];

        foreach ($defaul_permissions as $permission) {
            $user->givePermissionTo($permission);
        }

        if ($createModeratorData->image) {

            $image =  upload_profile_image($createModeratorData->image, 'profile_images', $user);
            $user->update(['image' => $image]);
        }

        return $user;
    }
}
