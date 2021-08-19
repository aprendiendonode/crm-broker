<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AgencySetting
 *
 * @property int $id
 * @property string|null $quick_show_number_of_bedrooms
 * @property string|null $quick_show_number_of_parkings
 * @property string|null $quick_show_number_of_photos
 * @property string|null $quick_show_number_of_videos
 * @property string|null $listings_landlord_should_be_mandatory
 * @property string|null $listings_source_should_be_mandatory
 * @property string|null $listings_reference_should_contain_staff_initial
 * @property string|null $listings_show_building_name
 * @property string|null $leads_can_assign_multiple_agents
 * @property string|null $leads_source_should_be_mandatory
 * @property string|null $leads_contacts_should_be_mandatory
 * @property string|null $leads_area_min_should_be_mandatory
 * @property string|null $leads_budget_max_should_be_mandatory
 * @property string|null $contacts_per_page
 * @property string|null $company_profile_primary_number_should_be_mandatory
 * @property string|null $lsm_overall_status
 * @property string|null $lsm_share_status
 * @property string|null $lsm_listings_per_page
 * @property int|null $agency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereCompanyProfilePrimaryNumberShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereContactsPerPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLeadsAreaMinShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLeadsBudgetMaxShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLeadsCanAssignMultipleAgents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLeadsContactsShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLeadsSourceShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereListingsLandlordShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereListingsReferenceShouldContainStaffInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereListingsShowBuildingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereListingsSourceShouldBeMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLsmListingsPerPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLsmOverallStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereLsmShareStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereQuickShowNumberOfBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereQuickShowNumberOfParkings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereQuickShowNumberOfPhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereQuickShowNumberOfVideos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AgencySetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgencySetting extends Model
{
    protected $guarded = [];
}