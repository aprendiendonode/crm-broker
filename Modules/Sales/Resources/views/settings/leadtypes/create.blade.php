<form id="add-team-form" action="{{ url('sales/manage_lead_types') }}" data-parsley-validate="" method="POST" >
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
<div class="col-md-6">
    <div class="form-group ">


    <lable class="text-muted pr-2 font-weight-medium mt-1" >@lang('sales.role')</lable>
 
    
            <select  style="" class="form-control  select2" name="role" data-toggle="select2" data-placeholder="@lang('sales.role')" required>
                <option value="" class="font-weight-medium text-muted"></option>

                <option 
                @if(old('role') == 'investor' ) selected @endif
                value="investor">@lang('sales.investor')</option>
                <option
                @if(old('role') == 'tenant' ) selected @endif
                 value="tenant">@lang('sales.tenant')</option>
                <option 
                @if(old('role') == 'buyer' ) selected @endif
                value="buyer">@lang('sales.buyer')</option>
                <option 
                @if(old('role') == 'enquirer' ) selected @endif
                value="enquirer">@lang('sales.enquirer')</option>
                <option
                @if(old('role') == 'seller' ) selected @endif
                 value="seller">@lang('sales.seller')</option>
                <option
                @if(old('role') == 'agent' ) selected @endif
                 value="agent">@lang('sales.agent')</option>
                <option 
                @if(old('role') == 'other' ) selected @endif
                value="other">@lang('sales.other')</option>
               
               
         
            </select>

    
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
