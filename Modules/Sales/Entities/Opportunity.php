<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Entities\Task;

class Opportunity extends Model
{

    protected $guarded = [];


    public function tasks()
    {
        return $this->hasMany(Task::class, 'module_id')->where('module', 'opportunity');
    }


    public function convertedBy()
    {
        return $this->belongsTo(User::class, 'converted_by');
    }
    public function rejectedBy()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }
    public function holdBy()
    {
        return $this->belongsTo(User::class, 'hold_by');
    }
    public function submitForApproveBy()
    {
        return $this->belongsTo(User::class, 'submit_for_approve_by');
    }



    public function calls()
    {
        return $this->hasMany(Call::class, 'module_id')->where('module', 'opportunity');
    }

    public function assigns()
    {
        return $this->hasMany(OpportunityAssignTracking::class)->where('status', 'off');
    }
    public function current_assign()
    {
        return $this->hasMany(OpportunityAssignTracking::class, 'opportunity_id')->where('status', 'on');
    }


    public function questions()
    {
        return $this->hasMany(OpportunityQuestion::class, 'opportunity_id');
    }
    public function results()
    {
        return $this->hasMany(OpportunityResult::class, 'opportunity_id');
    }


    public function client()
    {
        return $this->hasOne(Client::class, 'converted_from');
    }



    public static function update_validation($id)
    {
        return [


            "opportunity_probability_of_winning_" . $id  => "required|integer",

            "edit_source_id_" . $id                     => "required|integer|exists:lead_sources,id",

            "edit_type_id_" . $id                       => "required|integer|exists:lead_types,id",
            "edit_qualification_id_" . $id              => "required|integer|exists:lead_qualifications,id",
            "edit_communication_id_" . $id              => "required|integer|exists:lead_communications,id",
            "edit_priority_id_" . $id                   => "required|integer|exists:lead_priorities,id",


            "edit_company_" . $id                       => "sometimes|nullable|string",
            "edit_website_" . $id                       => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
            "edit_po_box_" . $id                        => "sometimes|nullable|string|min:1|max:30",
            "edit_passport_" . $id                      => "sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:1|max:30",
            "edit_passport_expiration_date_" . $id      => "sometimes|nullable|date",
            "edit_first_name_" . $id                    => "required|string",
            "edit_sec_name_" . $id                      => "sometimes|nullable|string",
            "edit_full_name_" . $id                     => "sometimes|nullable|string",
            "edit_partner_name_" . $id                  => "sometimes|nullable|string",
            "edit_date_of_birth_" . $id                 => "sometimes|nullable|date",
            "edit_email1_" . $id                        => "sometimes|nullable|string|email",
            "edit_email2_" . $id                        => "sometimes|nullable|string|email",
            "edit_email3_" . $id                        => "sometimes|nullable|string|email",
            "edit_nationality_id_" . $id                => "required|integer|exists:countries,id",
            "edit_country_" . $id                       => "required|string|exists:countries,value",
            "edit_phone1_" . $id                        => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone2_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone3_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone4_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
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


    public static function convert_to_client_validation($request)
    {
        return [

            "client_website_" .  $request->opportunity_id                      => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",

            "client_name_" .  $request->opportunity_id                         => "required|string",
            "client_date_of_birth_" .  $request->opportunity_id                => "required|string|date_format:Y-m-d",

            "client_landline_" .  $request->opportunity_id                     => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "client_email1_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",
            "client_email2_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",

            "client_fax_" .  $request->opportunity_id                          => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "client_phone1_" .  $request->opportunity_id                       => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "client_phone2_" .  $request->opportunity_id                       => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "client_country_" .  $request->opportunity_id                      => "required|string|exists:countries,value",

            "client_skype_" .  $request->opportunity_id                         => "sometimes|nullable|string|email",
            "client_twitter_" .  $request->opportunity_id                       => "sometimes|nullable|string",
            "client_facebook_" .  $request->opportunity_id                      => "sometimes|nullable|string",
            "client_linkedin_" .  $request->opportunity_id                      => "sometimes|nullable|string",

            "client_longitude_" .  $request->opportunity_id                     => "sometimes|nullable|string",
            "client_latitude_" .  $request->opportunity_id                      => "sometimes|nullable|string",
            "client_company_" .  $request->opportunity_id                       => "sometimes|nullable|string",
            "client_city_" .  $request->opportunity_id                          => "sometimes|nullable|string",


            "client_language_" .  $request->opportunity_id                      => "required|string|exists:languages,code",
            "client_currency_" .  $request->opportunity_id                      => "required|string|exists:currencies,code",

//            "client_contract_type_" .  $request->opportunity_id                 => "required|in:rent,sale",
//            "client_landlord_" .  $request->opportunity_id                      => "required|string",
//            "client_landlord_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
//            "client_landlord_address_" .  $request->opportunity_id              => "required|string",
//            "client_customer_" .  $request->opportunity_id                      => "required|string",
//            "client_customer_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
//            "client_customer_address_" .  $request->opportunity_id              => "required|string",
//            "client_date_" .  $request->opportunity_id                          => "required|string|date_format:Y-m-d",
//            "client_end_date_" .  $request->opportunity_id                      => "sometimes|nullable|string|date_format:Y-m-d",
//            "client_address_" .  $request->opportunity_id                       => "required|string",
//            "client_note_" .  $request->opportunity_id                          => "sometimes|nullable|string",
//            "client_amount_" .  $request->opportunity_id                        => "required|numeric",
//            "client_recurring_type_" .  $request->opportunity_id                => "required|in:yes,no",

            // "client_recurring_" .  $request->opportunity_id                     => "required_if:client_recurring_type_{$request->opportunity_id},yes",
            "recurrings_amount_" .  $request->opportunity_id                    => "required_if:client_recurring_type_{$request->opportunity_id},yes",
            "recurrings_dates_" .  $request->opportunity_id                     => "required_if:client_recurring_type_{$request->opportunity_id},yes",
//            "client_contract_documents_" .  $request->opportunity_id . ".*"     => "required|file",


            "client_national_id_" .  $request->opportunity_id                   => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "client_passport_" .  $request->opportunity_id                      => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "client_expiration_passport_date_" .  $request->opportunity_id      => "sometimes|nullable|date_format:Y-m-d",



        ];
    }


    public static function suggest_new_convert_validation($request)
    {

        return [


            "hold_name_" .  $request->opportunity_id                         => "required|string",
            "hold_date_of_birth_" .  $request->opportunity_id                => "required|string|date_format:Y-m-d",


            "hold_email1_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",


            "hold_phone1_" .  $request->opportunity_id                       => "required|regex:/^([0-9\s\-\+\(\)]*)$/",

            "hold_country_" .  $request->opportunity_id                      => "required|string|exists:countries,value",




            "hold_language_" .  $request->opportunity_id                      => "required|string|exists:languages,code",
            "hold_currency_" .  $request->opportunity_id                      => "required|string|exists:currencies,code",

//            "hold_contract_type_" .  $request->opportunity_id                 => "required|in:rent,sale",
//            "hold_landlord_" .  $request->opportunity_id                      => "required|string",
//            "hold_landlord_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
//            "hold_landlord_address_" .  $request->opportunity_id              => "required|string",
//            "hold_customer_" .  $request->opportunity_id                      => "required|string",
//            "hold_customer_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
//            "hold_customer_address_" .  $request->opportunity_id              => "required|string",
//            "hold_date_" .  $request->opportunity_id                          => "required|string|date_format:Y-m-d",
//            "hold_end_date_" .  $request->opportunity_id                      => "sometimes|nullable|string|date_format:Y-m-d",
//            "hold_address_" .  $request->opportunity_id                       => "required|string",
//            "hold_note_" .  $request->opportunity_id                          => "sometimes|nullable|string",
//            "hold_amount_" .  $request->opportunity_id                        => "required|numeric",
//            "hold_recurring_type_" .  $request->opportunity_id                => "required|in:yes,no",

            "recurrings_amount_" .  $request->opportunity_id                    => "required_if:hold_recurring_type_{$request->opportunity_id},yes",
            "recurrings_dates_" .  $request->opportunity_id                     => "required_if:hold_recurring_type_{$request->opportunity_id},yes",
//            "hold_contract_documents_" .  $request->opportunity_id . ".*"     => "required|file",


            "hold_national_id_" .  $request->opportunity_id                   => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "hold_passport_" .  $request->opportunity_id                      => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "hold_expiration_passport_date_" .  $request->opportunity_id      => "sometimes|nullable|date_format:Y-m-d",




        ];
    }
}
