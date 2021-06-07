<?php

namespace App\Exports;

use App\faild_leads;
use App\FaildLead;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Sales\Entities\Lead;

class FaildLeadsExport implements FromView, ShouldQueue
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return FaildLead::all();
    // }
    public $agency;

    public function __constructor($agency){

        $this->agency = $agency;
    }

    public function view(): View
    {
        $agency =  substr(url()->previous(), strpos(url()->previous(), "bulk_uploads/") + 13);

        return view('exports.failed_leads', [
            'failed_leads' => FaildLead::where('agency_id',$agency)->get(),
            'leads' => Lead::where('agency_id',$agency)
        ]);
    }
}
