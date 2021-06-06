<?php

namespace App\Imports;


use App\Exports\FaildLeadsExport;
use App\FaildLead;
use App\Mail\EmailGeneral;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Events\AfterImport;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Developer;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Sales\Entities\LeadProperty;
use Modules\SuperAdmin\Entities\Community;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\SuperAdmin\Entities\SubCommunity;

//class LeadsImport implements ToModel, WithChunkReading, WithValidation, WithHeadingRow
//class LeadsImport implements ToModel, WithValidation, WithHeadingRow
class LeadsImport implements ToModel, WithChunkReading, WithValidation, WithHeadingRow, ShouldQueue
{

    public $source_id, $qualification_id, $type_id, $communication_id, $business, $agency, $priority_id, $communities, $sub_community, $countries,$user_email;

    public function __construct($source_id, $qualification_id, $type_id, $communication_id, $priority_id, $business, $agency)
    {

        $this->source_id = $source_id;
        $this->qualification_id = $qualification_id;
        $this->type_id = $type_id;
        $this->communication_id = $communication_id;
        $this->priority_id = $priority_id;
        $this->business = $business;
        $this->agency = $agency;
        $this->user_email = auth()->user()->email;
        $this->communities = new Community();
        $this->sub_community = new  SubCommunity();
        $this->countries = new Country();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        $property_id = LeadProperty::where('slug', str_replace(" ", "_", strtolower($row['property_type'])))->first();
        if (!$property_id) {
            $property_id = LeadProperty::create([
                'name_en' => ucwords($row['property_type']),
                'name_ar' => ucwords($row['property_type']),
                'slug' => str_replace(" ", "_", strtolower($row['property_type'])),
                'agency_id' => $this->agency,
                'business_id' => $this->business,
            ]);
        }
        $developer = Developer::where('slug', str_replace(" ", "_", strtolower($row['developer'])))->first();
        if (!$developer) {
            $developer = Developer::create([
                'name_en' => ucwords($row['developer']),
                'name_ar' => ucwords($row['developer']),
                'slug' => str_replace(" ", "_", strtolower($row['developer'])),
                'agency_id' => $this->agency,
                'business_id' => $this->business,
            ]);
        }


        $bedrooms = preg_replace('/[^0-9]/', '', $row['bedrooms']) != '' ? preg_replace('/[^0-9]/', '', $row['bedrooms']) : null;
        $bathrooms = preg_replace('/[^0-9]/', '', $row['bathrooms']) != '' ? preg_replace('/[^0-9]/', '', $row['bathrooms']) : null;
        $parkings = preg_replace('/[^0-9]/', '', $row['parking']) != '' ? preg_replace('/[^0-9]/', '', $row['parking']) : null;
        $fullname = explode(' ', $row['full_name']);
        $first_name = $fullname[0] ?? null;
        $last_name = $fullname[1] ?? null;

        $output = ($row['date_of_birth'] - 25569) * 86400;
        $output = $output - date('Z', $output);

        $failds_data = [];
        $country = $this->countries->where('value', ucwords($row['nationality']))->orwhere('name_en', ucwords($row['nationality']))->orwhere('name_ar', ucwords($row['nationality']))->first();
        $community = $this->communities->where('name_en', $row['community'])->orwhere('name_ar', $row['community'])->first();
        $sub_community = $this->sub_community->where('name_en', $row['sub_community'])->orwhere('name_ar', $row['sub_community'])->first();

        if (!$country) {
            array_push($failds_data, 'country');
        }
        if (!$community) {
            array_push($failds_data, 'community');
        }
        if (!$sub_community) {
            array_push($failds_data, 'sub community');
        }


        $lead = new Lead([
            'reference' => uniqid(),
            'developer' => $developer->id,
            'community' => $community->id ?? null,
            'sub_community' => $sub_community->id ?? null,
            'property_no' => $row['property_number'],
            'property_purpose' => $row['property_purpose'],
            'property_reference' => $row['property_reference'],
            'size_sqft' => $row['property_size_sqft'],
            'size_sqm' => $row['property_size_sqm'],
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'parkings' => $parkings,
            'other' => $row['others'],
            'salutation' => $row['salutation'],
            'first_name' => $first_name,
            'sec_name' => $last_name,
            'full_name' => $row['full_name'],
            'partner_name' => $row['partner_name'],
            'email1' => $row['e_mail'],
            'email2' => $row['e_mail_2'],
            'email3' => $row['e_mail_3'],
            'phone1' => $row['phone_number_1'],
            'phone2' => $row['phone_number_2'],
            'phone3' => $row['phone_number_3'],
            'phone4' => $row['phone_number_4'],
            'skype' => $row['skype_id'],
            'landline' => $row['landline'],
            'fax' => $row['fax'],
            'address' => $row['address'],
            'po_box' => $row['po_box'],
            'nationality_id' => $country->id ?? null,
            'country' => $country->id ?? null,
            'date_of_birth' => date('Y-m-d', $output),
            'passport' => $row['passport_number'],
            'passport_expiration_date' => $row['passport_expiration_date'],

            "source_id" => $this->source_id,
            "type_id" => $this->type_id,
            "qualification_id" => $this->qualification_id,
            "communication_id" => $this->communication_id,
            "priority_id" => $this->priority_id,
            "property_id" => $property_id->id,
            "agency_id" => $this->agency,
            'business_id' => $this->business,

        ]);

        if (sizeof($failds_data)) {
            FaildLead::create([
                'reference'   => $lead->reference,
                'failed_data'=> json_encode($failds_data)
            ]);
        }
        return $lead;
    }

    public function rules(): array
    {
        return [
            "developer" => "sometimes|nullable|string",
            "community" => "sometimes|nullable|string",
            "sub_community" => "sometimes|nullable|string",
            "property_number" => "sometimes|nullable|string",
            "property_type" => "required|string|in:Commercial,Residential",
            "property_purpose" => "sometimes|nullable|in:rent,buy",
            "property_reference" => "sometimes|nullable|string",
            "property_size_sqft" => "sometimes|nullable|numeric",
            "property_size_sqm" => "sometimes|nullable|numeric",
            "bedrooms" => "sometimes|nullable|string",
            "bathrooms" => "sometimes|nullable|string",
            "parking" => "sometimes|nullable|string",
            "others" => "sometimes|nullable|string",
            "salutation" => "required|string|in:MR,MRS,MS,MISS",
            "first_name" => "sometimes|nullable|string",
            "last_name" => "sometimes|nullable|string",
            "full_name" => "sometimes|nullable|string",
            "partner_name" => "sometimes|nullable|string",
            "e_mail" => "sometimes|nullable|string|email",
            "e_mail_2" => "sometimes|nullable|string|email",
            "e_mail_3" => "sometimes|nullable|string|email",
            "phone_number_1" => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "phone_number_2" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "phone_number_3" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "phone_number_4" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "skype_id" => "sometimes|nullable|email",
            "landline" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "fax" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "address" => "sometimes|nullable|string",
            "po_box" => "sometimes|nullable|string|min:1|max:30",
        ];
    }




    public function chunkSize(): int
    {
        return 100;
    }


//    public function afterImport(AfterImport $event)
//    {
//        Mail::to($this->user_email)->send(new EmailGeneral('this is some leads failed to insert some data','Broker Leads',new FaildLeadsExport(), 'users.xlsx'));
//    }
}
