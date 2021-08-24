<?php

namespace Domain\Listings\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateListingUploadsTitleData extends DataTransferObject
{


    public $title;
    public $id;
    public $table;
    public $type;

    public static function fromRequest(Request $request): self
    {

        return new self([
            'title'  =>  $request->title,
            'id'     =>  $request->id,
            'table'  =>  $request->table,
            'type'   =>  $request->type,
        ]);
    }
}