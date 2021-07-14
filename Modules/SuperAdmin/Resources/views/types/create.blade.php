<form id="add-team-form" action="{{ url('superadmin/manage-listing-type') }}" data-parsley-validate="" method="POST" >
<div class="row">
        @csrf

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

        <div class="mt-3">

            <div class="custom-control custom-radio mb-2">
                <input 
                type="radio"
                @if(old('type','residential') == 'residential')     checked @endif

                 id="type2" name="type" value="residential" class="custom-control-input" >
                <label class="custom-control-label" for="type2">@lang('listing.residential')</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" 
                @if(old('type') == 'commercial')     checked @endif
                id="type1" name="type"  value="commercial" class="custom-control-input">
                <label class="custom-control-label" for="type1">@lang('listing.commercial')</label>
            </div>
      
        </div>
        
</div>




<div class="col-md-6">

    <div class="mt-3">

        <div class="custom-control custom-radio mb-2">
            <input type="radio"
            @if(old('furnished_question','no') == 'no')     checked @endif

             id="furnished_question1" name="furnished_question" value="yes" class="custom-control-input" >
            <label class="custom-control-label" for="furnished_question1">@lang('listing.has_furnished_question')</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio"
            @if(old('furnished_question') == 'yes')     checked @endif

             id="furnished_question2" name="furnished_question"  value="no" class="custom-control-input">
            <label class="custom-control-label" for="furnished_question2">@lang('listing.no_furnished_question')</label>
        </div>
  
    </div>
    
</div>

<div class="col-md-6">


      
    <div class="form-group">
        <label class="mb-1 font-weight-medium text-muted">@lang('listing.reference')</label>
        <input type="text" class="form-control"  name="reference" id="reference" value="{{ old('reference') }}" placeholder="@lang('listing.reference')" required>
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
