<form id="add-staff-form" action="{{ route('setting.task_status.store') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
<div class="row">
        @csrf

    @if($agency)
        <input type="hidden" name="agency_id" value="{{ $agency }}">
    @endif
    @if($business)
        <input type="hidden" name="business_id" value="{{ $business }}">
    @endif


    <div class="col-md-12">



        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('settings.status_en')</label>
            <input type="text" class="form-control"  name="status_en" id="status_setting_en" value="{{ old('status_en') }}" placeholder="@lang('settings.status_en')" required>
        </div>

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('settings.status_ar')</label>
            <input type="text" class="form-control"  name="status_ar" id="status_setting_ar" value="{{ old('status_ar') }}" placeholder="@lang('settings.status_ar')" required>
        </div>


        <div class="form-group">
            <label>@lang('settings.type_complete')</label> <br/>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio-1" name="type" value="on" checked class="custom-control-input">
                <label class="custom-control-label" for="customRadio-1">@lang('settings.on')</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio-2" name="type" value="off" class="custom-control-input">
                <label class="custom-control-label" for="customRadio-2"> @lang('settings.off')</label>
            </div>

        </div>
    </div>


</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
       @lang('settings.cancel')
    </button>
    <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('settings.submit')
    </button>
</div>

</form>
