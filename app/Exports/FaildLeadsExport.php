<?php

namespace App\Exports;

use App\faild_leads;
use App\FaildLead;
use Maatwebsite\Excel\Concerns\FromCollection;

class FaildLeadsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FaildLead::all();
    }
}
