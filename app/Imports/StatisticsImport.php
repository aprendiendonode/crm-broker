<?php

namespace App\Imports;


use App\FaildLead;
use App\Models\Statistics;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Developer;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Sales\Entities\LeadProperty;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Community;
use Modules\SuperAdmin\Entities\Country;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
//use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\SuperAdmin\Entities\SubCommunity;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

//class LeadsImport implements ToModel, WithChunkReading, WithValidation, WithHeadingRow, ShouldQueue
class StatisticsImport  implements ToModel, WithStartRow
{
    public $business, $agency;
    public $const = null;

    public function __construct($business, $agency)
    {

        $this->business = $business;
        $this->agency = $agency;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        set_time_limit(-1);
        if (!$this->const) {
            $this->const = $row[22];
        }

        $country = Country::where('iso2', $row[5])->first();
        $city = City::where('name_en', ucwords($row[6]))->first();
        $community = Community::where('name_en', ucwords($row[8]))->first();
        $sub_community = SubCommunity::where('name_en', ucwords($row[11]))->first();


        $size_sqft = ($row[14] * $this->const);
        if ($size_sqft <= 0) {
            $price_sqft = null;
        } else {
            $price_sqft = $row[15] / $size_sqft;
        }


        $statistics = new Statistics([
            'data_source' => $row[0],
            'transaction_type' => $row[1],
            'type' => strtolower($row[2]) == 'sale' || strtolower($row[2]) == 'rent' ? strtolower($row[2]) : null,
            'day' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('Y-m-d'),
            'month' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m'),
            'country_id' => $country ? $country->id : null,
            'city_id' => $city ? $city->id : null,
            'area_code' => $row[7],
            'community_id' => $community ? $community->id : null,
            'property_type' => ucfirst($row[9]),
            'purpose' => $row[10],
            'subcommunity_id' => $sub_community ? $sub_community->id : null,
            'property_number' => $row[12],
            'additional_details' => $row[13],
            'size_sqm' => $row[14],
            'price_sqm' => $row[16],
            'total_worth' => $row[15],
            'size_sqft' => floor($size_sqft) ?? null,
            'price_sqft' => floor($price_sqft) ?? null,
            'agency_id' => $this->agency,
            'business_id' => $this->business,

        ]);

        return $statistics;
    }


    /**
     * @return int
     */
    public function startRow(): int
    {

        return 2;
    }
}