<form action="{{ route('countries.update',$country->id) }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $country->id }}"  value="{{ old('edit_name_en_'.$country->id,$country->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

 
            
        </div>

        <div class="col-md-6">

  



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $country->id }}"  value="{{ old('edit_name_ar_'.$country->id,$country->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
            </div>




        </div>
    

    
   
        <div class="col-md-6">

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.timezone')</label>
                <input type="text" class="form-control"  name="edit_timezone_{{ $country->id }}" id="edit_timezone_{{ $country->id }}" value="{{ old('edit_timezone_'.$country->id,$country->time_zone) }}" required placeholder="@lang('superadmin.countries.timezone')">
            </div> 
            
        </div>
        <div class="col-md-6">
    
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.code')</label>
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_code_{{ $country->id }}" id="edit_code_{{ $country->id }}" value="{{ old('edit_code_'.$country->id,$country->phone_code) }}" required placeholder="@lang('superadmin.countries.code')">
            </div> 
            
        </div>
        <div class="col-md-6">
    
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.short_name')</label>
                <input type="text" class="form-control"  name="edit_value_{{ $country->id }}" id="edit_value_{{ $country->id }}" value="{{ old('edit_value_'.$country->id,$country->value) }}" required placeholder="@lang('superadmin.countries.short_name')">
            </div> 
            
        </div>
    
        <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted"
                       for="flag">@lang('settings.flag')</label>
                <input  data-plugin="tippy" data-tippy-placement="top-start" type="file" name="edit_flag_{{ $country->id }}" data-plugins="dropify" id="edit_flag_{{ $country->id }}"
                       data-default-file="{{$country->flag != null ? asset('images/flags/'.$country->flag) : ''}}"/>
            </div>
        </div>
    
    






        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $country->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

