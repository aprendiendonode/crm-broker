<form id="add-staff-form" action="{{ route('setting.task_types.store') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
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
            <label class="mb-1 font-weight-medium text-muted">@lang('settings.type_en')</label>
            <input type="text" class="form-control"  name="type_en" id="type_setting_en" value="{{ old('type_en') }}" placeholder="@lang('settings.type_en')" required>
        </div>

        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('settings.type_ar')</label>
            <input type="text" class="form-control"  name="type_ar" id="type_setting_ar" value="{{ old('type_ar') }}" placeholder="@lang('settings.type_ar')" required>
        </div>


        {{--<div class="form-group">--}}
            {{--<label>@lang('settings.address_required')</label> <br/>--}}
            {{--<div class="custom-control custom-radio custom-control-inline">--}}
                {{--<input type="radio" id="customRadio-1" name="address_required" value="on" checked class="custom-control-input">--}}
                {{--<label class="custom-control-label" for="customRadio-1">@lang('settings.on')</label>--}}
            {{--</div>--}}
            {{--<div class="custom-control custom-radio custom-control-inline">--}}
                {{--<input type="radio" id="customRadio-2" name="address_required" value="off" class="custom-control-input">--}}
                {{--<label class="custom-control-label" for="customRadio-2"> @lang('settings.off')</label>--}}
            {{--</div>--}}

        {{--</div>--}}
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
