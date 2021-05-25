<form id="add-team-form" action="{{ route('communities.store') }}" data-parsley-validate="" method="POST"  enctype="multipart/form-data">
<div class="row">
        @csrf

    
    <div class="col-md-6">     
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.communities.name_en')</label>
                <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('superadmin.communities.name_en')" required>
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.communities.name_ar')</label>
                <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('superadmin.communities.name_ar')">
            </div> 
    </div>




    <div class="col-md-6">
        <div class="form-group">
            <label for="city" class="font-weight-medium text-muted">@lang('superadmin.communities.city')</label>
            <select class="form-control select2" data-placeholder="@lang('superadmin.communities.select')" name="city_id" id="city_id"
                    data-toggle="select2">
                <option value=""></option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>{{$city->{'name_'.app()->getLocale()} }}</option>
                @endforeach

            </select>
        </div>
    </div>


    
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-outline-success waves-effect waves-light">
       @lang('superadmin.communities.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.communities.submit')
    </button>
</div>

</form>
