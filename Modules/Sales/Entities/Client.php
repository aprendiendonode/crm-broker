<?php

namespace Modules\Sales\Entities;

use App\Models\Agency;
use App\Models\User;
use Modules\Activity\Entities\Task;
use Modules\Sales\Entities\LeadType;
use Illuminate\Database\Eloquent\Model;
use Modules\Sales\Entities\ClientContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Sales\Entities\Client
 *
 * @property int $id
 * @property string|null $note
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $converted_by
 * @property string|null $salutation
 * @property int|null $source_id
 * @property int|null $type_id
 * @property int|null $communication_id
 * @property string|null $company
 * @property string|null $website
 * @property string|null $po_box
 * @property string|null $passport
 * @property string|null $passport_expiration_date
 * @property string|null $name
 * @property string|null $partner_name
 * @property string|null $date_of_birth
 * @property string|null $email1
 * @property string|null $email2
 * @property int|null $nationality_id
 * @property string|null $phone1
 * @property string|null $phone2
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
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $linkedin
 * @property string|null $country
 * @property string|null $currency
 * @property string|null $language
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $address
 * @property string|null $other
 * @property string|null $city
 * @property string|null $converted_from
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $national_id
 * @property string|null $was_lead
 * @property string|null $table_name
 * @property int|null $qualification_id
 * @property int|null $priority_id
 * @property int|null $assigned_to
 * @property string|null $sub_community
 * @property string|null $phone1_code
 * @property string|null $phone2_code
 * @property string|null $campaign_id
 * @property string|null $campaign_name
 * @property string|null $campaign_lead_id
 * @property string|null $campaign_form_id
 * @property string|null $campaign_ad_id
 * @property string|null $campaign_ad_name
 * @property string|null $campaign_adset_name
 * @property string|null $phone1_symbol
 * @property string|null $phone2_symbol
 * @property-read \App\Models\Agency|null $agency
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Call[] $calls
 * @property-read int|null $calls_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\ClientContract[] $contracts
 * @property-read int|null $contracts_count
 * @property-read \App\Models\User|null $convertedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\ClientQuestion[] $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \Modules\Sales\Entities\LeadType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereBuildingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignAdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignAdsetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCampaignName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCommunicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereConvertedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereConvertedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereLandline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereParkings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePartnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePassportExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone1Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone1Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePhone2Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePoBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePropertyNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePropertyPurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client wherePropertyReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereQualificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSizeSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereSubCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereWasLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Client whereWebsite($value)
 * @mixin \Eloquent
 */
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

            "edit_phone1_code_" . $id                        => "required|string",
            "edit_phone2_code_" . $id                        => "sometimes|nullable",
            "edit_phone1_symbol_" . $id                      => "required|string",
            "edit_phone2_symbol_" . $id                      => "sometimes|nullable",

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
