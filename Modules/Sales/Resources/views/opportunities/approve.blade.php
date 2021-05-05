
<form  action="{{ url('sales/approve-opportunity-to-client') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
    

            <input type="hidden" value="{{ $opportunity->id }}" name="opportunity_id">
            <input type="hidden" value="{{ $opportunity->client->id }}" name="client_id">
    
  
        <div class="col-md-6">
    

        
       
            <div class="form-group">

                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.name')</lable>
                <p class="h5">{{ ucfirst($opportunity->client->name )}}</p>
        
             </div>

             <div class="form-group">


                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date_of_birth')</lable>
                <p class="h5">{{ ucfirst($opportunity->client->date_of_birth )}}</p>

    
            </div>



            @if($opportunity->client->national_id != null)
                <div class="form-group">


                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.national_id')</lable>
                    <p class="h5">{{ ucfirst($opportunity->client->national_id )}}</p>

                </div>
            @endif

            @if($opportunity->client->passport != null)

                <div class="form-group">

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport')</lable>
                    <p class="h5">{{ ucfirst($opportunity->client->passport )}}</p>

                 
                </div>
            @endif
    
    
            @if($opportunity->client->passport_expiration_date != null)

            <div class="form-group ">


                
                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport_expiration_date')</lable>
                <p class="h5">{{ ucfirst($opportunity->client->passport_expiration_date )}}</p>

                
            </div>

            @endif
    
        
    

             
            <div class="form-group">



                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email1')</lable>
                <p class="h5">{{ ucfirst($opportunity->client->email1 )}}</p>

            </div>


            
    
 
 
 
    
        
        </div>
    
    
    
        
    
            
    
     
    
    <div class="col-md-6">
  

   

                 
        <div class="form-group">     
            
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone1')</lable>
            <p class="h5">{{ ucfirst($opportunity->client->phone1 )}}</p>

        </div>



                 


        <div class="form-group">


             
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.country')</lable>
            <p class="h5">{{ ucfirst($opportunity->client->country)}}</p>

         
        </div>


        <div class="form form-group">


            
             
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.language')</lable>
            <p class="h5">{{ ucfirst($opportunity->client->language )}}</p>


{{-- 
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.language')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

            <select required  style="" class="form-control  select2" name="client_language_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.language')" required>
                <option value="" class="font-weight-medium text-muted"></option>
                @forelse($languages as $language)
                    <option {{ old("client_language_{$opportunity->id}") == $language->code ? 'selected' : ''}}  value="{{ $language->code}}">{{ ucfirst($language->name) }}</option>
                @empty

                @endforelse

            </select> --}}
        </div>
         

        <div class="form form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.language')</lable>
            <p class="h5">{{ ucfirst($opportunity->client->currency )}}</p>



        </div>



 



    
    </div>
    
 

    
    



    </div>
{{--@if($opportunity->client->contracts)--}}
    {{--<div class="row">--}}


                        {{----}}
                    {{--<div class="col-md-12">--}}
                    {{----}}
                {{----}}
                            {{--<label class="text-muted pr-2  h5 font-weight-medium" style="flex:2">@lang('sales.contract_type')</label>--}}

                            {{--<p class="h5">{{ ucfirst($opportunity->client->contracts->first()->contract_type) }}</p>--}}
                        {{----}}
                {{----}}
                    {{--</div>--}}


                    {{--<div class="col-md-6">--}}

                        {{----}}
                        {{--<div class="form-group">       --}}
                            {{--<lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord')</lable> --}}
                            {{--<p class="h5">{{ ucfirst($opportunity->client->contracts->first()->landlord_name) }}</p>--}}
                            {{----}}
                        {{--</div>--}}
                        {{--<div class="form-group">  --}}
                            {{----}}
                            {{--<lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_national_id')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->landlord_national_id}}</p>--}}
                                                {{----}}
                        {{--</div>--}}
                        {{--<div class="form-group">   --}}
                            {{----}}
                            {{--<lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_address')</lable> --}}
                            {{--<p class="h5">{{ ucfirst($opportunity->client->contracts->first()->landlord_address)}}</p>--}}
                                {{----}}
                        {{--</div>--}}
                    {{--</div>--}}
            {{----}}


                {{--<div class="col-md-6">--}}

                        {{--<div class="form-group">  --}}
                            {{----}}
                            {{--<lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer')</lable> --}}
                            {{--<p class="h5">{{ ucfirst($opportunity->client->contracts->first()->customer_name)}}</p>--}}
                            {{----}}

                        {{--</div>--}}



                        {{--<div class="form-group"> --}}
                            {{----}}
                            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_national_id')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->customer_national_id}}</p>--}}
                            {{----}}
                        {{--</div>--}}


                        {{--<div class="form-group">  --}}
                            {{----}}
                                    {{----}}
                            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_address')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->customer_address}}</p>--}}
                        {{----}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.date')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->start_date}}</p>--}}
                        {{----}}
                        {{----}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                    {{----}}
                        {{--<div class="form-group end_date_{{ $opportunity->id }} ">--}}

                            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.end_date')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->end_date}}</p>--}}
                        {{----}}
                        {{--</div>--}}

                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.listing_address')</lable> --}}
                        {{--<p class="h5">{{ $opportunity->client->contracts->first()->address}}</p>--}}
                    {{----}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--@if($opportunity->client->contracts->first()->notes != null)--}}
                        {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.note')</lable> --}}
                        {{--<p class="h5">{{ $opportunity->client->contracts->first()->notes}}</p>--}}
                        {{----}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                    {{----}}
                        {{--<div class="form-group">--}}



                            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.contract_amount')</lable> --}}
                            {{--<p class="h5">{{ $opportunity->client->contracts->first()->amount}}</p>--}}
            {{----}}
                        {{--</div>--}}

                    {{--</div>--}}

  {{----}}

         {{--</div>--}}

{{--<div class="row">--}}
                     {{----}}
        {{--<div class="col-md-12">--}}

            {{----}}
        {{----}}

        {{--@if($opportunity->client->contracts->first()->has_recurring == 'yes')--}}
                                    {{----}}
            {{--<div class="card-box">--}}
                {{--<h4 class="header-title">@lang('sales.recurrings')</h4>--}}
        {{----}}

            {{----}}
                {{--<div class="table-responsive">--}}
            {{----}}
                        {{--<table class="table table-bordered toggle-circle mb-0">--}}


                            {{--<thead class="thead-light">--}}
                                {{--<th>#</th>--}}
                                {{--<th>@lang('sales.amount')</th>--}}
                                {{--<th>@lang('sales.date')</th>--}}
                    {{----}}
                            {{--</thead>--}}
                            {{--<tbody>--}}


                                        {{----}}
                                {{--@if($opportunity->client->contracts->first()->recurrings)--}}


                                {{--@foreach($opportunity->client->contracts->first()->recurrings as $recurring)--}}

                                    {{--<tr>--}}
                                        {{--<td>{{ $loop->index + 1 }}</td>--}}
                                        {{--<td>{{ $recurring->amount }}</td>--}}
                                        {{--<td>{{ $recurring->date }}</td>--}}
                                {{----}}

                                        {{-- <img src="{{ asset('upload/contracts/'.$opportunity->client->id.'/'.$document->document) }}" alt="{{ $document->name }}">   --}}

                                    {{--</tr>--}}
                                    {{----}}
                {{----}}
                                {{--@endforeach           --}}
                                    {{----}}

                    {{----}}
                                {{--@else   --}}
                    {{----}}
                                {{--@lang('sales.no_records')--}}
                    {{----}}
                                {{--@endif--}}
                            {{--</tbody>--}}
                        {{--</table>--}}



                {{--</div> <!-- end .table-responsive-->--}}
            {{--</div> <!-- end card-box -->--}}

            {{--@else--}}
            {{--<lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.recurrings')</lable> --}}
            {{--<p class="h5 mb-3">@lang('sales.contract_has_no_recurrings')</p>--}}

            {{--@endif--}}

            {{----}}
     {{--</div>--}}

     {{----}}
    {{----}}
       {{--<div class="col-md-8 ">--}}
    {{----}}


        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<div class="dropdown float-right">--}}
                 {{----}}
            {{----}}
                {{--</div> <!-- end dropdown-->--}}

                {{--<h5 class="card-title font-16 mb-3">@lang('sales.attachments')</h5>--}}

                {{--<!-- file preview template -->--}}
                {{--<div class="d-none" id="uploadPreviewTemplate">--}}
                    {{--<div class="card mt-1 mb-0 shadow-none border">--}}
                        {{--<div class="p-2">--}}
                            {{--<div class="row align-items-center">--}}
                                {{--<div class="col-auto">--}}
                                    {{--<img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">--}}
                                {{--</div>--}}
                                {{--<div class="col pl-0">--}}
                                    {{--<a href="javascript:void(0);" class="text-muted font-weight-medium" data-dz-name></a>--}}
                                    {{--<p class="mb-0" data-dz-size></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-auto">--}}
                                    {{--<!-- Button -->--}}
                                    {{--<a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>--}}
                                        {{--<i class="dripicons-cross"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- end file preview template -->--}}
                    {{----}}
                {{--@if($opportunity->client->contracts->first()->documents)--}}
    {{----}}
    {{----}}
                {{--@foreach($opportunity->client->contracts->first()->documents as $document)--}}



                {{----}}
                {{--<div class="card mb-1 shadow-none border">--}}
                    {{--<div class="p-2">--}}
                        {{--<div class="row align-items-center">--}}
                            {{--<div class="col-auto">--}}
                                {{--<div class="avatar-sm">--}}
                                    {{--<span class="avatar-title badge-soft-primary text-primary rounded">--}}
                                        {{--{{ ucfirst($document->extension) }} --}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col pl-0">--}}
                                {{--<a href="javascript:void(0);" class="text-muted font-weight-medium">{{ $document->name }}</a>--}}
                                {{-- <p class="mb-0 font-12">2.3 MB</p> --}}
                            {{--</div>--}}
                            {{--<div class="col-auto">--}}
                                {{--<!-- Button -->--}}




                                {{--<a target="_blank" href="{{ asset('upload/contracts/'.$opportunity->client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">--}}
                                    {{--<i class="fa fa-eye"></i>--}}
                                {{--</a>--}}

                                {{--<a download href="{{ asset('upload/contracts/'.$opportunity->client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">--}}
                                    {{--<i class="dripicons-download"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--@endforeach           --}}
                    {{----}}

    {{----}}
                {{--@else   --}}
    {{----}}
                {{--@lang('sales.no_records')--}}
    {{----}}
                {{--@endif--}}




            {{--</div>--}}
        {{--</div>--}}
    {{----}}
            {{--</div>--}}
    {{--</div>--}}
    {{----}}



    {{----}}
    {{--@endif--}}

    
    </div>
    </div>
    
    <div class="d-flex justify-content-start">
    
        <button onclick="event.preventDefault();hide_approve_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit" onclick="return confirm('are you sure');" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.approve')
        </button>
        <button onclick="event.preventDefault();toggle_hold_form_({{ $opportunity->id }})"  class="btn toggle_hold_button_{{ $opportunity->id }}  btn-info waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.hold')
        </button>


        <button onclick="event.preventDefault();toggle_reject_form({{ $opportunity->id }})"  class="btn toggle_reject_button_{{ $opportunity->id }}  btn-danger waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.reject')
        </button>



    </div>

    </form>


    <div class=" toggle_hold_form_{{ $opportunity->id }} d-none">
    
    <form action="{{ url('sales/client-hold') }}" method="post" data-parsley-validate="">
        <div class="row">
            @csrf

            <input type="hidden" name="hold_opportunity_id" value="{{ $opportunity->id }}">
            <input type="hidden" name="hold_client_id" value="{{ $opportunity->client->id }}">
                <div class="col-md-12 mt-2 mb-2">
            

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reason')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
                
                    <textarea required class="form-control" name="hold_reason_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("hold_reason_{$opportunity->id}") }}</textarea>
                </div>

        

            
                <div class="col-md-12">
                    <button onclick="event.preventDefault();toggle_hold_form_({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
                    @lang('sales.cancel')
                    </button>
                    <button type="submit" class="btn  btn-info waves-effect waves-light ml-2">
                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.confirm')
                    </button>
                </div>

            </div>
            </form>

</div>


<div class=" toggle_reject_form_{{ $opportunity->id }} d-none">
    
    <form action="{{ url('sales/client-reject') }}" method="post" data-parsley-validate="">
        <div class="row">
            @csrf
            <input  type="hidden" name="opportunity_id" value="{{ $opportunity->id }}">
            <input  type="hidden" name="client_id" value="{{ $opportunity->client->id }}">
                <div class="col-md-12 mt-2 mb-2">
            

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reason')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
                
                    <textarea required class="form-control" name="reject_reason_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("hold_reason_{$opportunity->id}") }}</textarea>
                </div>

        

            
                <div class="col-md-12">
                    <button onclick="event.preventDefault();toggle_reject_form({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
                    @lang('sales.cancel')
                    </button>
                    <button type="submit" class="btn  btn-danger waves-effect waves-light ml-2">
                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.confirm')
                    </button>
                </div>

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

function toggle_additional_data_(id){
        var lead_div = $('.toggled_additional_'+id);
        if(lead_div.hasClass('d-none')){

            lead_div.removeClass('d-none');

        } else {
            lead_div.addClass('d-none');

        }
        }


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
       var html ='<div class="col-md-12 all_recurrings_'+id+'"><i onclick="add_single_recurring('+ $('#client_recurring_'+id).val() +','+id+')" style="cursor:pointer" class=" fa fa-plus float-right add_recurring_input"></i><div/>';

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


function add_single_recurring(i,id){
        
        // $('.add_recurring_input');

        // var allInputs = true,

        if(confirm('Do you Want To add More Recurring ?') == false){
            return false;
        }
            inputs = $('.recurring_row_'+id).find("input");

           var next_input = inputs.length + 1 ;


       var html = '';        
        html += '<div class="col-md-1 remove_recurring_'+id+' remove_single_'+id+'_'+ next_input +'"><i onclick="remove_single_recurring('+ next_input +','+id+')" style="cursor: pointer" class="fa fa-trash mt-2"> </i> </div>'
        html += '<div class="form-group remove_recurring_'+id+' col-md-5  remove_single_'+id+'_'+ next_input +'">';
        html += '<input type="text" class="form-control mb-2 recurring_'+id+'_'+(i+1)+'  remove_single_'+id+'_'+ i +'"  name="recurrings_amount_'+id+'['+i+']"   required />'    
        html += '<input type="date" class="form-control  recurring_'+id+'_'+(i+1)+'  remove_single_'+id+'_'+ i +'"  name="recurrings_dates_'+id+'['+i+']"   required />' 
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
   function toggle_hold_form_(id){

        var lead_div = $('.toggle_hold_form_'+id);
        var hold_button = $('.toggle_hold_button_'+id);
        var reject_button = $('.toggle_reject_button_'+id);

        if(lead_div.hasClass('d-none')){

            lead_div.removeClass('d-none');

        }
        
        else {
            lead_div.addClass('d-none');


        }

        if(hold_button.hasClass('d-none')){

            hold_button.removeClass('d-none');

        }

        else {
            hold_button.addClass('d-none');

        }
        }



        function toggle_reject_form(id){

        var lead_div = $('.toggle_reject_form_'+id);
        var reject_button = $('.toggle_reject_button_'+id);
        var hold_button = $('.toggle_hold_button_'+id);
        if(lead_div.hasClass('d-none')){

            lead_div.removeClass('d-none');


        }

        else {
            lead_div.addClass('d-none');


        }

        if(reject_button.hasClass('d-none')){

            reject_button.removeClass('d-none');

        }

        else {
            reject_button.addClass('d-none');

        }
        }


</script>
  @endpush