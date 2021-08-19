<?php

namespace Modules\Activity\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use Modules\Listing\Entities\Listing;

/**
 * Modules\Activity\Entities\ListingNote
 *
 * @property int $id
 * @property int|null $listing_id
 * @property int|null $add_by
 * @property string|null $notes_en
 * @property string|null $notes_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $addBy
 * @property-read \Modules\Listing\Entities\Listing|null $listing
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereNotesAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereNotesEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Activity\Entities\ListingNote whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ListingNote extends Model
{


    protected $table = 'listing_notes';

    protected $guarded = [];

    public function addBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}