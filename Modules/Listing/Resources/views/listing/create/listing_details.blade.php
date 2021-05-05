<div class="col-md-4">
    <h4 class="mb-3">@lang('listing.listing_details')</h4>
             <div class="row">
                 <div class="col-6">
                     <div class="form-group ">
                         <div class="form-group" style="flex:1">
                             <label for="" style="flex:1">@lang('listing.beds')</label>
                              <select class="form-control select2" name="beds" data-toggle="select2" data-placeholder="select">
                                 <option value=""></option>
                                 <option @if(old('beds') == 'studio') selected @endif value="studio"
                                        >@lang('listing.studio')</option>
                     
                                 @for($i = 1;$i <= 20 ;$i++)
                                   <option @if(old('beds') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                 @endfor
                             </select>

                         </div>
                         <div class="form-group" style="flex:1">
                             <label for="" style="flex:1">@lang('listing.baths')</label>
                             <select class="form-control select2" name="baths" data-toggle="select2" data-placeholder="select">
                                <option value=""></option>

                                @for($i = 1;$i <= 10 ;$i++)
                                  <option @if(old('baths') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                         </div>
                     </div>                    
                 </div>
                 <div class="col-6">
                     <div class="form-group ">
                         <div class=" form-group" style="flex:1">
                             <label for="" style="flex:1">@lang('listing.parkings')</label>
                             <input type="text" style="flex:2"  class="form-control" name="parkings" value="{{ old('parkings') }}"  >
                         </div>
                         <div class=" form-group" style="flex:1">
                             <label for="" style="flex:1">@lang('listing.year_built')</label>
                             <input style="flex:2" type="text" class="form-control"  name="year_built" value="{{ old('year_built') }}" placeholder=""  >
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
 
                 <select  style="" class="form-control select_developer_id select2" name="developer_id" data-toggle="select2" data-placeholder="@lang('listing.developer')" >
                         <option value="" class="font-weight-medium text-muted"></option>
                         @foreach($developers as $developer)
            
                         <option 
                         @if(old("developer_id") == $developer->id) selected @endif 
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
                 <input name="plot_area" type="number" class="form-control" value="{{ old('plot_area') }}"
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
                 <input type="number" class="form-control" value="{{ old('area') }}" name="area" required>
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
                          name="deposite_percent"
                          value="{{ old('deposite_percent') }}"
                          type="text" class="form-control" id="depost-percenatage"
                          >
                         <div class="input-group-prepend">
                             <div class="input-group-text">%</div>
                         </div>
                     </div>

                     <div class="input-group" >
                         <input 
                         name="deposite_value"
                         value="{{ old('deposite_value') }}"
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
               name="listing_rent_cheque_id" 
               data-toggle="select2" data-placeholder="select">
                 <option value=""></option>
                 @foreach($cheques as $cheque)
                 <option
                 @if($cheque->id == old('listing_rent_cheque_id')) selected @endif
                  value="{{ $cheque->id }}">{{ $cheque->{'name_'.app()->getLocale()}  }}</option>

                 @endforeach
         
             </select>
         </div>
         <div class="form-group">
             <div class="d-flex justify-content-between align-items-end" style="height:65px">
                 <div>
                     <button onclick="event.preventDefault()" data-toggle="modal" data-target="#featuresModal" class="btn btn-outline-dark btn-sm px-1">
                         <i class="fas fa-plus"></i>
                         <span>
                             Features(0)
                         </span>
                     </button>
                     <button onclick="event.preventDefault()" data-toggle="modal" data-target="#extraInfo-modal" data-toggle="modal" data-target="#extraInfo" class="btn btn-outline-dark btn-sm px-1">
                         <i class="fas fa-plus"></i>
                         <span>
                             Extra Info
                         </span>
                     </button>
                 </div>
            
             </div>
         </div>




             <div class="form-group">
                 <label class="font-weight-medium text-muted" for="">@lang('listing.title')
                              
                 </label>
                <input type="text" class="form-control" value="{{ old('title') }}" 
                name="title" >
       
             </div>

             <div class="form-group">
                     <label class="font-weight-medium text-muted">@lang('listing.description')</label>
                     <div class="" >
                         <div class="description_en-1" onclick="handleDescModal()">
                             <textarea class="form-control"
                              id="description_en-1" >{{old('description_en')}}</textarea>
                         </div>    
                 
                         <div>
                         </div>
                         <div class="mt-1">

                         <button onclick="event.preventDefault()" data-toggle="modal" data-target="#portals-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.portals_(1)')
                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal" data-target="#photos-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.photos_(1)')

                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal" data-target="#videos-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.videos_(1)')

                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal" data-target="#floorPlans-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.floor_plans_(1)')
                             </span>
                         </button>
                         <button onclick="event.preventDefault()" data-toggle="modal" data-target="#documents-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                             <i class="fas fa-plus"></i>
                             <span>
                                 @lang('listing.documents_(1)')
                             </span>
                         </button>
                         </div>

                 </div>
             </div>


             <div class="form-group form-inline d-none furnished_question" style="height: 64px;">
                 <label class="font-weight-medium text-muted mr-3">@lang('listing.furnished')</label>
                 <div style="display:flex; flex:2">
                     <div class="radio mr-3">
                         <input type="radio" name="furnished" id="furnished" value="yes" @if(old('furnished') == 'yes') checked @endif>
                         <label for="furnished">
                             @lang('listing.furnished')
                         </label>
                     </div>
                     <div class="radio">
                         <input type="radio" name="furnished" id="unfurnished" value="no" @if(old('furnished','no') == 'no') checked @endif>
                         <label for="unfurnished">
                             @lang('listing.unfurnished')
                         </label>
                     </div>
                 </div>
         </div>





                 <script>
                     function handleDescModal() {
                         $('#description-modal').modal('show');
                     }
                 </script>
                         
     
 </div>