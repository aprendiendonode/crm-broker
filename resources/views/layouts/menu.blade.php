     <!--- Sidemenu -->
     <div id="sidebar-menu">

        <ul id="side-menu">


            <li>
                <a href="#sidebarIcons" data-toggle="collapse">
                    <i data-feather="cpu"></i>
                    <span> @lang('sales.sales') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="nav-second-level">
                        @if(owner())
                            <li>
                                <a href="{{ url('sales/leads/bulk_uploads/'.request('agency')) }}">@lang('sales.smart_bulk_import')</a>
                            </li>

                        @elseif(moderator())
                            <li>
                                <a href="{{ url('sales/leads/bulk_uploads/'.request('agency')) }}">@lang('sales.smart_bulk_import')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('sales/leads/bulk_uploads/'.auth()->user()->agency_id) }}">@lang('sales.smart_bulk_import')</a>
                            </li>
                        @endif


                    @if(owner())
                        <li>
                            <a href="{{ url('sales/leads/'.request('agency')) }}">@lang('sales.database')</a>
                        </li>
                     
                        @elseif(moderator())
                        <li>
                            <a href="{{ url('sales/leads/'.request('agency')) }}">@lang('sales.database')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('sales/leads/'.auth()->user()->agency_id) }}">@lang('sales.database')</a>
                        </li>
                        @endif

                        @if(owner())
                        <li>
                            <a href="{{ url('sales/opportunities/'.request('agency')) }}">@lang('sales.opportunities')</a>
                        </li>
                     
                        @elseif(moderator())
                        <li>
                            <a href="{{ url('sales/opportunities/'.request('agency')) }}">@lang('sales.opportunities')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('sales/opportunities/'.auth()->user()->agency_id) }}">@lang('sales.opportunities')</a>
                        </li>
                        @endif




                    @if(owner())
                        <li>
                            <a href="{{ url('sales/failed_leads/'.request('agency')) }}">@lang('sales.manage_failed_leads')</a>
                        </li>

                        @elseif(moderator())
                        <li>
                            <a href="{{ url('sales/failed_leads/'.request('agency')) }}">@lang('sales.manage_failed_leads')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('sales/failed_leads/'.auth()->user()->agency_id) }}">@lang('sales.manage_failed_leads')</a>
                        </li>
                        @endif

                        
                     
                        @if(owner())
                        <li>
                            <a href="{{ url('sales/clients/'.request('agency')) }}">@lang('sales.manage_clients')</a>
                        </li>
                     
                        @elseif(moderator())
                        <li>
                            <a href="{{ url('sales/clients/'.request('agency')) }}">@lang('sales.manage_clients')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('sales/clients/'.auth()->user()->agency_id) }}">@lang('sales.manage_clients')</a>
                        </li>
                        @endif


                        @if(owner())
                        <li>
                            <a href="{{ url('sales/all_in_one/'.request('agency')) }}">@lang('sales.search_center')</a>
                        </li>
                     
                        @elseif(moderator())
                        <li>
                            <a href="{{ url('sales/all_in_one/'.request('agency')) }}">@lang('sales.search_center')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('sales/all_in_one/'.auth()->user()->agency_id) }}">@lang('sales.search_center')</a>
                        </li>
                        @endif

                        <li>


                            <a href="#sidebarsettings" data-toggle="collapse">
                                {{-- <i data-feather="settings"></i> --}}
                                <span>@lang('sales.settings') </span>
                                <span class="menu-arrow"></span>
                            </a>    

                            <div class="collapse" id="sidebarsettings">
                                <ul class="nav-second-level">



                                    <a href="#sidebarLeadSetting" data-toggle="collapse">
                                        {{-- <i data-feather="settings"></i> --}}
                                        <span>@lang('sales.leads') </span>
                                        <span class="menu-arrow"></span>
                                    </a>
            
            
                                    <div class="collapse" id="sidebarLeadSetting">
                                        <ul class="nav-second-level">
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-sources/'.request('agency')) }}">@lang('sales.lead_source')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-sources/'.request('agency')) }}">@lang('sales.lead_source')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-sources/'.auth()->user()->agency_id) }}">@lang('sales.lead_source')</a>
                                            </li>
                                            @endif
            
            
            
            
            
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-qualifications/'.request('agency')) }}">@lang('sales.lead_qualifications')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-qualifications/'.request('agency')) }}">@lang('sales.lead_qualifications')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-qualifications/'.auth()->user()->agency_id) }}">@lang('sales.lead_qualifications')</a>
                                            </li>
                                            @endif
            
            
            
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-types/'.request('agency')) }}">@lang('sales.lead_types')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-types/'.request('agency')) }}">@lang('sales.lead_types')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-types/'.auth()->user()->agency_id) }}">@lang('sales.lead_types')</a>
                                            </li>
                                            @endif
            
            
            
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-priorities/'.request('agency')) }}">@lang('sales.lead_priorities')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-priorities/'.request('agency')) }}">@lang('sales.lead_priorities')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-priorities/'.auth()->user()->agency_id) }}">@lang('sales.lead_priorities')</a>
                                            </li>
                                            @endif
            
            
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-communications/'.request('agency')) }}">@lang('sales.lead_communications')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-communications/'.request('agency')) }}">@lang('sales.lead_communications')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-communications/'.auth()->user()->agency_id) }}">@lang('sales.lead_communications')</a>
                                            </li>
                                            @endif
            
            
                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/lead-property/'.request('agency')) }}">@lang('sales.lead_property')</a>
                                            </li>
                                         
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/lead-property/'.request('agency')) }}">@lang('sales.lead_property')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/lead-property/'.auth()->user()->agency_id) }}">@lang('sales.lead_property')</a>
                                            </li>
                                            @endif

                                            @if(owner())
                                            <li>
                                                <a href="{{ url('sales/developers/'.request('agency')) }}">@lang('sales.developers')</a>
                                            </li>
                                             
                                            @elseif(moderator())
                                            <li>
                                                <a href="{{ url('sales/developers/'.request('agency')) }}">@lang('sales.developers')</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ url('sales/developers/'.auth()->user()->agency_id) }}">@lang('sales.developers')</a>
                                            </li>
                                            @endif
                    
                                      
                                        </ul>
                                    </div>






                                    @if(owner())
                                    <li>
                                        <a href="{{ url('sales/call-status/'.request('agency')) }}">@lang('sales.call_status')</a>
                                    </li>
                                 
                                    @elseif(moderator())
                                    <li>
                                        <a href="{{ url('sales/call-status/'.request('agency')) }}">@lang('sales.call_status')</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ url('sales/call-status/'.auth()->user()->agency_id) }}">@lang('sales.call_status')</a>
                                    </li>
                                    @endif
    
    
    
    
    
                             
    
                              
    
                               
                            
            
                              
                                </ul>
                            </div>



                   

                        </li>




                        <li>
                        
                

                    </li>
                   
                   
                    </ul>
                </div>
            </li>





            <li>
                <a href="#sidebarListing" data-toggle="collapse">
                    <i data-feather="cpu"></i>
                    <span> @lang('listing.listing') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarListing">
                    <ul class="nav-second-level">
                        @if(owner())
                            <li>
                                <a href="{{ url('listing/controll/'.request('agency').'?status_main=live') }}">@lang('listing.manage_listing')</a>
                            </li>
                        
                            @elseif(moderator())
                            <li>
                                <a href="{{ url('listing/controll/'.request('agency').'?status_main=live') }}">@lang('listing.manage_listing')</a>
                            </li>
                            @else
                            <li>
                                <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=live') }}">@lang('listing.manage_listing')</a>
                            </li>
                            @endif



                            <li>

                                <a href="#sidebarlistingSetting" data-toggle="collapse">
                                    {{-- <i data-feather="settings"></i> --}}
                                    <span>@lang('listing.settings') </span>
                                    <span class="menu-arrow"></span>
                                </a>
        
        
                                <div class="collapse" id="sidebarlistingSetting">
                                    <ul class="nav-second-level">
                                        @if(owner())
                                        <li>
                                            <a href="{{ url('listing/listing-view/'.request('agency')) }}">@lang('listing.listing_view')</a>
                                        </li>
                                     
                                        @elseif(moderator())
                                        <li>
                                            <a href="{{ url('listing/listing-view/'.request('agency')) }}">@lang('listing.listing_view')</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ url('listing/listing-view/'.auth()->user()->agency_id) }}">@lang('listing.listing_view')</a>
                                        </li>
                                        @endif
        
        
                                        @if(owner())
                                        <li>
                                            <a href="{{ url('listing/listing-cheque/'.request('agency')) }}">@lang('listing.listing_cheque')</a>
                                        </li>
                                     
                                        @elseif(moderator())
                                        <li>
                                            <a href="{{ url('listing/listing-cheque/'.request('agency')) }}">@lang('listing.listing_cheque')</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ url('listing/listing-cheque/'.auth()->user()->agency_id) }}">@lang('listing.listing_cheque')</a>
                                        </li>
                                        @endif
        
        
                                        @if(owner())
                                        <li>
                                            <a href="{{ url('listing/listing-type/'.request('agency')) }}">@lang('listing.listing_type')</a>
                                        </li>
                                     
                                        @elseif(moderator())
                                        <li>
                                            <a href="{{ url('listing/listing-type/'.request('agency')) }}">@lang('listing.listing_type')</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ url('listing/listing-type/'.auth()->user()->agency_id) }}">@lang('listing.listing_type')</a>
                                        </li>
                                        @endif
        
        
        
        
        
        
                                  
                                    </ul>
                                </div>

    
    
                       
    
                            </li>
    
    

                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarListingSharing" data-toggle="collapse">
                    <i data-feather="cpu"></i>
                    <span> @lang('listing.sharing_center') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarListingSharing">
                    <ul class="nav-second-level">
                        @if(owner())
                            <li>
                                <a href="{{ url('listing/share/'.request('agency')) }}">@lang('listing.share_listing')</a>
                            </li>

                        @elseif(moderator())
                            <li>
                                <a href="{{ url('listing/share/'.request('agency')) }}">@lang('listing.share_listing')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('listing/share/'.auth()->user()->agency_id) }}">@lang('listing.share_listing')</a>
                            </li>
                        @endif

                        @if(owner())
                            <li>
                                <a href="{{ url('listing/requests/'.request('agency')) }}">@lang('listing.requests')</a>
                            </li>

                        @elseif(moderator())
                            <li>
                                <a href="{{ url('listing/requests/'.request('agency')) }}">@lang('listing.requests')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('listing/requests/'.auth()->user()->agency_id) }}">@lang('listing.requests')</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarActivity" data-toggle="collapse">
                    <i class="fas fa-briefcase"></i>
                    <span> @lang('activity.activity_planner') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarActivity">
                    <ul class="nav-second-level">

                        @if(!owner())
                            <li>
                                <a href="{{ url('activity/tasks/'.auth()->user()->agency_id) }}">@lang('activity.tasks.title')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('activity/tasks/'.auth()->user()->agencies->first()->id) }}">@lang('activity.tasks.title')</a>
                            </li>
                        @endif

                        @if(!owner())
                            <li>
                                <a href="{{ url('activity/notes/'.auth()->user()->agency_id.'/tasks') }}">@lang('activity.notes')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('activity/notes/'.auth()->user()->agencies->first()->id.'/tasks') }}">@lang('activity.notes')</a>
                            </li>
                        @endif



                        @if(!owner())
                            <li>
                                <a href="{{ url('activity/emails/'.auth()->user()->agency_id) }}">@lang('activity.emails')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('activity/emails/'.auth()->user()->agencies->first()->id) }}">@lang('activity.emails')</a>
                            </li>
                        @endif


                        @if(owner())
                            {{--<li>--}}
                                {{--<a href="{{ url('activity/activity_logs/'.auth()->user()->agency_id) }}">@lang('activity.activity_log')</a>--}}
                            {{--</li>--}}
                        {{--@else--}}
                            <li>
                                <a href="{{ url('activity/activity_logs/'.auth()->user()->agencies->first()->id) }}">@lang('activity.activity_log')</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </li>


            <li>
                <a href="#sidebarAgency" data-toggle="collapse">
                    <i class="fe-settings"></i>
                    <span> @lang('agency.agency') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAgency">
                    <ul class="nav-second-level">

                        @if(owner())
                        <li>
                            <a href="{{ url('agency/staff/'.request('agency')) }}">@lang('agency.manage_staff')</a>
                        </li>
                     
                        @elseif(moderator())
                        <li>
                            <a href="{{ url('agency/staff/'.request('agency')) }}">@lang('agency.manage_staff')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('agency/staff/'.auth()->user()->agency_id) }}">@lang('agency.manage_staff')</a>
                        </li>
                        @endif


                        @if(owner())
                      
                        <li>
                            <a href="{{ url('agency/teams/'.request('agency')) }}">@lang('agency.manage_teams')</a>
                        </li>
                       @elseif(moderator())

                       <li>
                        <a href="{{ url('agency/teams/'.request('agency')) }}">@lang('agency.manage_teams')</a>
                    </li>

                        @else
                        <li>
                            <a href="{{ url('agency/teams/'.auth()->user()->agency_id) }}">@lang('agency.manage_teams')</a>
                        </li>
                          
                        @endif


                        @if(owner())
                        <li>
                            <a href="{{ url('agency/marketing_portals/'.request('agency')) }}">@lang('agency.marketing_portals')</a>
                        </li>
                         @elseif(moderator())
                         <li>
                            <a href="{{ url('agency/marketing_portals/'.request('agency')) }}">@lang('agency.marketing_portals')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('agency/marketing_portals/'.auth()->user()->agency_id) }}">@lang('agency.marketing_portals')</a>
                        </li>
                      
                        @endif


                        @if(owner())
                        <li>
                            <a href="{{ url('agency/profile/'.request('agency')) }}">@lang('agency.company_profile')</a>
                        </li>

                        @elseif(moderator())
                        <li>
                            <a href="{{ url('agency/profile/'.request('agency')) }}">@lang('agency.company_profile')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('agency/profile/'.auth()->user()->agency_id) }}">@lang('agency.company_profile')</a>
                        </li>
                       
                        @endif



                        @if(owner())
                           

                            <li>
                                <a href="{{ url('agency/settings/'.request('agency')) }}">@lang('agency.agency_settings')</a>
                            </li>

                        @elseif(moderator())
     
                        <li>
                            <a href="{{ url('agency/settings/'.request('agency')) }}">@lang('agency.agency_settings')</a>
                        </li>
                        @else
                            <li>
                                <a href="{{ url('agency/settings/'.auth()->user()->agency_id) }}">@lang('agency.agency_settings')</a>
                            </li>
                        @endif


                            @if(owner())
                                <li>
                                    <a href="{{ url('agency/watermark/'.request('agency')) }}">@lang('agency.watermark')</a>
                                </li>
                            @endif

                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarSettings" data-toggle="collapse">
                    <i class="fe-settings"></i>
                    <span> @lang('settings.settings') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSettings">
                    <ul class="nav-second-level">

                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agency_id]) }}">@lang('settings.profile')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agencies->first()->id]) }}">@lang('settings.profile')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.task_status.index',auth()->user()->agency_id) }}">@lang('settings.task_status')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.task_status.index',auth()->user()->agencies->first()->id) }}">@lang('settings.task_status')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.task_types.index',auth()->user()->agency_id) }}">@lang('settings.task_types')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.task_types.index',auth()->user()->agencies->first()->id) }}">@lang('settings.task_types')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.templates.index',auth()->user()->agency_id) }}">@lang('settings.manage_templates')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.templates.index',auth()->user()->agencies->first()->id) }}">@lang('settings.manage_templates')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.maillists.index',auth()->user()->agency_id) }}">@lang('settings.maillists')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.maillists.index',auth()->user()->agencies->first()->id) }}">@lang('settings.maillists')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.emailnotify.edit',[auth()->user()->id,auth()->user()->agency_id]) }}">@lang('settings.emailnotify')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.emailnotify.edit',[auth()->user()->id,auth()->user()->agencies->first()->id]) }}">@lang('settings.emailnotify')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.floor_plans.index',auth()->user()->agency_id) }}">@lang('settings.floor_plans')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.floor_plans.index',auth()->user()->agencies->first()->id) }}">@lang('settings.floor_plans')</a>
                            </li>
                        @endif
                        @if(!owner())
                            <li>
                                <a href="{{ route('setting.image_banks.index',auth()->user()->agency_id) }}">@lang('settings.image_banks')</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('setting.image_banks.index',auth()->user()->agencies->first()->id) }}">@lang('settings.image_banks')</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('setting.profiles.change_password_view') }}">@lang('settings.change_password')</a>
                        </li>


                    </ul>
                </div>
            </li>



            <li>
                <a href="#sidebarSuperadmin" data-toggle="collapse">
                    <i class="fe-star"></i>
                    <span> @lang('superadmin.superadmin') </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse
                @if(
                    in_array( request()->segment(2) , ['countries','cities','communities','sub-communities'])
                ) show @endif
                " id="sidebarSuperadmin">
                    <ul class="nav-second-level">

         
                                    <a href="#sidebargeoLocations" data-toggle="collapse">
                                        <i class="fe-map-pin"></i>
                                        <span>@lang('superadmin.geolocations') </span>
                                        <span class="menu-arrow"></span>
                                    </a>
            
            
                                    <div class="collapse 
                                    @if(
                                        in_array( request()->segment(2) , ['countries','cities','communities','sub-communities'])
                                    ) show @endif
                                    " id="sidebargeoLocations">
                                        <ul class="nav-second-level">
                                      
                                            <li>
                                                <a href="{{ route('countries.index') }}">@lang('superadmin.countries.countries')</a>
                                            </li>
                                         
                                      
                                            <li>
                                                <a href="{{ route('cities.index') }}">@lang('superadmin.cities.cities')</a>
                                            </li>
                                         
                                            <li>
                                                <a href="{{ route('communities.index') }}">@lang('superadmin.communities.communities')</a>
                                            </li>
                                         
                                            <li>
                                                <a href="{{ route('sub-communities.index') }}">@lang('superadmin.sub_communities.sub_communities')</a>
                                            </li>
                                         
                                      
                                        </ul>
                                    </div>




                   

                   


          
                


                    </ul>
                </div>
            </li>

            <li>


                {{-- <a href="{{ url('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    <span> @lang('dashboard.logout') </span>
                    <span class="menu-arrow"></span>
                </a>

                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> --}}

            </li>


        </ul>

    </div>
