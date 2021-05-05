<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

class TemporaryDocument extends Model
{
    protected $table = 'temporary_listings_documents';
    protected $guarded = [];
}