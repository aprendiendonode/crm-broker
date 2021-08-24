<?php

namespace Domain\Listings\Actions;

use Modules\Sales\Entities\Developer;
use Domain\Listings\DataTransferObjects\CreateDeveloperData;

class CreateDeveloperAction
{

    public function __invoke(CreateDeveloperData $createTenantData)
    {
        $developer = Developer::create([
            'name_en'     => $createTenantData->name_en,
            'slug'        => \Str::slug($createTenantData->name_en),
            'name_ar'     => $createTenantData->name_ar,
            "business_id" => $createTenantData->business,
            "agency_id"   => $createTenantData->agency,

        ]);
        return $developer;
    }
}