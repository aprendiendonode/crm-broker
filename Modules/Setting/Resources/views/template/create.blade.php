<form id="add-staff-form" action="{{ route('setting.templates.store') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
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
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.template_title')</label>
                <input type="text" class="form-control"  name="title" id="title" value="{{ old('title') }}" placeholder="@lang('settings.template_title')" required>
            </div>


        <div class="form-group">
            <label>@lang('settings.template_type')</label> <br/>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio-1" name="type" value="description" checked class="custom-control-input">
                <label class="custom-control-label" for="customRadio-1">@lang('settings.description')</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio-2" name="type" value="email" class="custom-control-input">
                <label class="custom-control-label" for="customRadio-2"> @lang('settings.email')</label>
            </div>

        </div>


            <div class="form">


                                <div class="form-group custom-toggle">
                                    <div class="d-flex justify-content-between">
                                    <label class="mb-1 font-weight-medium text-muted" for="description_en">@lang('settings.content')</label>

                                        <input onchange="toggle_desc()" class="description" type="checkbox"
                                        checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                                        data-offstyle="success">

                                </div>

                                    <div class="description_en">

                                        <textarea id="description_en" name="description_en" >{{old('description_en')}}</textarea>
                                    </div>
                                    <div class="description_ar d-none">


                                        <textarea id="description_ar"  name="description_ar" >{{old('description_ar')}}</textarea>
                                    </div>

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
