<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Entities\Task;

/**
 * Modules\Sales\Entities\Opportunity
 *
 * @property int $id
 * @property string|null $probability_of_winning
 * @property string|null $next_action
 * @property string|null $next_action_date
 * @property string|null $forecast_closing_date
 * @property string|null $expected_revenue
 * @property int|null $stage_id
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $converted_by
 * @property string|null $assigned_to
 * @property string|null $salutation
 * @property int|null $source_id
 * @property int|null $type_id
 * @property int|null $qualification_id
 * @property int|null $communication_id
 * @property int|null $priority_id
 * @property string|null $company
 * @property string|null $website
 * @property string|null $po_box
 * @property string|null $passport
 * @property string|null $passport_expiration_date
 * @property string|null $first_name
 * @property string|null $sec_name
 * @property string|null $full_name
 * @property string|null $partner_name
 * @property string|null $date_of_birth
 * @property string|null $email1
 * @property string|null $email2
 * @property string|null $email3
 * @property int|null $nationality_id
 * @property int|null $city_id
 * @property string|null $phone1
 * @property string|null $phone2
 * @property string|null $phone3
 * @property string|null $phone4
 * @property string|null $landline
 * @property string|null $fax
 * @property string|null $developer
 * @property string|null $community
 * @property string|null $building_name
 * @property string|null $property_purpose
 * @property string|null $property_no
 * @property string|null $property_reference
 * @property int|null $property_id
 * @property string|null $size_sqft
 * @property string|null $size_sqm
 * @property int|null $bedrooms
 * @property int|null $bathrooms
 * @property int|null $parkings
 * @property string|null $skype
 * @property string|null $country_code
 * @property string|null $country_flag
 * @property string|null $timezone
 * @property string|null $country
 * @property string|null $address
 * @property string|null $other
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $status
 * @property string|null $stage
 * @property string|null $converting_approval
 * @property string|null $hold_reason
 * @property string|null $reject_reason
 * @property int|null $rejected_by
 * @property string|null $reject_date
 * @property int|null $hold_by
 * @property string|null $hold_date
 * @property int|null $submit_for_approve_by
 * @property string|null $submit_for_approve_date
 * @property string|null $sub_community
 * @property string $property_type
 * @property string|null $table_name
 * @property string|null $national_id
 * @property string|null $phone1_code
 * @property string|null $phone2_code
 * @property string|null $phone3_code
 * @property string|null $phone4_code
 * @property string|null $campaign_id
 * @property string|null $campaign_name
 * @property string|null $campaign_lead_id
 * @property string|null $campaign_form_id
 * @property string|null $campaign_ad_id
 * @property string|null $campaign_ad_name
 * @property string|null $campaign_adset_name
 * @property string|null $loc_lat
 * @property string|null $loc_lng
 * @property string|null $phone1_symbol
 * @property string|null $phone2_symbol
 * @property string|null $phone3_symbol
 * @property string|null $phone4_symbol
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\OpportunityAssignTracking[] $assigns
 * @property-read int|null $assigns_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Call[] $calls
 * @property-read int|null $calls_count
 * @property-read \Modules\Sales\Entities\Client $client
 * @property-read \App\Models\User|null $convertedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\OpportunityAssignTracking[] $current_assign
 * @property-read int|null $current_assign_count
 * @property-read \App\Models\User|null $holdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\OpportunityQuestion[] $questions
 * @property-read int|null $questions_count
 * @property-read \App\Models\User|null $rejectedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\OpportunityResult[] $results
 * @property-read int|null $results_count
 * @property-read \App\Models\User|null $submitForApproveBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\Task[] $tasks
 * @property-read int|null $tasks_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereBuildingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignAdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignAdsetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCampaignName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCommunicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereConvertedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereConvertingApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCountryFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereEmail3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereExpectedRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereForecastClosingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereHoldBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereHoldDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereHoldReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereLandline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereLocLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereLocLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereNextAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereNextActionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereParkings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePartnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePassportExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone1Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone1Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone2Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone3Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone3Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone4Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePhone4Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePoBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereProbabilityOfWinning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePropertyNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePropertyPurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePropertyReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereQualificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereRejectDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereRejectReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereRejectedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSecName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSizeSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSubCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSubmitForApproveBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereSubmitForApproveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Opportunity whereWebsite($value)
 * @mixin \Eloquent
 */
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


            "edit_probability_of_winning_" . $id        => "required|integer",

            "edit_source_id_" . $id                     => "required|integer|exists:lead_sources,id",

            "edit_type_id_" . $id                       => "required|integer|exists:lead_types,id",
            "edit_qualification_id_" . $id              => "required|integer|exists:lead_qualifications,id",
            "edit_communication_id_" . $id              => "required|integer|exists:lead_communications,id",
            "edit_priority_id_" . $id                   => "required|integer|exists:lead_priorities,id",


            "edit_address_" . $id                       => "sometimes|nullable|string",
            "edit_loc_lat_" . $id                       => "sometimes|nullable|string",
            "edit_loc_lng_" . $id                       => "sometimes|nullable|string",
            "edit_company_" . $id                       => "sometimes|nullable|string",
            "edit_website_" . $id                       => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
            "edit_po_box_" . $id                        => "sometimes|nullable|string|min:1|max:30",
            "edit_passport_" . $id                      => "sometimes|nullable|string|min:1|max:30",
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
            // "edit_country_" . $id                       => "required|string|exists:countries,value",
            "edit_phone1_" . $id                        => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone2_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone3_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone4_" . $id                        => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_phone1_code_" . $id                            => "required|string",
            "edit_phone2_code_" . $id                            => "sometimes|nullable|string",
            "edit_phone3_code_" . $id                            => "sometimes|nullable|string",
            "edit_phone4_code_" . $id                           => "sometimes|nullable|string",
            "edit_phone1_symbol_" . $id                         => "required|string",
            "edit_phone2_symbol_" . $id                         => "sometimes|nullable|string",
            "edit_phone3_symbol_" . $id                         => "sometimes|nullable|string",
            "edit_phone4_symbol_" . $id                         => "sometimes|nullable|string",
            "edit_landline_" . $id                              => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_fax_" . $id                           => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "edit_developer_" . $id                     => "sometimes|nullable|string",
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

            "edit_city_id_" . $id                       => "required|exists:cities,id",
            "edit_community_" . $id                     => "required|exists:communities,id",
            "edit_sub_community_" . $id                 => "sometimes|nullable|exists:sub_communities,id",


        ];
    }


    public static function convert_to_client_validation($request)
    {
        return [

            "client_website_" .  $request->opportunity_id                      => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",

            "client_first_name_" .  $request->opportunity_id                         => "required|string",
            "client_sec_name_" .  $request->opportunity_id                         => "required|string",
            "client_date_of_birth_" .  $request->opportunity_id                => "required|string|date_format:Y-m-d",

            "client_landline_" .  $request->opportunity_id                     => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "client_email1_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",
            "client_email2_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",

            "client_fax_" .  $request->opportunity_id                          => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

            "client_phone1_" .  $request->opportunity_id                       => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
            "client_phone2_" .  $request->opportunity_id                       => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
            "client_phone1_code_" .  $request->opportunity_id                       => "required|string",
            "client_phone2_code_" .  $request->opportunity_id                       => "sometimes|nullable|string",

            "client_phone1_symbol_" .  $request->opportunity_id                       => "required|string",
            "client_phone2_symbol_" .  $request->opportunity_id                       => "sometimes|nullable|string",

            // "client_country_" .  $request->opportunity_id                      => "required|string|exists:countries,value",

            "client_skype_" .  $request->opportunity_id                         => "sometimes|nullable|string|email",
            "client_twitter_" .  $request->opportunity_id                       => "sometimes|nullable|string",
            "client_facebook_" .  $request->opportunity_id                      => "sometimes|nullable|string",
            "client_linkedin_" .  $request->opportunity_id                      => "sometimes|nullable|string",

            "client_longitude_" .  $request->opportunity_id                     => "sometimes|nullable|string",
            "client_latitude_" .  $request->opportunity_id                      => "sometimes|nullable|string",
            "client_company_" .  $request->opportunity_id                       => "sometimes|nullable|string",
            "client_city_" .  $request->opportunity_id                          => "sometimes|nullable|string",


            // "client_language_" .  $request->opportunity_id                      => "required|string|exists:languages,code",
            // "client_currency_" .  $request->opportunity_id                      => "required|string|exists:currencies,code",

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
            "client_passport_" .  $request->opportunity_id                      => "sometimes|nullable",
            "client_expiration_passport_date_" .  $request->opportunity_id      => "sometimes|nullable|date_format:Y-m-d",



        ];
    }


    public static function suggest_new_convert_validation($request)
    {

        return [


            "hold_first_name_" .  $request->opportunity_id                         => "required|string",
            "hold_sec_name_" .  $request->opportunity_id                         => "required|string",
            "hold_date_of_birth_" .  $request->opportunity_id                => "required|string|date_format:Y-m-d",


            "hold_email1_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",


            "hold_phone1_" .  $request->opportunity_id                       => "required|regex:/^([0-9\s\-\+\(\)]*)$/",

            // "hold_country_" .  $request->opportunity_id                      => "required|string|exists:countries,value",




            // "hold_language_" .  $request->opportunity_id                      => "required|string|exists:languages,code",
            // "hold_currency_" .  $request->opportunity_id                      => "required|string|exists:currencies,code",

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
            "hold_passport_" .  $request->opportunity_id                      => "sometimes|nullable",
            "hold_expiration_passport_date_" .  $request->opportunity_id      => "sometimes|nullable|date_format:Y-m-d",




        ];
    }
}
