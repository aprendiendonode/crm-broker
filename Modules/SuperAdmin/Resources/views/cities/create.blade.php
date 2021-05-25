<form id="add-team-form" action="{{ route('cities.store') }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
<div class="row">
        @csrf

    
    <div class="col-md-6">     
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.cities.name_en')</label>
                <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('superadmin.cities.name_en')" required>
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.cities.name_ar')</label>
                <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('superadmin.cities.name_ar')">
            </div> 
    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.cities.code')</label>
            <input type="text" class="form-control"  name="code" pattern="/^([0-9\s\-\+\(\)]*)$/" id="code" value="{{ old('code') }}"  placeholder="@lang('superadmin.cities.code')">
        </div> 
        
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="country" class="font-weight-medium text-muted">@lang('settings.country')</label>
            <select class="form-control select2" data-placeholder="@lang('superadmin.cities.select')" name="country_id" id="country_id"
                    data-toggle="select2">
                <option value=""></option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" {{old('country_id') == $country->id ? 'selected' : ''}}>{{$country->value ?? ''}}</option>
                @endforeach

            </select>
        </div>
    </div>

    
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-outline-success waves-effect waves-light">
       @lang('superadmin.cities.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.cities.submit')
    </button>
</div>

</form>
