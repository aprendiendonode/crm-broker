
<form id="edit-staff-form" action="{{ route('listing.update',$listing->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
            @if($agency)
            <input type="hidden" name="agency_id" value="{{ $agency }}">
          @endif
          @if($business)
            <input type="hidden" name="business_id" value="{{ $business }}">
          @endif
      
    
      @include('listing::listing.edit.location_price')
      @include('listing::listing.edit.listing_details')
      @include('listing::listing.edit.associates')
      @include('listing::listing.modals.edit_modals')

   

    </div>
    
    <div class="d-flex justify-content-start">
    
        <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
</form>
    
    
    @push('js')
    
    <script>
        function editShowRentDiv(id) {
            console.log(id);
            if($('.rent-radio-'+id)[0].checked){
                $('#rent_div_'+id)[0].style.display = "block";
                document.getElementById(`rent-sale-label-${id}`).innerHTML = "Rent";
            }else {
                document.getElementById(`rent-sale-label-${id}`).innerHTML = "Sale";
                $('#rent_div_'+id)[0].style.display = "none";
            }
        }
        function editShowSubRentDiv(id) {
        
            if($('.sub-rent-checkbox-'+id)[0].checked){
                $('#sub_rent_div_'+id)[0].style.display = "block";
            }else {
                $('#sub_rent_div_'+id)[0].style.display = "none";
            }
                
        }
        
        function editShowFurnishedQuestion(id){
            question_status = $('.listing_type_'+id).find(':selected').data('furnished');
            if(question_status == 'yes'){
                $('.furnished_question_'+id).removeClass('d-none');
            }else{
                $('.furnished_question_'+id).addClass('d-none');
            }
        
        }

    </script>


 
    @endpush