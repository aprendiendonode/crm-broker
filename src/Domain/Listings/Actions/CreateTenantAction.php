<?php

namespace Domain\Listings\Actions;


use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\LeadType;
use Modules\Listing\Entities\Listing;
use Domain\Listings\DataTransferObjects\CreateTenantData;

class CreateTenantAction
{



    public function __invoke(CreateTenantData $createTenantData)
    {


        $tenant_type = LeadType::firstOrCreate(
            ['role' => 'tenant'],
            ['name_en' => 'tenant', 'name_ar' => 'المستأجر', 'agency_id' => $createTenantData->agency, 'business_id' => $createTenantData->business]

        );
        $tenant = Client::create([
            'table_name'   => 'clients',
            'name'         => $createTenantData->name,
            'email1'       => $createTenantData->email,
            'phone1'       => $createTenantData->phone,
            'salutation'   => $createTenantData->salutation,
            'converted_by' => auth()->user()->id,
            'was_lead'     => 'no',
            "source_id"    => $createTenantData->source_id,
            'type_id'      => $tenant_type->id,
            "business_id"  => $createTenantData->business,
            "agency_id"    => $createTenantData->agency,

        ]);


        return $tenant;
    }
}