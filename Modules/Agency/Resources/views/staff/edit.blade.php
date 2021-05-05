<form action="{{ url('agency/manage_staff/'.$staff->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $staff->id }}"  value="{{ old('edit_name_en_'.$staff->id,$staff->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                    <input type="text" class="form-control"  name="edit_name_ar_{{ $staff->id }}"  value="{{ old('edit_name_ar_'.$staff->id,$staff->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
                </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.email')</label>
                    <input type="email" class="form-control"  name="edit_email_{{ $staff->id }}"   value="{{ old('edit_email_'.$staff->id,$staff->email) }}" required placeholder="@lang('agency.email')">
                </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.brn')</label>
                    <input type="text" class="form-control"  name="edit_brn_{{ $staff->id }}" value="{{ old('edit_brn_'.$staff->id,$staff->brn) }}"  placeholder="@lang('agency.brn')">
                </div>
    
    
     
    
    
                
       
                    <div class="form-group">
                        <label for="">@lang('agency.team')</label>
                        <select class="form-control select2" name="edit_team_id_{{ $staff->id }}" data-toggle="select2" data-placeholder="@lang('agency.select_team')">
                            <option value=""></option>
                            @forelse($teams as $team)
                            <option @if(old('edit_team_id_'.$staff->id,$staff->team_id) == $team->id) selected @endif value="{{ $team->id }}">{{ $team->{'name_'.app()->getLocale()} }}</option>
                            @empty
                            @endforelse

                        </select>

                    </div>

                    <div class="form" >
                        
    
                            <div class="form-group custom-toggle">
                                <div class="d-flex justify-content-between">
                                <label class="mb-1 font-weight-medium text-muted" for="description_en">@lang('agency.about_you')</label>
                                
                                    <input onchange="toggle_edit_desc({{ $staff->id }})" class="description_edit_{{ $staff->id }}" type="checkbox"
                                    checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                                    data-offstyle="success">
                                
                            </div>
                    
                                <div class="description_edit_en_{{ $staff->id }}">
    
                                    <textarea id="description_edit_en_{{ $staff->id }}" name="edit_description_en_{{ $staff->id }}" >{{old('edit_description_en_'.$staff->id,$staff->description_en)}}</textarea>
                                </div>    
                                <div class="description_edit_ar_{{ $staff->id }} d-none">
    
                                    <textarea id="description_edit_ar_{{ $staff->id }}"  name="edit_description_ar_{{ $staff->id }}" >{{old('edit_description_ar_'.$staff->id,$staff->description_ar)}}</textarea>
                                </div>
    
                            </div>
                        
                    </div>
    
    

                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted"
                                   for="image">@lang('agency.image')</label>
                            <input type="file" name="edit_image_{{ $staff->id }}" data-plugins="dropify" id="image"
                                   data-default-file="{{ $staff->image != null ? asset('profile_images/'.$staff->image) : '' }}" />
                        </div>
            
        </div>

        <div class="col-md-6">

                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.primary')</label>
                    <div class="d-flex">



                        <div class="" style="flex:4">
                            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('agency.phone')" type="text" class="form-control" name="edit_phone_{{ $staff->id }}"   value="{{ old('edit_phone_'.$staff->id ,$staff->phone) }}" placeholder="@lang('agency.phone')"  required>
                        </div>
                    </div>
                </div>





                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.secondary')</label>
                    <div class="d-flex">
                

                        <div class="" style="flex:4">
                            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('agency.cell')" type="text" class="form-control" name="edit_cell_{{ $staff->id }}" placeholder="@lang('agency.cell')"  value="{{ old('edit_cell_'.$staff->id, $staff->cell) }}" >
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.fax')</label>
                    <div class="d-flex">


                        <div class="" style="flex:4">
                            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('agency.staff_fax')" type="text" class="form-control" name="edit_staff_fax_{{ $staff->id }}"   value="{{ old('edit_staff_fax_'.$staff->id,$staff->staff_fax) }}"   placeholder="@lang('agency.staff_fax')"  >
                        </div>
                    </div>
                </div>




                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('agency.address')</label>
                        <input type="text" class="form-control" value="{{ old('edit_address_'.$staff->id,$staff->address) }}" name="edit_address_{{ $staff->id }}"  id="address">
                    </div>

                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('agency.zip')</label>
                        <input type="text" class="form-control" value="{{ old('edit_zip_'.$staff->id,$staff->zip) }}" name="edit_zip_{{ $staff->id }}" id="zip">
                    </div>



                    <div class="form-group">
                        <label for="country">@lang('agency.nationaly')</label>
                        <select required class="form-control select2" name="edit_nationality_id_{{ $staff->id }}"  data-toggle="select2" data-placeholder="@lang('agency.select_nationality')">
                            <option value=""></option>
                           @foreach($countries as $country)
                               <option @if(old('edit_nationality_id_'.$staff->id,$staff->nationality_id) == $country->id) selected @endif value="{{$country->id}}">{{$country->value ?? ''}}</option>
                           @endforeach

                        </select>
                    </div>



                <div class="form-group">
                    <label>@lang('agency.is_active')</label> <br/>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input @if(old('edit_active_'.$staff->id,$staff->active) == 1) checked @endif type="radio" id="yes_{{$staff->id}}" name="edit_active_{{ $staff->id }}" value="1"  class="custom-control-input">
                        <label class="custom-control-label" for="yes_{{$staff->id}}">@lang('agency.yes')</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input @if(old('edit_active_'.$staff->id,$staff->active) == 0) checked @endif  type="radio" id="no_{{$staff->id}}" name="edit_active_{{ $staff->id }}" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="no_{{$staff->id}}"> @lang('agency.no')</label>
                    </div>

                </div>





                 <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.skype')</label>
                    <input type="email" class="form-control" maxlength="25" value="{{ old('edit_skype_'.$staff->id,$staff->skype) }}" name="edit_skype_{{ $staff->id }}" >
                 </div>


                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.whats_app')</label>
                    <input type="text" pattern="/^([0-9\s\-\+\(\)]*)$/" class="form-control" value="{{ old('edit_whatsapp_'.$staff->id,$staff->whatsapp) }}"  name="edit_whatsapp_{{ $staff->id }}" >
                </div>




        </div>
    
        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $staff->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

