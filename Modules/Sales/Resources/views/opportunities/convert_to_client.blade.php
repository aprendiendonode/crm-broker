@if($opportunity->converting_approval == 'rejected') 
<div class="row">
    <div class="col-md-12 mt-2 mb-1">
            
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reject_reason')</lable>

        <textarea required class="form-control" disabled  cols="30" rows="4">{{ $opportunity->reject_reason }}</textarea>
    </div>
    <div class="col-md-12 mt-2 ">
            
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.rejected_by')</lable>

        <p class="h5">{{ $opportunity->rejectedBy ? $opportunity->rejectedBy->{'name_'.app()->getLocale()} : ''  }}</p>
    </div>
    <div class="col-md-12 mt-2 mb-2">
            
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reject_date')</lable>

        <p class="h5">{{ $opportunity->reject_date }}</p>
    </div>

</div>
<div class="col-md-12 mt-2 mb-2">
    
    <p  onclick="event.preventDefault();toggle_rejection_form({{ $opportunity->id }})" class="font-weight-medium cursor-pointer">@lang('sales.resubmit_approval')</p>
</div>
@endif

<div class="rejection_form_{{ $opportunity->id }} @if($opportunity->converting_approval == 'rejected') d-none @endif">

<form  action="{{ url('sales/convert-to-client') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
    

            <input type="hidden" value="{{ $opportunity->id }}" name="opportunity_id">
    
  
        <div class="col-md-6">
    

        
       
            <div class="form-group">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.first_name')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                <input type="text" class="form-control"  name="client_first_name_{{ $opportunity->id }}" required  value="{{ old('client_first_name_'.$opportunity->id,$opportunity->first_name) }}" placeholder="@lang('sales.name')" >
        
             </div>
            <div class="form-group">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.sec_name')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                <input type="text" class="form-control"  name="client_sec_name_{{ $opportunity->id }}" required  value="{{ old('client_sec_name_'.$opportunity->id,$opportunity->sec_name) }}" placeholder="@lang('sales.name')" >
        
             </div>

             <div class="form-group">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date_of_birth')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
    
                <input  required type="text" name="client_date_of_birth_{{ $opportunity->id }}" value="{{ old("client_date_of_birth_{$opportunity->id}",$opportunity->date_of_birth) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
            </div>




            <div class="form-group">
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.national_id')</lable>
    
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"  name="client_national_id_{{ $opportunity->id }}"  value="{{ old("client_national_id_{$opportunity->id}",$opportunity->national_id) }}" placeholder="@lang('sales.national_id')">
            </div>
            <div class="form-group">
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport')</lable>
    
                <input type="text" class="form-control"  name="client_passport_{{ $opportunity->id }}"  value="{{ old("client_passport_{$opportunity->id}",$opportunity->passport) }}" placeholder="@lang('sales.passport')">
            </div>
    
    
    
            <div class="form-group ">
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport_expiration_date')</lable>
    
                <input type="text" name="client_passport_expiration_date_{{ $opportunity->id }}" value="{{ old("client_passport_expiration_date_{$opportunity->id}",$opportunity->passport_expiration_date) }}"    class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
            </div>
    
        
    

             
            <div class="form-group">
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                <input type="email" class="form-control" required name="client_email1_{{ $opportunity->id }}"  value="{{ old("client_email1_{$opportunity->id}",$opportunity->email1) }}" placeholder="@lang('sales.email')">
            </div>


            
    
 
 
 
    
        
        </div>
    
    
    
        
    
            
    
     
    
    <div class="col-md-6">
  

   

                 
        <div class="form-group">       
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone1')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone1')" type="text" class="form-control" name="client_phone1_{{ $opportunity->id }}"   value="{{ old("client_phone1_{$opportunity->id}",$opportunity->phone1) }}" placeholder="@lang('sales.phone1')" required>
            
        </div>



                 


        {{-- <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.country')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

            <select required   id="convert_country_{{ $opportunity->id }}" class="form-control select2 " name="client_country_{{ $opportunity->id }}"
                    data-toggle="select2" data-placeholder="@lang('sales.country')">
                <option value=""></option>
                @foreach($countries as $country)
                    <option value="{{$country->value}}" {{ old("client_country_{$opportunity->id}",$opportunity->country) == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
                @endforeach
    
            </select>
        </div>
 --}}

                     
 

    {{--     <div class="form form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.language')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

            <select required  style="" class="form-control  select2" name="client_language_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.language')" required>
                <option value="" class="font-weight-medium text-muted"></option>
                @forelse($languages as $language)
                    <option {{ old("client_language_{$opportunity->id}") == $language->code ? 'selected' : ''}}  value="{{ $language->code}}">{{ ucfirst($language->name) }}</option>
                @empty

                @endforelse

            </select>
        </div>
          --}}

        {{-- <div class="form form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.currency')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

            <select required  style="" class="form-control  select2" name="client_currency_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.currency')" required>
                    <option value="" class="font-weight-medium text-muted"></option>
                @forelse($currencies as $currency)
                    <option  @if(old('client_currency_'.$opportunity->id) == $currency->code ) selected @endif value="{{ $currency->code}}">{{ $currency->code .' ( '.$currency->name .' )'  }}</option>
                @empty
                @endforelse

            </select>
        </div> --}}
    </div>
    

    </div>

   {{--  <div class="row">
   
        <div class="col-md-12">

            <div class="form-group d-flex  mt-3">
    
                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.contract_type')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" onchange="contract_type({{ $opportunity->id }},'rent')" id="inlineRadio1_{{ $opportunity->id }}" value="rent" class="contract_type" name="client_contract_type_{{ $opportunity->id }}"  checked >
                        <label for="inlineRadio1_{{ $opportunity->id }}"> @lang('sales.rent') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" onchange="contract_type({{ $opportunity->id }},'sale')"  id="inlineRadio2_{{ $opportunity->id }}" class="contract_type" value="sale" name="client_contract_type_{{ $opportunity->id }}"   >
                        <label for="inlineRadio2_{{ $opportunity->id }}"> @lang('sales.sale') </label>
                    </div>
                 </div>
        
            </div>
        </div>


        <div class="col-md-6">

            
            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
        
                <input required   type="text" class="form-control landlord_name" name="client_landlord_{{ $opportunity->id }}"   value="{{ old("client_landlord_{$opportunity->id}") }}" placeholder="@lang('sales.landlord')" >
                
            </div>
            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_national_id')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
    
                <input data-plugin="tippy" required  data-tippy-placement="top-start" pattern="/^([0-9\s\-\+\(\)]*)$/" title="@lang('sales.landlord_national_id')" type="text" class="form-control" name="client_landlord_national_id_{{ $opportunity->id }}"   value="{{ old("client_landlord_national_id_{$opportunity->id}",) }}" placeholder="@lang('sales.landlord_national_id')" required>
                
            </div>
            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" > @lang('sales.landlord_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
    
                    <textarea class="form-control" required name="client_landlord_address_{{ $opportunity->id }}" id="" cols="30" rows="4">{{ old('client_landlord_address_'.$opportunity->id) }}</textarea>               
            </div>
        </div>
 
       <div class="col-md-6">

            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
                
                <input   type="text" class="form-control customer_name" name="client_customer_{{ $opportunity->id }}"   value="{{ old("client_customer_{$opportunity->id}",) }}" placeholder="@lang('sales.customer')" required>
                
            </div>

            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_national_id')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                <input  pattern="/^([0-9\s\-\+\(\)]*)$/" type="text" class="form-control" name="client_customer_national_id_{{ $opportunity->id }}"   value="{{ old("client_landlord_national_id_{$opportunity->id}",) }}" placeholder="@lang('sales.customer_national_id')" required>
                
            </div>


            <div class="form-group">      
                <lable class="text-muted pr-2 font-weight-medium mt-1" > @lang('sales.customer_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
    
                    <textarea class="form-control" required name="client_customer_address_{{ $opportunity->id }}"  cols="30" rows="4">{{ old('client_customer_address_'.$opportunity->id) }}</textarea>               
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
        
                <input type="text" required name="client_date_{{ $opportunity->id }}" value="{{ old("client_date_{$opportunity->id}",$opportunity->date) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date')">
            </div>

        </div>
        <div class="col-md-6">
        
            <div class="form-group end_date_{{ $opportunity->id }} ">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.end_date')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                <input type="text"  name="client_end_date_{{ $opportunity->id }}" value="{{ old("client_end_date_{$opportunity->id}",$opportunity->end_date) }}" class="form-control basic-datepicker" placeholder="@lang('sales.end_date')">
            </div>

        </div>

        <div class="col-md-6">
        

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.listing_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
            
                <textarea required class="form-control" name="client_address_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("client_address_{$opportunity->id}") }}</textarea>
        </div>
        <div class="col-md-6">
       

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.note')</lable>
            
                <textarea class="form-control" name="client_note_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("client_note_{$opportunity->id}") }}</textarea>
        </div>
        <div class="col-md-6">
        
            <div class="form-group">
                <label class="text-muted pr-2 font-weight-medium" for="recurring">{{ trans('sales.contract_amount') }}<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>
                <input required class="form-control "  placeholder="@lang('sales.contract_amount')" onkeypress="generate(event,{{ $opportunity->id }})" type="text" name="client_amount_{{$opportunity->id }}" id="client_amount_{{ $opportunity->id }}" value="{{ old('client_amount_'.$opportunity->id ) }}" required>
    
            </div>

         </div>

         <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted"
                       for="image">@lang('sales.contract_documents')</label>
                <input required multiple type="file" name="client_contract_documents_{{ $opportunity->id }}[]" data-plugins="dropify" id="image"
                       data-default-file="" />
          </div>

        

         </div>


                     
        <div class="col-md-12">
            <div class="form-group d-flex  mt-3">
    
                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.recurring')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" onchange="recurring({{ $opportunity->id }},'yes')" id="recurringyes_{{ $opportunity->id }}" value="yes" class="recurring" name="client_recurring_type_{{ $opportunity->id }}" >
                        <label for="recurringyes_{{ $opportunity->id }}"> @lang('sales.yes') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" onchange="recurring({{ $opportunity->id }},'no')"  id="recurringno_{{ $opportunity->id }}" class="recurring" value="no" name="client_recurring_type_{{ $opportunity->id }}" checked>
                        <label for="recurringno_{{ $opportunity->id }}"> @lang('sales.no') </label>
                    </div>
                </div>
        
            </div>
        </div>
        <div class="col-md-6 d-none recurrings_type_{{ $opportunity->id }}">
      
            <div class="form-group">
                <label class="text-muted pr-2 font-weight-medium recurring-label_{{ $opportunity->id }}" for="recurring">{{ trans('sales.contract_recurring') }}</label>
                <input class="form-control " placeholder="@lang('sales.type_recurring_number_and_press_enter')" onkeypress="generate(event,{{ $opportunity->id }})" type="text" name="client_recurring_{{$opportunity->id }}" id="client_recurring_{{ $opportunity->id }}" value="{{ old('client_recurring_'.$opportunity->id ) }}" >
 
            </div>

        </div>

          <div class="col-md-12 ">

            <div class="row recurring_row_{{ $opportunity->id }}">

         </div>
    

        </div>
    



    </div>
  --}}
 
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_client_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.convert')
        </button>
    </div>
    
    </form>

</div>

    
  @push('js')
<script>

$(document).ready(function() {
  $(window).keypress(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});



function generate(event,id){
            
            if(event.keyCode != 13){
                return false
            }
                if($('#client_recurring_'+id).val() == '' || $('#client_recurring_'+id).val() == 0){
                alert('No recurring Entered')
                return false;
                }
                
                $('#client_recurring_'+id).prop('type','hidden')
                $('.recurring-label_'+id).addClass('d-none');
                $('.remove_recurring_'+id).remove();
                var html ='<div class="col-md-12 all_recurrings_'+id+'"><i onclick="add_single_recurring('+id+')" style="cursor:pointer" class=" fa fa-plus float-right add_recurring_input"></i><div/>';

                html += '<div class="row recurring_single_row_'+id+'">'

                for(var i =0; i < $('#client_recurring_'+id).val(); i++){

                    
                    // html += '<div class="form-group remove_recurring  col-md-1" >'+ (i + 1) +' - </div>'
                    html += ' <div class="col-md-1 remove_recurring_'+id+' remove_single_'+id+'_'+ i +' "><i class="fa fa-trash mt-2" style="cursor: pointer" onclick="remove_single_recurring('+ i +','+id+')" > </i> </div>'
                    html += '<div class="form-group remove_recurring_'+id+' col-md-5  remove_single_'+id+'_'+ i +'">';
                    html += '<input type="text" class="form-control mb-2 recurring_'+id+'_'+(i+1)+'  remove_single_'+id+'_'+ i +'"  name="recurrings_amount_'+id+'['+i+']"   required />'    
                    html += '<input type="date" class="form-control  recurring_'+id+'_'+(i+1)+'  remove_single_'+id+'_'+ i +'"  name="recurrings_dates_'+id+'['+i+']"   required />'    
                    html += '</div><div class="col-md-6 remove_recurring_'+id+'  remove_single_'+id+'_'+ i +'"></div>'   
                    
                    
              
       }

        html += '</div>'

    
        $('.recurring_row_'+id).append( html)
        
    
        $('.recurring_1').focus();

}


function add_single_recurring(id){
        
  

        if(confirm('Do you Want To add More Recurring ?') == false){
            return false;
        }
            inputs = $('.recurring_row_'+id).find("input[type=text]");

           var next_input = inputs.length + 1 ;


       var html = '';        
        html += '<div class="col-md-1 remove_recurring_'+id+' remove_single_'+id+'_'+ next_input +'"><i onclick="remove_single_recurring('+ next_input +','+id+')" style="cursor: pointer" class="fa fa-trash mt-2"> </i> </div>'
        html += '<div class="form-group remove_recurring_'+id+' col-md-5  remove_single_'+id+'_'+ next_input +'">';
        html += '<input type="text" class="form-control mb-2 recurring_'+id+'_'+next_input+'  remove_single_'+id+'_'+ next_input +'"  name="recurrings_amount_'+id+'['+next_input+']"   required />'    
        html += '<input type="date" class="form-control  recurring_'+id+'_'+next_input+'  remove_single_'+id+'_'+ next_input +'"  name="recurrings_dates_'+id+'['+next_input+']"   required />' 
        html += '</div><div class="col-md-6 remove_recurring_'+id+'  remove_single_'+id+'_'+ next_input +' "></div>'    


        $('.recurring_single_row_'+id).append( html)
          
        
        $('.recurring_'+(next_input)).focus();
    }


        
    function remove_single_recurring(i,id){


        if(confirm('Are You Sure ?') == false){
            return false;
        }

        $('.remove_single_'+id+'_'+i).remove();


       
    }



   function contract_type(id,type){

        if(type == "rent"){

            $('.end_date_'+id).removeClass('d-none');

        }else{
            $('.end_date_'+id).addClass('d-none');

        }
   }

   function recurring(id,type){
   
        if(type == "yes"){
          
            $('.recurrings_type_'+id).removeClass('d-none');

        }else{
            $('.recurrings_type_'+id).addClass('d-none');
            $('.all_recurrings_'+id).remove();

            $('#client_recurring_'+id).val('')
            $('#client_recurring_'+id).prop('type','text')

          
        }
   }


   function toggle_rejection_form(id){

    var lead_div = $('.rejection_form_'+id);
        if(lead_div.hasClass('d-none')){

            lead_div.removeClass('d-none');

        } else {
            lead_div.addClass('d-none');

        }
}
</script>
  @endpush