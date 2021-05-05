<form action="{{ url('listing/manage-listing-cheque/'.$cheque->id) }}" data-parsley-validate="" method="POST" >
    <div class="row">
            @csrf
            @method('PATCH')
    
        
      
        <div class="col-md-6">
    
    
          
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="edit_name_en_{{ $cheque->id }}"  value="{{ old('edit_name_en_'.$cheque->id,$cheque->name_en) }}" placeholder="@lang('agency.english_name')" required>
                </div>

 
            
        </div>

        <div class="col-md-6">

  



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $cheque->id }}"  value="{{ old('edit_name_ar_'.$cheque->id,$cheque->name_ar) }}" required placeholder="@lang('agency.arabic_name')">
            </div>




        </div>
    
        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $cheque->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

