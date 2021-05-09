<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Modules\Listing\Entities\Listing;
use Maatwebsite\Excel\Concerns\FromView;

class ListingsExport implements FromView
{


    protected $agency_id;
    // protected $business_id;

    public function __construct($agency_id)
    {
        $this->agency_id = $agency_id;
        // $this->business_id = $business_id;
    }
    public function view(): View
    {
        return view('listing::listing.export_all', [
            'listings' => Listing::where('agency_id', $this->agency_id)->get()
        ]);
    }
}