<form id="add-staff-form" action="{{ route('setting.maillists.store') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
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
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.name_en')</label>
                <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('settings.name_en')" required>
            </div>

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.name_ar')</label>
                <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" placeholder="@lang('settings.name_ar')">
            </div>

        <div class="form-group">
            <label for="" class="font-weight-medium text-muted">@lang('settings.maillist_contacts')</label>
            <select class="form-control select2 " data-toggle="select2" multiple name="mails[]" >
                <option value="">@lang('settings.select')</option>
            @foreach($mails as $mail)
                <option value="{{$mail}}">{{$mail ?? ''}}</option>
                @endforeach



            </select>
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
