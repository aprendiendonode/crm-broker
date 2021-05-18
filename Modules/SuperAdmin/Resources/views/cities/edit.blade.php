<form action="{{ route('cities.update',$city->id) }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $city->id }}"  value="{{ old('edit_name_en_'.$city->id,$city->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

 
            
        </div>

        <div class="col-md-6">

  



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $city->id }}"  value="{{ old('edit_name_ar_'.$city->id,$city->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
            </div>




        </div>
    

    
   
  
        <div class="col-md-6">
    
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.cities.code')</label>
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_code_{{ $city->id }}" id="edit_code_{{ $city->id }}" value="{{ old('edit_code_'.$city->id,$city->code) }}" required placeholder="@lang('superadmin.cities.code')">
            </div> 
            
        </div>

    
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="font-weight-medium text-muted">@lang('settings.country')</label>
                <select class="form-control select2" data-placeholder="@lang('superadmin.cities.select')" name="edit_country_id_{{ $city->id }}" id="edit_country_id_{{ $city->id }}"
                        data-toggle="select2">
                    <option value=""></option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}" {{old('edit_country_id_'.$city->id,$city->country_id) == $country->id ? 'selected' : ''}}>{{$country->value ?? ''}}</option>
                    @endforeach
    
                </select>
            </div>
        </div>
  
    

    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $city->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

