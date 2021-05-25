<form id="add-team-form" action="{{ route('countries.store') }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
<div class="row">
        @csrf

    
    <div class="col-md-6">     
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.name_en')</label>
                <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('superadmin.countries.name_en')" required>
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.name_ar')</label>
                <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('superadmin.countries.name_ar')">
            </div> 
    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.timezone')</label>
            <input type="text" class="form-control"  name="timezone" id="timezone" value="{{ old('timezone') }}" required placeholder="@lang('superadmin.countries.timezone')">
        </div> 
        
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.code')</label>
            <input type="text" class="form-control"  name="code" pattern="/^([0-9\s\-\+\(\)]*)$/" id="code" value="{{ old('code') }}" required placeholder="@lang('superadmin.countries.code')">
        </div> 
        
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.countries.short_name')</label>
            <input type="text" class="form-control"  name="value" id="value" value="{{ old('value') }}" required placeholder="@lang('superadmin.countries.short_name')">
        </div> 
        
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted"
                   for="flag">@lang('superadmin.countries.flag')</label>
            <input  data-plugin="tippy" data-tippy-placement="top-start" type="file" name="flag" data-plugins="dropify" id="flag"
                   />
        </div>
    </div>



    
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-outline-success waves-effect waves-light">
       @lang('superadmin.countries.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.countries.submit')
    </button>
</div>

</form>
