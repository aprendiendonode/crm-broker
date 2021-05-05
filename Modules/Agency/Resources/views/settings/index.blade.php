@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('title',trans('agency.agency_settings'))
@section('content')
<div class="content p-3">
    <div class="d-flex justify-content-between mb-3">
        <h4>
            @lang('agency.agency_settings')
        </h4>

 
     </div>
    <form action="{{ url('agency/update-settings') }}" method="POST">
        @csrf
        <input type="hidden" name="agency_id" value="{{ $agency }}">
            <div class="row">

                <div class="col-md-4 mb-3">
                <h4>@lang('agency.quick_overview') </h4>
                    
                    

                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input    value="no" type="hidden" name="quick_show_number_of_bedrooms" >
                            <input  @if(agency_settings('quick_show_number_of_bedrooms') == 'yes') checked @endif id="quick_show_number_of_bedrooms" value="yes" name="quick_show_number_of_bedrooms" type="checkbox" >
                            <label for="quick_show_number_of_bedrooms">
                                @lang('agency.show_number_of_bedrooms')
                            </label>
                        </div>


                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input   value="no" type="hidden" name="quick_show_number_of_parkings" >

                            <input @if(agency_settings('quick_show_number_of_parkings') == 'yes') checked @endif  id="quick_show_number_of_parkings" value="yes" name="quick_show_number_of_parkings" type="checkbox" >
                            <label for="quick_show_number_of_parkings">
                                @lang('agency.show_number_of_parkings')
                            </label>
                        </div>


                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input   value="no" type="hidden" name="quick_show_number_of_photos"  >

                            <input  @if(agency_settings('quick_show_number_of_photos') == 'yes') checked @endif id="quick_show_number_of_photos" value="yes" name="quick_show_number_of_photos" type="checkbox" >
                            <label for="quick_show_number_of_photos">
                                @lang('agency.show_number_of_photos')
                            </label>
                        </div>



                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input   value="no" type="hidden" name="quick_show_number_of_videos" >

                            <input @if(agency_settings('quick_show_number_of_videos') == 'yes') checked @endif  id="quick_show_number_of_videos" value="yes" name="quick_show_number_of_videos" type="checkbox" >
                            <label for="quick_show_number_of_videos">
                                @lang('agency.show_number_of_videos')
                            </label>
                        </div>
             
                </div>






                <div class="col-md-4 mb-3">
                    <h4>@lang('agency.listings') </h4>
                        
                        
    
                            <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                <input   value="no" type="hidden" name="listings_landlord_should_be_mandatory" >
                                <input @if(agency_settings('listings_landlord_should_be_mandatory') == 'yes') checked @endif   id="listings_landlord_should_be_mandatory" value="yes" name="listings_landlord_should_be_mandatory" type="checkbox" >
                                <label for="listings_landlord_should_be_mandatory">
                                    @lang('agency.landlord_should_be_mandatory')
                                </label>
                            </div>
    
    
                            <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                <input   value="no" type="hidden" name="listings_source_should_be_mandatory" >
                                <input @if(agency_settings('listings_source_should_be_mandatory') == 'yes') checked @endif   id="listings_source_should_be_mandatory" value="yes" name="listings_source_should_be_mandatory" type="checkbox" >
                                <label for="listings_source_should_be_mandatory">
                                    @lang('agency.source_should_be_mandatory')
                                </label>
                            </div>
                            <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                <input   value="no" type="hidden" name="listings_reference_should_contain_staff_initial"  >
                                <input @if(agency_settings('listings_reference_should_contain_staff_initial') == 'yes') checked @endif  id="listings_reference_should_contain_staff_initial" value="yes" name="listings_reference_should_contain_staff_initial" type="checkbox" >
                                <label for="listings_reference_should_contain_staff_initial">
                                    @lang('agency.listing_reference_should_contain_staff_initial')
                                </label>
                            </div>



                            
                            <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                <input   value="no" type="hidden" name="listings_show_building_name"  >
                                <input @if(agency_settings('listings_show_building_name') == 'yes') checked @endif id="listings_show_building_name" value="yes" name="listings_show_building_name" type="checkbox" >
                                <label for="listings_show_building_name">
                                    @lang('agency.show_building_name')
                                </label>
                            </div>
    
    
                 
                 
                    </div>




                    <div class="col-md-4 mb-3">
                        <h4>@lang('agency.leads') </h4>
                            
                            
        
                                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input   value="no" type="hidden" name="leads_can_assign_multiple_agents"  >
                                    <input @if(agency_settings('leads_can_assign_multiple_agents') == 'yes') checked @endif  id="leads_can_assign_multiple_agents" value="yes" name="leads_can_assign_multiple_agents" type="checkbox" >
                                    <label for="leads_can_assign_multiple_agents">
                                        @lang('agency.can_assign_multiple_agents')
                                    </label>
                                </div>



                                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input   value="no" type="hidden" name="leads_source_should_be_mandatory"  >
                                    <input  @if(agency_settings('leads_source_should_be_mandatory') == 'yes') checked @endif  id="leads_source_should_be_mandatory" value="yes" name="leads_source_should_be_mandatory" type="checkbox" >
                                    <label for="leads_source_should_be_mandatory">
                                        @lang('agency.source_should_be_mandatory')
                                    </label>
                                </div>



                                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input   value="no" type="hidden" name="leads_contacts_should_be_mandatory"  >
                                    <input @if(agency_settings('leads_contacts_should_be_mandatory') == 'yes') checked @endif  id="leads_contacts_should_be_mandatory" value="yes" name="leads_contacts_should_be_mandatory" type="checkbox" >
                                    <label for="leads_contacts_should_be_mandatory">
                                        @lang('agency.contacts_should_be_mandatory')
                                    </label>
                                </div>



                                
                                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input   value="no" type="hidden" name="leads_area_min_should_be_mandatory"  >
                                    <input @if(agency_settings('leads_area_min_should_be_mandatory') == 'yes') checked @endif  id="leads_area_min_should_be_mandatory" value="yes" name="leads_area_min_should_be_mandatory" type="checkbox" >
                                    <label for="leads_area_min_should_be_mandatory">
                                        @lang('agency.area_min_should_be_mandatory')
                                    </label>
                                </div>
        
                                
                                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                                    <input   value="no" type="hidden" name="leads_budget_max_should_be_mandatory" >
                                    <input @if(agency_settings('leads_budget_max_should_be_mandatory') == 'yes') checked @endif  id="leads_budget_max_should_be_mandatory" value="yes" name="leads_budget_max_should_be_mandatory" type="checkbox" >
                                    <label for="leads_budget_max_should_be_mandatory">
                                        @lang('agency.budget_max_should_be_mandatory')
                                    </label>
                                </div>
        
        
        
        
                         
                     
                        </div>






                        

                    <div class="col-md-4">
                        <h4>@lang('agency.contacts') </h4>
                            
                            
                        <select class="selectpicker mb-0 show-tick" name="contacts_per_page"  data-style="btn-outline-secondary">
                            <option >@lang('agency.choose_no_of_contacts_per_page')</option>
                            <option @if(agency_settings('contacts_per_page') == 20) selected @endif  value="20">20</option>
                            <option @if(agency_settings('contacts_per_page') == 50) selected @endif value="50">50</option>
                            <option @if(agency_settings('contacts_per_page') == 100) selected @endif value="100">100</option>
                        </select>
        
                         
                     
                    </div>


                        <div class="col-md-4">
                            <h4>@lang('agency.company_profile') </h4>
                                
                                
            
                                   
                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input   value="no" type="hidden" name="company_profile_primary_number_should_be_mandatory"  >
                            <input  @if(agency_settings('company_profile_primary_number_should_be_mandatory') == 'yes') checked @endif id="company_profile_primary_number_should_be_mandatory" value="yes" name="company_profile_primary_number_should_be_mandatory" type="checkbox" >
                            <label for="company_profile_primary_number_should_be_mandatory">
                                @lang('agency.primary_number_should_be_mandatory')
                            </label>
                        </div>



    
    
            
                             
                         
                     </div>



                     <div class="col-md-4">
                        <h4>@lang('agency.listing_sharing_manager') </h4>
                            
                            
                        <div class="form-group">
                            <select class="selectpicker mb-0 show-tick" name="lsm_overall_status"  data-style="btn-outline-secondary">
                                <option @if(agency_settings('lsm_overall_status') == 'activated') selected @endif value="activated">@lang('agency.activate_lsm')</option>
                                <option @if(agency_settings('lsm_overall_status') == 'deactivated') selected @endif value="deactivated">@lang('agency.deactivate_lsm')</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <select class="selectpicker mb-0 show-tick" name="lsm_share_status"  data-style="btn-outline-secondary">
                                <option @if(agency_settings('lsm_share_status') == 'private') selected @endif value="private">@lang('agency.keep_as_private')</option>
                                <option @if(agency_settings('lsm_share_status') == 'shared') selected @endif value="shared">@lang('agency.share_with_other')</option>
                            </select>

                        </div>

                         <div class="form-group">
                            <select class="selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                                <option >@lang('agency.choose_no_of_listings_per_page')</option>
                                <option @if(agency_settings('lsm_listings_per_page') == 20) selected @endif value="20">20</option>
                                <option @if(agency_settings('lsm_listings_per_page') == 50) selected @endif value="50">50</option>
                                <option @if(agency_settings('lsm_listings_per_page') == 100) selected @endif value="100">100</option>
                            </select>
                         </div>

        
                         
                     
                 </div>
    
        
        
    
    
    
    











    
            </div>

            
            <div class="d-flex justify-content-between  mt-3 ">

        
          
            <div class="d-flex flex-row-reverse">

                <div class="ml-3">

                    <button  type="submit" class="btn btn-success waves-effect waves-light">
                        <span class="btn-label"><i class="fe-check"></i></span>@lang('agency.submit_save')
                    </button>
                </div>
      
      

              
               
            </div>
       
        </div>

    </form>
</div> 


@endsection

@push('js')
<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

<script>

</script>
@endpush