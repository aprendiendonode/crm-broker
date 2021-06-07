<?php

namespace Modules\Sales\Entities;

use App\Models\Agency;
use App\Models\User;
use Modules\Activity\Entities\Task;
use Modules\Sales\Entities\LeadType;
use Illuminate\Database\Eloquent\Model;
use Modules\Sales\Entities\ClientContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{

    protected $guarded = [];


    public function tasks()
    {
        return $this->hasMany(Task::class, 'module_id')->where('module', 'client');
    }


    public function convertedBy()
    {
        return $this->belongsTo(User::class, 'converted_by');
    }


    public function calls()
    {
        return $this->hasMany(Call::class, 'module_id')->where('module', 'client');
    }
    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }


    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }


    public function questions()
    {
        return $this->hasMany(ClientQuestion::class, 'client_id');
    }
    public function contracts()
    {
        return $this->hasMany(ClientContract::class, 'client_id');
    }

    public static function update_validation($id)
    {
        return [

            "edit_source_id_" . $id                     => "required|integer|exists:lead_sources,id",

            "edit_type_id_" . $id                       => "required|integer|exists:lead_types,id",
            // "edit_qualification_id_" . $id              => "required|integer|exists:lead_qualifications,id",
            "edit_communication_id_" . $id              => "required|integer|exists:lead_communications,id",

            "edit_company_" . $id                       => "sometimes|nullable|string",
            "edit_website_" . $id                       => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
            "edit_po_box_" . $id                        => "sometimes|nullable|string|min:1|max:30",
            "edit_passport_" . $id                      => "sometimes|nullable|string|min:1|max:30",
            "edit_passport_expiration_date_" . $id      => "sometimes|nullable|date",
            "edit_name_" . $id                      => "sometimes|nullable|string",
            "edit_partner_name_" . $id                  => "sometimes|nullable|string",
            "edit_date_of_birth_" . $id                 => "sometimes|nullable|date",
            "edit_email1_" . $id                        => "sometimes|nullable|string|email",
            "edit_email2_" . $id                        => "sometimes|nullable|string|email",

            "edit_nationality_id_" . $id                => "required|integer|exists:countries,id",
            // "edit_country_" . $id                       => "required|string|exists:countries,value",
            "edit_phone1_" . $id                        => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone2_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "edit_landline_" . $id                      => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_fax_" . $id                           => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_developer_" . $id                     => "sometimes|nullable|string",
            "edit_community_" . $id                     => "sometimes|nullable|string",
            "edit_building_name_" . $id                 => "sometimes|nullable|string",
            "edit_property_purpose_" . $id              => "sometimes|nullable|in:rent,buy",
            "edit_property_no_" . $id                   => "sometimes|nullable|string",
            "edit_property_id_" . $id                   => "required|integer|exists:lead_property,id",
            "edit_property_reference_" . $id            => "sometimes|nullable|string",
            "edit_size_sqft_" . $id                     => "sometimes|nullable|numeric",
            "edit_size_sqm_" . $id                      => "sometimes|nullable|numeric",
            "edit_bedrooms_" . $id                      => "sometimes|nullable|string",
            "edit_bathrooms_" . $id                     => "sometimes|nullable|string",
            "edit_parkings_" . $id                      => "sometimes|nullable|string",
            "edit_salutation_" . $id                    => "required|string|in:Mr,Mrs,Ms,Miss",
            "edit_skype_" . $id                         => "sometimes|nullable|email",
            // "edit_assigned_to_" . $id                   => "sometimes|nullable|array",
            "edit_other_" . $id                         => "sometimes|nullable|string",


        ];
    }
}
