<form id="add-team-form" action="{{ url('sales/manage_lead_property') }}" data-parsley-validate="" method="POST" >
<div class="row">
        @csrf

        @if($agency)
        <input type="hidden" name="agency_id" value="{{ $agency }}">
        @endif
        @if($business)
        <input type="hidden" name="business_id" value="{{ $business }}">
        @endif
    <div class="col-md-6">


      
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('agency.english_name')" required>
            </div>


    </div>
    <div class="col-md-6">




        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
            <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('agency.arabic_name')">
        </div> 
</div>


    
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-outline-success waves-effect waves-light">
       @lang('agency.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
    </button>
</div>

</form>
