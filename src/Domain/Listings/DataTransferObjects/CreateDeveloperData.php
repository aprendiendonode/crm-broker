<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class CreateDeveloperData extends DataTransferObject
{

    public $business;
    public $agency;

    public $name_en;
    public $name_ar;


    public static function fromRequest(Request $request): self
    {

        return new self([
            'agency'           => $request->agency,
            'business'         => $request->business,
            'name_en'          => $request->name_en,
            'name_ar'          => $request->name_ar,



        ]);
    }
}