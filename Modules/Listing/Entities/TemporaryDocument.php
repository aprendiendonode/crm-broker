<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Listing\Entities\TemporaryDocument
 *
 * @property int $id
 * @property string|null $folder
 * @property string|null $document
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\TemporaryDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TemporaryDocument extends Model
{
    protected $table = 'temporary_listings_documents';
    protected $guarded = [];
}