


<form id="edit-staff-form" action="{{ route('listing.update',$listing->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
        
            <div class="col-lg-6">
                <div class="card">

                    <div class="card-body">

                          <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a onclick="event.preventDefault()" data-toggle="modal"
                                            data-target="#photos-modal_{{ $listing->id }}" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>@lang('listing.edit')</a>
                                          
                                        </div>
                                    </div> 




                        <h4 class="header-title">@lang('listing.photo')</h4>
                        {{-- <p class="sub-header font-13">Adding in the previous and next controls:</p>   --}} 

                        <!-- START carousel-->
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @if($listing->photos)
                                @foreach($listing->photos as $photo)

                                    @if($photo->active != 'watermark')
                                        <div class="carousel-item  @if($loop->index == 0) active @endif ">
                                            <img class="d-block img-fluid" src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}" >
                                        </div>
                                    @else

                                        <div class="carousel-item @if($loop->index == 0) active @endif ">
                                            <img class="d-block img-fluid" src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}" >
                                        </div>
                                    @endif
                            
                         
                                @endforeach
                                @endif

                                @if($listing->photos->count() == 0)
                                    <p class="sub-header font-13">@lang('listing.from_here_you_can_update_photos')</p> 
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- END carousel-->
            </div>


            <div class="col-xl-6">
                <div class="card-box">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#agent" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('listing.agent')
                            </a>
                        </li>
             
                       
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="agent">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#agent-modal-{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                                <div>
                                    <img class="w-75 mb-2" style="background: #000; ; max-width: 160px;"
                                     src="{{ $listing->agent && $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' }}" alt="">
                                </div>
                                <div>@lang('listing.agent'): {{ $listing->agent ? $listing->agent->{'name_'.app()->getLocale()} : '' }}</div>
                                <div> @lang('listing.email'): {{ $listing->agent ? $listing->agent->email : '' }}</div>
                                <div>@lang('listing.primary'): {{ $listing->agent ? $listing->agent->phone : '' }}</div>
                            </div>
                        
                        </div>
                    
                    </div>


                    <div id="agent-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                      
                                       
                                            <label for="assignTo" class="font-weight-medium text-muted">
                                                @lang('listing.assign_to')
                                            </label>
                                            <select 
                                            required
                                            class="form-control select2" name="edit_assigned_to_{{ $listing->id }}"
                                            data-toggle="select2" data-placeholder="select" 
                                            >
                                                    <option value=""></option>
                                                @foreach($staffs as $staff)
                                                    <option
                                                        @if(old('edit_assigned_to_'.$listing->id,$listing->assigned_to) == $staff->id) selected @endif
                                                        value="{{ $staff->id }}"
                                                        >
                                                        {{ $staff->{'name_'.app()->getLocale()} }}
                                                    
                                                    </option>
                                                @endforeach
                                            </select>
                                     

                                    </div>

                                </div>
                                <div class="modal-footer">
    
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                                </div>
                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div> <!-- end card-box-->
            </div> <!-- end col -->





            
            <div class="col-xl-6">
                <div class="card-box">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#details" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('listing.details')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#description" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                @lang('listing.description')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                @lang('listing.features')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#videos" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                @lang('listing.video')
                            </a>
                        </li>
             
                       
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="details">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                             data-target="#details-modal-{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                          
                                <div>@lang('listing.ref'): {{ $listing->listing_ref }}</div>
                                <div>@lang('listing.title'): {{ $listing->title }}</div>
                                <div> @lang('listing.purpose'): {{ $listing->purpose }}</div>
                                <div> @lang('listing.type'): {{  $listing->type->{'name_'.app()->getLocale()} ?? ''}}</div>
                                <div> @lang('listing.beds'): {{  $listing->beds}}</div>
                                <div> @lang('listing.parkings'): {{  $listing->parkings}}</div>
                                <div> @lang('listing.baths'): {{  $listing->baths}}</div>
                                <div> @lang('listing.area'): {{  $listing->area }}</div>
                                <div> @lang('listing.plot_area'): {{  $listing->plot_area }}</div>

                                <div> @lang('listing.landlord'): {{ $listing->landlord->{'name_'.app()->getLocale()} ?? '' }}</div>
                                <div> @lang('listing.developer'): {{ $listing->developer->{'name_'.app()->getLocale()} ?? '' }}</div>
                                <div> @lang('listing.never_lived_in'): {{ ucfirst( $listing->never_lived_in ) }}</div>
                                <div>@lang('listing.featured_on_company_website'): {{ ucfirst( $listing->featured_on_company_website ) }}</div>
                                <div>@lang('listing.exclusive_rights'): {{  ucfirst($listing->exclusive_rights) }}</div>

                                 
                                
                                
                            </div>
                        
                        </div>


                        <div class="tab-pane " id="description">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                             data-target="#description-modal-{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                          
                                <div> @lang('listing.description'): </div>
                                <div> {!! $listing->description !!}</div>
                            
                            </div>
                        
                        </div>



                        <div class="tab-pane " id="features">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                             data-target="#featuresModal_{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                          
                                <div> @lang('listing.features'): </div>
                                <div> {!! $listing->description !!}</div>
                            
                            </div>
                        
                        </div>



                        <div class="tab-pane " id="videos">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
                             data-target="#videos-modal_{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                          
                                <div> @lang('listing.video'): </div>

                                @if($listing->videos)
                                    @foreach($listing->videos as $video)
                                    <div> {{ ucfirst($video->title) }}</div>

                                    @endforeach
                                @endif    
                            
                            </div>
                        
                        </div>
                    
                    </div>


                    <div id="details-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-body">


                                    <div class="form-group d-flex align-items-center" style="height: 64px;">
                                        <label class="font-weight-medium text-muted mr-3">@lang('listing.purpose')<span class="text-danger">*</span></label>
                                        <div style="display:flex;">
                                            <div class="radio mr-3">
                                                <input type="radio" name="edit_purpose_{{ $listing->id }}" id="radio1_{{ $listing->id }}" value="rent"
                                                 @if(old('edit_purpose_'.$listing->id,$listing->purpose)  ) checked @endif class="rent-radio-{{ $listing->id }}" onchange="editShowRentDiv({{ $listing->id }})">
                                                <label for="radio1_{{ $listing->id }}">
                                                    @lang('listing.rent')
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="edit_purpose_{{ $listing->id }}" id="radio2_{{ $listing->id }}" class="rent-radio-{{ $listing->id }}" value="sale" @if(old('edit_purpose_'.$listing->id,$listing->purpose) == 'sale' ) checked @endif onchange="editShowRentDiv({{ $listing->id }})">
                                                <label for="radio2_{{ $listing->id }}">
                                                    @lang('listing.sale')
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" for="">@lang('listing.title')
                                                     
                                        </label>
                                       <input type="text" class="form-control" value="{{ old('edit_title_'.$listing->id,$listing->title) }}" 
                                       name="edit_title_{{ $listing->id }}" >
                              
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.type')<span class="text-danger"> *</span></label>
                                        <div style="flex:2;">
                                            <select class="form-control select2 listing_type_{{ $listing->id }}" onchange="editShowFurnishedQuestion({{ $listing->id }});"   name="edit_type_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
                                                <option value=""></option>
                                                    <optgroup label="@lang('listing.residential')">
                                                        @foreach($listing_types->where('type','residential') as $type)
                                                        <option 
                                                        data-furnished="{{ $type->furnished_question }}"
                                                        @if(old('edit_type_id_'.$listing->id,$listing->type_id) == $type->id) selected @endif
                                                        value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                        @endforeach
                            
                                                    </optgroup>
                                                    <optgroup label="@lang('listing.commercial')">
                                                        @foreach($listing_types->where('type','commercial') as $type)
                                                        <option
                                                        @if(old('edit_type_id_'.$listing->id,$listing->type_id) == $type->id) selected @endif
                                                         value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                        @endforeach
                            
                                                    </optgroup>
                                    
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="form-group" style="flex:1">
                                            <label for="" style="flex:1">@lang('listing.beds')</label>
                                             <select class="form-control select2" name="edit_beds_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
                                                <option value=""></option>
                                                <option @if(old('edit_beds_'.$listing->id,$listing->beds) == 'studio') selected @endif value="studio"
                                                       >@lang('listing.studio')
                                                </option>
                                    
                                                @for($i = 1;$i <= 20 ;$i++)
                                                  <option @if(old('edit_beds_'.$listing->id,$listing->beds) == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
               
                                        </div>
                                        <div class="form-group" style="flex:1">
                                            <label for="" style="flex:1">@lang('listing.baths')</label>
                                            <select class="form-control select2" name="edit_baths_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
                                               <option value=""></option>
               
                                               @for($i = 1;$i <= 10 ;$i++)
                                                 <option @if(old('edit_baths_'.$listing->id,$listing->baths) == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                               @endfor
                                           </select>
                                        </div>
                                    </div>  

                                    <div class="form-group ">
                                        <div class=" form-group" style="flex:1">
                                            <label for="" style="flex:1">@lang('listing.parkings')</label>
                                            <input type="text" style="flex:2"  class="form-control" name="edit_parkings_{{ $listing->id }}"
                                             value="{{ old('edit_parkings_'.$listing->id,$listing->parkings) }}"  >
                                        </div>
                                        <div class=" form-group" style="flex:1">
                                            <label for="" style="flex:1">@lang('listing.year_built')</label>
                                            <input style="flex:2" type="text" class="form-control"  name="edit_year_built_{{ $listing->id }}" 
                                            value="{{ old('edit_year_built_'.$listing->id,$listing->year_built) }}" placeholder=""  >
                                        </div>
                                    </div>  
                                    
                                    
                                    <div class="form-group">
                                        <label for="" class="font-weight-medium text-muted">@lang('listing.plot_area')</label>
                                        <div class="input-group mb-2">
                                            <input name="edit_plot_area_{{ $listing->id }}" type="number" class="form-control"
                                             value="{{ old('edit_plot_area_'.$listing->id,$listing->plot_area) }}"
                                            >
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">sqft</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" for="">@lang('listing.area')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control"
                                             value="{{ old('edit_area_'.$listing->id,$listing->area) }}" name="edit_area_{{ $listing->id }}" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">sqft</div>
                                            </div>
                                        </div>
                                    </div>


                                                                        
                                    <div class="form-group ">
                                        <label class="font-weight-medium text-muted">
                                            @lang('listing.developer')
                                        </label>

                                        <div class="input-group">
                                        <div class="input-group-prepend w-100">
                                                @can('manage_listing_setting')
                                                    <div 
                                                    class="input-group-text cursor-pointer"
                                                    data-toggle="modal"
                                                    data-target="#add_developer" 
                                                    onclick="event.preventDefault()" id="basic-addon1">
                                                        <i 
                                                        data-plugin="tippy" title="@lang('listing.new_developer')"
                                                        data-tippy-placement="top-start" 

                                                        class="fas fa-plus-circle"
                                                        ></i>
                                                    </div>
                                                @endcan
                                
                                                <select  style="" class="form-control select_developer_id select2" name="edit_developer_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.developer')" >
                                                        <option value="" class="font-weight-medium text-muted"></option>
                                                        @foreach($developers as $developer)
                                            
                                                            <option 
                                                            @if(old("edit_developer_id_".$listing->id,$listing->developer_id) == $developer->id) selected @endif 
                                                            value="{{ $developer->id}}">
                                                                {{ $developer->{'name_'.app()->getLocale()} }}
                                                            </option>
                                                        @endforeach    

                                                </select>

                                            </div>
                                        </div>
                                </div>


                                <div>
                                    <div class="checkbox checkbox-primary mb-2">
                                        <input type="hidden" name="edit_never_lived_in_{{ $listing->id }}" value="no">
                                        <input 
                                        @if(old('edit_never_lived_in_'.$listing->id,$listing->never_lived_in) == 'yes') checked @endif
                                        id="neverLivedIn_{{ $listing->id }}"  type="checkbox" name="edit_never_lived_in_{{ $listing->id }}" value="yes">
                                        <label for="neverLivedIn_{{ $listing->id }}">
                                           @lang('listing.never_lived_in') 
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary mb-2">
                                        <input  value="no" type="hidden" name="edit_featured_on_company_website_{{ $listing->id }}">
                                        <input
                                        value='yes'
                                        @if(old('edit_featured_on_company_website_'.$listing->id,$listing->featured_on_company_website) == 'yes') checked @endif
                                         id="featuredOnCompanywebsite_{{ $listing->id }}" type="checkbox" name="edit_featured_on_company_website_{{ $listing->id }}">
                                        <label for="featuredOnCompanywebsite_{{ $listing->id }}">
                                            @lang('listing.featured_on_company_website')
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary mb-2">
                                        <input  type="hidden" name="edit_exclusive_rights_{{ $listing->id }}" value="no"> 
                                        <input id="exclusiveRights_{{ $listing->id }}" name="edit_exclusive_rights_{{ $listing->id }}" type="checkbox" 
                                        @if(old('edit_exclusive_rights_'.$listing->id,$listing->exclusive_rights) == 'yes') checked @endif
                                         value="yes"
                                         >
                                        <label for="exclusiveRights_{{ $listing->id }}">
                                           @lang('listing.exclusive_rights')
                                        </label>
                                    </div>
                                </div>


                                </div>
                                <div class="modal-footer">
    
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                                </div>
                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



                </div> <!-- end card-box-->
            </div> <!-- end col -->

     



            <div class="col-xl-6">
                <div class="card-box">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#agent" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                @lang('listing.pricing')
                            </a>
                        </li>
             
                       
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="agent">
                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#pricing-modal-{{ $listing->id }}">@lang('listing.edit')</button>

                            <div class=" mb-4">
                           
                                <div>@lang('listing.Price'): {{ $listing->price }}</div>
                                <div> @lang('listing.commission'): {{ $listing->comission_value .' - '. $listing->comission_percent .'%' }}</div>
                                <div>@lang('listing.deposite'):  {{ $listing->deposite_value .' - '. $listing->deposite_percent .'%' }}</div>
                                <div>@lang('listing.rent_frequency'): {{ $listing->rent_frequency }}</div>
                                <div>@lang('listing.cheque'): {{ $listing->cheque_type->{'name_'.app()->getLocale()} ?? '' }}</div>
                            </div>
                        
                        </div>
                    
                    </div>


                    <div id="pricing-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" style="flex:1">
                                        <span id="rent-sale-label-{{ $listing->id }}">
                                            @if($listing->purpose == 'rent')
                                             @lang('listing.rent')
                                            @else
                                             @lang('listing.price')
                                            @endif
                                        </span>
                                        <span class="text-danger"> *</span></label>
                                        <div class="input-group mb-2" >
                                            <input type="number"  value="{{ old('edit_price_'.$listing->id,$listing->price) }}" class="form-control decimal_convert" 
                                                   name="edit_price_{{ $listing->id }}" onkeyup="updatePriceEdit({{ $listing->id }})" onchange="updatePriceEdit({{ $listing->id }})" min="1" id="rent-sale_{{ $listing->id }}" required>
                                        
                                        </div>
                                    </div>


                               
                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.annual_commission')</label>
                                        <div style="flex:2">
                                            <div class="d-flex">
                                                <div class="input-group mb-2 mr-sm-2" >
                                                    <input
                                                    name ="edit_comission_percent_{{ $listing->id }}"
                                                    value="{{ old('edit_comission_percent_'.$listing->id,$listing->comission_percent) }}"
                                                     type="number" class="form-control" 
                                                     id="annual-commission_{{ $listing->id }}"
                                                        onchange="updatePriceEdit({{ $listing->id }})"
                                                        onkeyup="updatePriceEdit({{ $listing->id }})"
                                                     data-tippy-placement="top-start" title=""
                                                     >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">%</div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-2" >
                                                    <input
                                                    name="edit_comission_value_{{ $listing->id }}"
                                                    value="{{ old('edit_comission_value_'.$listing->id,$listing->comission_value) }}"
                                                     type="text" class="form-control"
                                                      id="commissionValue_{{ $listing->id }}"
                                                       data-tippy-placement="top-start"
                                                        title=""
                                                        readonly
                                                        >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">AED</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                               
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.deposite')</label>
                                        <div style="flex:2">
                                            <div class="d-flex">
                           
                                                <div class="input-group mr-sm-2" >
                                                    <input 
                                                     name="edit_deposite_percent_{{ $listing->id }}"
                                                     value="{{ old('edit_deposite_percent_'.$listing->id,$listing->deposite_percent) }}"
                                                     type="number" class="form-control" id="deposit-percenatage_{{ $listing->id }}"
                                                       onchange="updatePriceEdit({{ $listing->id }})"
                                                       onkeyup="updatePriceEdit({{ $listing->id }})"
                                                     >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">%</div>
                                                    </div>
                                                </div>
                           
                                                <div class="input-group" >
                                                    <input 
                                                    name="edit_deposite_value_{{ $listing->id }}"
                                                    value="{{ old('edit_deposite_value_'.$listing->id,$listing->deposite_value) }}"
                                                    type="text"
                                                    id="depositValue_{{ $listing->id }}" 
                                                    class="form-control" readonly>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">AED</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        {{-- rent paid every month,week,day,year --}}
                                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent_frequency')</label>
                                        <div class="d-flex" style="flex:2">
                                            <select name="edit_rent_frequency_{{ $listing->id }}" class="form-control select2" 
                                               name="edit_Frequency_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.rent_frequency')">
                                                <option value=""></option>
                                                <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'yearly') selected @endif value="yearly">
                                                    @lang('listing.yearly')
                                                </option>
                                                <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'monthly') selected @endif value="monthly">
                                                    @lang('listing.monthly')
                                                </option>
                                                <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'weekly') selected @endif value="weekly">
                                                    @lang('listing.weekly')
                                                </option>
                                                <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'daily') selected @endif value="daily">
                                                    @lang('listing.daily')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.cheque')</label>
                                         <select class="form-control select2"
                                          name="edit_listing_rent_cheque_id_{{ $listing->id }}" 
                                          data-toggle="select2" data-placeholder="@lang('listing.select')">
                                            <option value=""></option>
                                            @foreach($cheques as $cheque)
                                            <option
                                               @if($cheque->id == old('edit_listing_rent_cheque_id_'.$listing->id,$listing->listing_rent_cheque_id))
                                                selected
                                               @endif
                                             value="{{ $cheque->id }}">{{ $cheque->{'name_'.app()->getLocale()}  }}</option>
                           
                                            @endforeach
                                    
                                        </select>
                                    </div>
                     
                                </div>
                                <div class="modal-footer">
    
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                                </div>
                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div> <!-- end card-box-->
            </div> <!-- end col -->

{{--     
      @include('listing::listing.edit.location_price')
      @include('listing::listing.edit.listing_details')
      @include('listing::listing.edit.associates')
      @include('listing::listing.modals.edit_modals')

    --}}
    </div>
    
    <div class="d-flex justify-content-start">
    
        <button onclick="event.preventDefault();table_row_hide('edit_listing_{{ $listing->id }}')" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
 
    @include('listing::listing.modals.edit_modals')


</form>
