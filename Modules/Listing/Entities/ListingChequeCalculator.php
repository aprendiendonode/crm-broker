<?php

namespace Modules\Listing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Listing\Entities\ListingChequeCalculator
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $value
 * @property string|null $percent
 * @property int|null $listing_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Listing\Entities\ListingChequeCalculator whereValue($value)
 * @mixin \Eloquent
 */
class ListingChequeCalculator extends Model
{
    protected $table = 'listing_cheque_calculator';
    protected $guarded = [];
}