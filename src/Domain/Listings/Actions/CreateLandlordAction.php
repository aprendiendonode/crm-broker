<?php

namespace Domain\Listings\Actions;


use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\LeadType;
use Domain\Listings\DataTransferObjects\CreateLandlordData;

class CreateLandlordAction
{

    public function __invoke(CreateLandlordData $createLandlordData)
    {
        $landlord_type = LeadType::firstOrCreate(
            ['role' => 'landlord'],
            ['name_en' => 'landlord', 'name_ar' => 'المالك', 'agency_id' => $createLandlordData->agency, 'business_id' => $createLandlordData->business]

        );
        $landlord = Client::create([
            'table_name' => 'clients',
            'name' => $createLandlordData->name,
            'email1' => $createLandlordData->email,
            'phone1' => $createLandlordData->phone,
            'salutation' => $createLandlordData->salutation,
            'converted_by' => auth()->user()->id,
            'was_lead' => 'no',
            "source_id" => $createLandlordData->source_id,
            'type_id' => $landlord_type->id,
            "business_id" => $createLandlordData->business,
            "agency_id" => $createLandlordData->agency,

        ]);
        return $landlord;
    }
}