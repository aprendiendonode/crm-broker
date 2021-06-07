<?php

namespace App\Exports;

use App\faild_leads;
use App\FaildLead;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Modules\Sales\Entities\Lead;

//class FaildLeadsExport implements FromView, ShouldQueue
class FaildLeadsExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return FaildLead::all();
    // }

    public $agency;
    public function __construct($agency){

        $this->agency = $agency;
    }

    public function view(): View
    {

        return view('exports.failed_leads', [
            'failed_leads' => FaildLead::where('agency_id',$this->agency)->get(),
            'leads' => Lead::where('agency_id',$this->agency)
        ]);
    }
}
