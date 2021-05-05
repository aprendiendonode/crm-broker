<form action="{{ url('listing/manage-listing-type/'.$type->id) }}" data-parsley-validate="" method="POST" >
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $type->id }}"  value="{{ old('edit_name_en_'.$type->id,$type->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

 
            
        </div>

        <div class="col-md-6">

  



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $type->id }}"  value="{{ old('edit_name_ar_'.$type->id,$type->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
            </div>




        </div>
    

        <div class="col-md-6">

            <div class="mt-3">
    
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="edit_type1_{{ $type->id }}" name="edit_type_{{ $type->id }}" value="residential" class="custom-control-input"
                     @if(old('edit_type_'.$type->id,$type->type) == 'residential')     checked @endif>
                    <label class="custom-control-label" for="edit_type1_{{ $type->id }}">@lang('listing.residential')</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="edit_type2_{{ $type->id }}" name="edit_type_{{ $type->id }}"
                    @if(old('edit_type_'.$type->id,$type->type) == 'commercial')     checked @endif
                      value="commercial" class="custom-control-input">
                    <label class="custom-control-label" for="edit_type2_{{ $type->id }}">@lang('listing.commercial')</label>
                </div>
          
            </div>
            
    </div>
    
    
        
    

    <div class="col-md-6">

        <div class="mt-3">
    
            <div class="custom-control custom-radio mb-2">
                <input type="radio"
                @if(old('edit_furnished_question_'.$type->id,$type->furnished_question) == 'yes')     checked @endif

                 id="edit_furnished_question1_{{ $type->id }}" name="edit_furnished_question_{{ $type->id }}" value="yes" class="custom-control-input" checked>
                <label class="custom-control-label" for="edit_furnished_question1_{{ $type->id }}">@lang('listing.has_furnished_question')</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" 
                @if(old('edit_furnished_question_'.$type->id,$type->furnished_question) == 'no')     checked @endif

                id="edit_furnished_question2_{{ $type->id }}" name="edit_furnished_question_{{ $type->id }}"  value="no" class="custom-control-input">
                <label class="custom-control-label" for="edit_furnished_question2_{{ $type->id }}">@lang('listing.no_furnished_question')</label>
            </div>
      
        </div>
        
    </div>
    






      
    <div class="col-md-6">
    
    
          
        <div class="form-group">
            <label class="mb-1 font-weight-medium text-muted">@lang('listing.reference')</label>
            <input type="text" class="form-control"  name="edit_reference_{{ $type->id }}"  
            value="{{ old('edit_reference_'.$type->id,$type->reference) }}" placeholder="@lang('listing.reference')" required>
        </div>


    
    </div>





        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $type->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

