<?php

namespace Modules\Agency\ViewModels\Agency;

use App\Models\Agency;
use App\Models\Language;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;
use Spatie\ViewModels\ViewModel;



class AgencyIndexViewModel extends ViewModel
{
    public $countries;
    public $business;
    public $per_page = 15;
    public $cities;
    public $languages;
    public $request;
    public $pagination = true;
    public $agencies_query;


    public function __construct( Request $request)
    {
        $this->business  = auth()->user()->business_id;
        $this->request   = $request;

        $this->countries    = Country::all();
        $this->cities       = City::all();
        $this->languages    = Language::where('status','=',1)->get();

    }

    public function agencies_query()
    {
        $this->agencies_query = Agency::with(['language','country','city','leads','opportunities','clients'])
                ->where('business_id', $this->business);


//        if (request('staff') != null) {
//            $this->agencies_query->where('id', request('staff'));
//        }
//
//        if (request('filter_team') != null) {
//            $this->agencies_query->where('team_id', request('filter_team'));
//        }
//        if (request('filter_name') != null) {
//            $this->agencies_query->where('name_en', 'like', '%' . request('filter_name') . '%');
//        }
//
//        if (request('filter_email') != null) {
//
//            $this->agencies_query->where('email',  request('filter_email'));
//        }
//
//        if (request('filter_country_code') != null) {
//            $this->agencies_query->where('country_code', 'like', '%' . request('filter_country_code') . '%');
//        }
//        if (request('filter_city_code')  != null) {
//            $this->agencies_query->where('city_code', 'like', '%' . request('filter_city_code') . '%');
//        }
//
//        if (request('filter_phone') != null) {
//            $this->agencies_query->where('city_code', 'like', '%' . request('filter_phone') . '%');
//        }
//
//        if (request('filter_nationality') != null) {
//            $this->agencies_query->where('nationality_id', 'like', '%' . request('filter_nationality') . '%');
//        }


        return $this->agencies_query;
    }

    public function agencies()
    {
        return $this->agencies_query->paginate($this->per_page);
    }

    public function countries()
    {
        return $this->countries;
    }
    public function pagination()
    {
        return $this->pagination;
    }

    public function languages()
    {

        return  $this->languages;
    }

    public function cities()
    {
        return $this->cities;
    }


}
