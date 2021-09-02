<?php

namespace App\ViewModels\Moderator;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\SuperAdmin\Entities\Country;
use Spatie\ViewModels\ViewModel;



class ModeratorIndexViewModel extends ViewModel
{
    public $agency_id;
    public $countries;
    public $business;
    public $per_page = 15;
    public $moderators;
    public $emails;
    public $teams;
    public $request;
    public $pagination = true;
    public $moderator_query;


    public function __construct($agency_id = null, Request $request)
    {
        $this->agency_id = $agency_id;
        $this->business  = auth()->user()->business_id;
        $this->request   = $request;

        $this->countries  = Country::all();
        $this->teams      = Team::where('agency_id', $this->agency_id)->get();

        $this->moderators = User::with('listings')
            ->where('type', 'moderator')->where('agency_id', $this->agency_id)->where('business_id', $this->business)->get();

    }

    public function moderator_query()
    {
        $this->moderator_query = User::with('listings')
            ->where('type', 'moderator')->where('agency_id', $this->agency_id)->where('business_id', $this->business);


        if (request('staff') != null) {
            $this->moderator_query->where('id', request('staff'));
        }

        if (request('filter_team') != null) {
            $this->moderator_query->where('team_id', request('filter_team'));
        }
        if (request('filter_name') != null) {
            $this->moderator_query->where('name_en', 'like', '%' . request('filter_name') . '%');
        }

        if (request('filter_email') != null) {

            $this->moderator_query->where('email',  request('filter_email'));
        }

        if (request('filter_country_code') != null) {
            $this->moderator_query->where('country_code', 'like', '%' . request('filter_country_code') . '%');
        }
        if (request('filter_city_code')  != null) {
            $this->moderator_query->where('city_code', 'like', '%' . request('filter_city_code') . '%');
        }

        if (request('filter_phone') != null) {
            $this->moderator_query->where('city_code', 'like', '%' . request('filter_phone') . '%');
        }

        if (request('filter_nationality') != null) {
            $this->moderator_query->where('nationality_id', 'like', '%' . request('filter_nationality') . '%');
        }


        return $this->moderator_query;
    }

    public function moderators()
    {
        return $this->moderator_query->paginate($this->per_page);
    }

    public function countries()
    {
        return $this->countries;
    }
    public function pagination()
    {
        return $this->pagination;
    }

    public function emails()
    {

        $this->emails =  $this->moderator_query->pluck('email');
        return $this->emails;
    }

    public function agency()
    {
        return $this->agency_id;
    }


}
