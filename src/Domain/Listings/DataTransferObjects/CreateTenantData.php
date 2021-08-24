<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class CreateTenantData extends DataTransferObject
{

    public $business;
    public $agency;

    public $name;
    public $email;
    public $phone;
    public $salutation;
    public $source_id;

    public static function fromRequest(Request $request): self
    {

        return new self([

            'agency'        => $request->agency,
            'business'      => $request->business,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'salutation'    => $request->salutation,
            'source_id'     => $request->source_id,

        ]);
    }
}