<form action="{{ route('communities.update',$community->id) }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $community->id }}"  value="{{ old('edit_name_en_'.$community->id,$community->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

 
            
        </div>

        <div class="col-md-6">

  



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $community->id }}"  value="{{ old('edit_name_ar_'.$community->id,$community->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
            </div>




        </div>
  
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="font-weight-medium text-muted">@lang('superadmin.cities.city')</label>
                <select class="form-control select2" data-placeholder="@lang('superadmin.cities.select')" name="edit_city_id_{{ $community->id }}" id="edit_city_id_{{ $community->id }}"
                        data-toggle="select2">
                    <option value=""></option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" {{old('edit_city_id_'.$community->id,$community->city_id) == $city->id ? 'selected' : ''}}>{{$city->{'name_'.app()->getLocale()} }}</option>
                    @endforeach
    
                </select>
            </div>
        </div>
  
    

    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $community->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

