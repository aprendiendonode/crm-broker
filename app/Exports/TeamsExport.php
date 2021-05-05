<?php

namespace App\Exports;

use App\Models\Team;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class TeamsExport implements FromView
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
        return view('agency::team.team_export', [
            'teams' => Team::where('agency_id', $this->agency_id)->get()
        ]);
    }
}