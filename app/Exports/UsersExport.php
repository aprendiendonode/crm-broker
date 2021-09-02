<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{


    protected $agency_id;
    // protected $business_id;
     protected $type;

    public function __construct($agency_id,$type=null)
    {
        $this->agency_id = $agency_id;
        $this->type = $type;
        // $this->business_id = $business_id;
    }
    public function view(): View
    {

        $type = $this->type;
        return view('agency::staff.staff_export', [
            'staffs' =>  User::where(function($query) use($type){
                            if($type){
                                $query->where('agency_id', $this->agency_id)
                                    ->where('type',$type);
                            }else{
                                $query->where('agency_id', $this->agency_id);
                            }
                        })->get()
        ]);

//        return view('agency::staff.staff_export', [
//            'staffs' => User::where('agency_id', $this->agency_id)->get()
//        ]);
    }
}
