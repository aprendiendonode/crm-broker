<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Entities\Task;

/**
 * Modules\Sales\Entities\Lead
 *
 * @property int $id
 * @property string|null $salutation
 * @property int|null $agency_id
 * @property int|null $business_id
 * @property int|null $source_id
 * @property int|null $type_id
 * @property int|null $qualification_id
 * @property int|null $communication_id
 * @property int|null $priority_id
 * @property string|null $company
 * @property string|null $website
 * @property string|null $note
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
 * @property int|null $developer
 * @property int|null $community
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
 * @property string|null $assigned_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $sub_community
 * @property string $property_type
 * @property string|null $table_name
 * @property string|null $phone1_code
 * @property string|null $phone2_code
 * @property string|null $phone3_code
 * @property string|null $phone4_code
 * @property string|null $reference
 * @property string|null $campaign_id
 * @property string|null $campaign_name
 * @property string|null $campaign_lead_id
 * @property string|null $campaign_form_id
 * @property string|null $campaign_ad_id
 * @property string|null $campaign_ad_name
 * @property string|null $campaign_adset_name
 * @property string|null $lat_loc
 * @property string|null $lng_loc
 * @property string|null $status
 * @property string|null $phone1_symbol
 * @property string|null $phone2_symbol
 * @property string|null $phone3_symbol
 * @property string|null $phone4_symbol
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Sales\Entities\Call[] $calls
 * @property-read int|null $calls_count
 * @property-read \Modules\Sales\Entities\LeadQualifications|null $qualification
 * @property-read \Modules\Sales\Entities\LeadSource|null $source
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Activity\Entities\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \Modules\Sales\Entities\LeadType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereBuildingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignAdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignAdsetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCampaignName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCommunicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCountryFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereEmail3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereLandline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereLatLoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereLngLoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereParkings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePartnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePassportExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone1Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone1Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone2Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone3Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone3Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone4Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePhone4Symbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePoBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePropertyNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePropertyPurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePropertyReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereQualificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSecName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSizeSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereSubCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Sales\Entities\Lead whereWebsite($value)
 * @mixin \Eloquent
 */
class Lead extends Model
{

    protected $guarded = [];

    public function source()
    {
        return $this->belongsTo(LeadSource::class);
    }

    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }

    public function qualification()
    {
        return $this->belongsTo(LeadQualifications::class);
    }

    public function calls()
    {
        return $this->hasMany(Call::class, 'module_id')->where('module', 'lead');
    }


    public function tasks()
    {
        return $this->hasMany(Task::class, 'module_id')->where('module', 'lead');
    }
}