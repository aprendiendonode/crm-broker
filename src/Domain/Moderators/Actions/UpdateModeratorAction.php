<?php

namespace Domain\Moderators\Actions;

use App\Models\Business;
use App\Models\User;
use Domain\Moderators\DataTransferObjects\CreateModeratorData;
use Domain\Moderators\DataTransferObjects\UpdateModeratorData;
use Illuminate\Support\Facades\Hash;


class UpdateModeratorAction
{

    public function __invoke(UpdateModeratorData $updateModeratorData): User
    {

        $id = request()->id;
        $user = User::findorfail($id);

        $user->update([
            'email'              => $updateModeratorData->email,
            'brn'                => $updateModeratorData->brn,
            'name_en'            => $updateModeratorData->name_en,
            'name_ar'            => $updateModeratorData->name_ar,
            'description_en'     => $updateModeratorData->description_en,
            'description_ar'     => $updateModeratorData->description_ar,
            'country_code'       => $updateModeratorData->country_code,
            'city_code'          => $updateModeratorData->city_code,
            'phone'              => $updateModeratorData->phone,
            'cell_code'          => $updateModeratorData->cell_code,
            'cell'               => $updateModeratorData->cell,
            'fax_country_code'   => $updateModeratorData->fax_country_code,
            'fax_city_code'      => $updateModeratorData->fax_city_code,
            'staff_fax'          => $updateModeratorData->staff_fax,
            'address'            => $updateModeratorData->address,
            'zip'                => $updateModeratorData->zip,
            'nationality_id'     => $updateModeratorData->nationality_id,
            "skype"              => $updateModeratorData->skype,
            "active"             => $updateModeratorData->active,
            "whatsapp"           => $updateModeratorData->whatsapp,
            "team_id"            => $updateModeratorData->team_id,

        ]);

        $defaul_permissions = [1, 2, 3, 5, 6, 8, 9, 10, 48, 17, 42, 45, 52, 19, 20, 30, 35, 50];

        foreach ($defaul_permissions as $permission) {
            $user->givePermissionTo($permission);
        }

        if ($updateModeratorData->image) {

            $image =  upload_profile_image($updateModeratorData->image, 'profile_images', $user);
            $user->update(['image' => $image]);
        }

        return $user;
    }
}
