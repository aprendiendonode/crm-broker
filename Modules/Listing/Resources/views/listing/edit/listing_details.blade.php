<div class="col-md-4">
    <h4 class="mb-3">@lang('listing.listing_details')</h4>
             <div class="row">
                 <div class="col-6">
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
                 </div>
                 <div class="col-6">
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
         <div class="form-group">
             <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.deposite')</label>
             <div style="flex:2">
                 <div class="d-flex">

                     <div class="input-group mr-sm-2" >
                         <input 
                          name="edit_deposite_percent_{{ $listing->id }}"
                          value="{{ old('edit_deposite_percent_'.$listing->id,$listing->deposite_percent) }}"
                          type="text" class="form-control" id="depost-percenatage"
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
                         class="form-control" id="depost-cash" >
                         <div class="input-group-prepend">
                             <div class="input-group-text">AED</div>
                         </div>
                     </div>
                     
                 </div>
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
         <div class="form-group">
             <div class="d-flex justify-content-between align-items-end" style="height:65px">
                 <div>
                     <button onclick="event.preventDefault()" data-toggle="modal" 
                     data-target="#featuresModal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1">
                         <i class="fas fa-plus"></i>
                         <span>
                             @lang('listing.features')
                         </span>
                     </button>
                     <button onclick="event.preventDefault()" data-toggle="modal"
                      data-target="#extraInfo-modal_{{ $listing->id }}" data-toggle="modal" data-target="#extraInfo" class="btn btn-outline-dark btn-sm px-1">
                         <i class="fas fa-plus"></i>
                         <span>
                          
                             @lang('listing.extra_info')
                         </span>
                     </button>
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
                     <label class="font-weight-medium text-muted">@lang('listing.description')</label>
                     <div class="" >
                         <div class="description_en-1" onclick="editHandleDescModal({{ $listing->id }})">
                             <textarea class="form-control"
                              id="description_en-1_{{ $listing->id }}" >{{old('edit_description_en_'.$listing->id,$listing->description_en)}}</textarea>
                         </div>    
                 
                         
                         <div class="mt-1">

                         <button onclick="event.preventDefault()" data-toggle="modal" 
                         data-target="#portals-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.portals_(1)')
                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal"
                          data-target="#photos-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.photos_(1)')

                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal" 
                         data-target="#videos-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.videos_(1)')

                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal"
                          data-target="#floorPlans-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.floor_plans_(1)')
                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal"
                          data-target="#documents-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.documents_(1)')
                             </span>
                         </button>
                         </div>

                 </div>
             </div>

             @php
                $has_question =   $listing->type ? $listing->type->furnished_question : '';
             @endphp
             <div class="form-group form-inline @if($has_question != 'yes') d-none @endif  furnished_question_{{ $listing->id }}" style="height: 64px;">
                 <label class="font-weight-medium text-muted mr-3">@lang('listing.furnished')</label>
                 <div style="display:flex; flex:2">
                     <div class="radio mr-3">
                         <input type="radio" name="edit_furnished_{{ $listing->id }}" id="furnished_{{ $listing->id }}" value="yes"
                          @if(old('edit_furnished_'.$listing->id,$listing->furnished) == 'yes') checked @endif>
                         <label for="furnished_{{ $listing->id }}">
                             @lang('listing.furnished')
                         </label>
                     </div>
                     <div class="radio">
                         <input type="radio" name="edit_furnished_{{ $listing->id }}" id="unfurnished_{{ $listing->id }}" value="no" 
                         @if(old('edit_furnished_'.$listing->id,$listing->furnished) == 'no') checked @endif>
                         <label for="unfurnished_{{ $listing->id }}">
                             @lang('listing.unfurnished')
                         </label>
                     </div>
                 </div>
         </div>





                 <script>
                     function editHandleDescModal(id) {
                         $('#description-modal_'+id).modal('show');
                     }
                 </script>
                         
     
 </div>