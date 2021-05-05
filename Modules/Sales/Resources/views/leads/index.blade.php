@extends('layouts.master')

@section('title',trans('sales.leads'))
@section('css')


<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">
{{-- <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css"> --}}
<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">




<style>

    .toggle.android { border-radius: 0px;}
    .toggle.android .toggle-handle { border-radius: 0px; }
  
      .custom-toggle .btn {
          padding:0 !important;
      }
      .custom-toggle .toggle.btn {
          min-height: 26px;                                
          min-width: 46px;
      }
</style>

@endsection
@section('content')
<div class="content p-3">



            <div class="d-flex justify-content-between mb-3">
               <h4>
                   @lang('sales.manage_leads')
               </h4>

                <a href="#" class="list-link active">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('sales.leads')</div>
                </a>
                @if(owner())
                    <a href="{{ url('sales/opportunities/'.request('agency')) }}" class="list-link">
                        <i class="fas fa-save mr-1"></i>
                        <div>@lang('sales.opportunity')</div>
                    </a>
                @elseif(moderator())
                    <a href="{{ url('sales/opportunities/'.request('agency')) }}" class="list-link">
                        <i class="fas fa-save mr-1"></i>
                        <div>@lang('sales.opportunity')</div>
                    </a>
                @else
                    <a href="{{ url('sales/opportunities/'.auth()->user()->agency_id) }}" class="list-link">
                        <i class="fas fa-save mr-1"></i>
                        <div>@lang('sales.opportunity')</div>
                    </a>
                @endif


               @can('add_lead')
                    {{-- <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                        <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_leads')
                    </button> --}}

                    {{-- check div --}}
                    <button onclick="show_check_div()" type="button" class="btn btn-info waves-effect waves-light">
                        <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_leads')
                    </button>
                @endcan 
            </div>

            @can('add_lead')

                <div class="mb-2 check_lead "  style="display: none;opacity:0;transition:0.7s">
                    @include('sales::leads.check_before_create')
                </div>

                <div class="mb-2 add_lead " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
                    @include('sales::leads.create')
                </div>
            @endcan

          
         <button class="btn btn-primary mb-2" onclick="show_filter()">@lang('sales.filter') <i class="fa fa-search"></i></button>   
         <a class="btn btn-outline-primary mb-2" href="{{ url('sales/leads/'.request('agency')) }}">@lang('sales.reset_filters')</a>
         
         <div class="mb-2 filter_lead " @if( !request()->has('filter_name')) style="display: none;opacity:0;transition:0.7s" @endif>

            @include('sales::leads.filter')

         </div>    
           

            <div class="table-responsive">
                <table  class="table table-bordered toggle-circle mb-0">
                    <thead>
                    <tr>
                        <th>@lang('sales.name') </th>
                        <th > @lang('sales.email') </th>
                      
                        <th > @lang('sales.phone') </th>
                        <th > @lang('sales.lead_source') </th>
                        <th > @lang('sales.lead_type') </th>
                        <th > @lang('sales.lead_qualifications') </th>
                        <th > @lang('sales.controlls') </th>
                      
                    </tr>
                    </thead>
                    <tbody>

                                @forelse($leads as $lead)

                                @php

                                $phone_number = '';
                                if($lead->phone1){
                                    $phone_number = $lead->phone1;
                                } elseif($lead->phone2){
                                    $phone_number = $lead->phone2;
                                } elseif($lead->phone3){
                                    $phone_number = $lead->phone3;
                                }else{
                                    $phone_number = $lead->phone4;
                                }


                                $email = '';
                                if($lead->email1){
                                    $email = $lead->email1;
                                } elseif($lead->email2){
                                    $email = $lead->email2;
                                }else{
                                    $email = $lead->email3;
                                }

                                $phone_number = ltrim($phone_number, '0');
                            
                                $phone_information = $countries;
                                $flag = '';
                                $long_name = '';
                                $time = '';
                                foreach ($phone_information as $single_phone) {
                                    if ((strlen($single_phone->calling_code) + 1) == strlen($single_phone->phone_code)) {
                                        if (substr($phone_number, 0, strlen($single_phone->calling_code)) === $single_phone->calling_code || substr($phone_number, 0, strlen($single_phone->phone_code)) === $single_phone->phone_code) {
                                            $d = new DateTime("now", new DateTimeZone($single_phone->time_zone));
                                            $flag =  $single_phone->flag ;
                                            $long_name =  $single_phone->value ;
                                            $time =  $d->format("h:i A");
                                            break;
                                        }
                                    }
                                }

                            
                            @endphp
                        <tr>
                            <td>{{ ucfirst( $lead->full_name )}}</td>
                            <td>{{ $email}}</td>


                            <td> 
                                <div class="d-flex align-items-center">
                             
                                    @if($flag)
                                    <div style="width:30px" class="mr-1"><img class="w-100" src="{{ asset('images/flags/'.$flag) }}" alt=""></div>
                                    @endif
                                    <div>

                                        @php

                                   


                                        @endphp
                                        <div> {{ $phone_number }}</div>
                                        <div>{{ $long_name }}</div>
                                        @if($time)
                                        <small>{{ $time }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>


                                @can('edit_lead')
                                <select onchange="show_source_modal({{ $lead->id }})" id="modify_lead_source_{{ $lead->id }}" class=" selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                                    @forelse($lead_sources as $source)
                                    <option @if($lead->source_id == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                                    @empty
                
                                    @endforelse
                                </select>


                                @else


                                  {{ $lead->source ? $lead->source->{'name_'.app()->getLocale()} : '' }}


                                @endcan
                            
                            
                            </td>
                            <td>
                                
                                @can('edit_lead')
                                
                                <select onchange="show_type_modal({{ $lead->id }})" id="modify_lead_type_{{ $lead->id }}" class=" selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                                    @forelse($lead_types as $type)
                                     <option @if($lead->type_id == $type->id) selected @endif  value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                    @empty
                
                                    @endforelse
                                </select>

                                @else

                                {{ $lead->type ? $lead->type->{'name_'.app()->getLocale()} : '' }}

                                @endcan
                                                                
                                </td>
                            <td>

                                @can('edit_lead')

                                    
                                                              
                                <select onchange="show_qualification_modal({{ $lead->id }})" id="modify_lead_qualification_{{ $lead->id }}" class=" selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                                    @forelse($lead_qualifications as $qualification)
                                     <option @if($lead->qualification_id == $qualification->id) selected @endif  value="{{ $qualification->id}}">{{ $qualification->{'name_'.app()->getLocale()} }}</option>
                                    @empty
                
                                    @endforelse
                                </select>

        
                                    
                                @else
                                 {{ $lead->qualification ? $lead->qualification->{'name_'.app()->getLocale()} : '' }}
                                @endcan
                            </td>

                         
                            <td>
                                @include('sales::leads.controlls')
                               
                            </td>

                        
                            @include('sales::leads.modals')
  
                        </tr>
                        @can('edit_lead')

                            <tr  class="edit_lead_{{ $lead->id }}"  @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $lead->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                                <td colspan="8">

                                    @include('sales::leads.edit',['edited_lead' => $lead])

                                </td>
                            </tr>

                        @endcan



                        @can('edit_lead')

                            <tr  class="call_{{ $lead->id }}"  @if( (session()->has('open-call-tab') && session('open-call-tab') ==  $lead->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                                <td colspan="8">

                                    @include('sales::leads.calls')

                                </td>
                            </tr>

                         @endcan


                  

                          @can('assign_task_on_lead')

                                <tr  class="task_{{ $lead->id }}"  @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $lead->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                                    <td colspan="8">
        
                                        @include('sales::leads.tasks')
        
                                    </td>
                                </tr>
    
                           @endcan


                           @can('edit_lead')

                           <tr  class="opportunity_{{ $lead->id }}"  @if( (session()->has('open-opportunity-tab') && session('open-opportunity-tab') ==  $lead->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                               <td colspan="8">
   
                                   @include('sales::leads.convert_to_opportunity')
   
                               </td>
                           </tr>
 
                          @endcan
 

                        @empty
                        @endforelse



                    </tbody>
                </table>
                <div class="d-flex justify-content-between">

                    <div class="mt-2">
                        @if($pagination)
                        {{ $leads->links() }}
                        @endif
                    </div>
                    {{--@can('can_generate_reports')--}}
                        {{--<a --}}
                        {{--data-plugin="tippy" --}}
                        {{--data-tippy-placement="bottom-start" --}}
                        {{--title="@lang('sales.export_help')" href="{{ url('agency/export/'.request('agency')) }}" class="mt-2">@lang('sales.generate_report')--}}
                        {{--</a>--}}
                    {{--@endcan--}}
                </div>
            </div>
            
        </div>
        @can('manage_lead_setting') 
                  @include('sales::leads.settings_modals')
        @endcan

@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>


<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!-- Footable js -->
<script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

{{-- tooltip --}}
<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

<!-- Init js-->
<script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>


<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>




<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2-multiple').select2();
        $(".basic-datepicker").flatpickr();
        $(".clockpicker").clockpicker({
            twelvehour :false
        });

        if($('#nationality_id').val() != '') {

            toggleCountryData();
        }

        var leads = @json($leads);
        for (var i = 0; i < leads.data.length; i++) {

            ClassicEditor
                .create(document.querySelector('#edit_note_' + leads.data[i].id))
                .then()
                .catch(error => {

                });



                ClassicEditor
                .create(document.querySelector('#task_note_en_' + leads.data[i].id))
                .then()
                .catch(error => {

                });
                ClassicEditor
                .create(document.querySelector('#task_note_ar_' + leads.data[i].id ),{
                    language: 'ar'
                })
                .then()
                .catch(error => {

                });
        }
    })
</script>

<script>

    
    function  toggleCountryData(){
            var agency = @json($agency);
            var country = $('#nationality_id').val();


            
           
            var countries = @json($countries);
              filtered_country =  countries.filter(function(q){
                    return q.id == country
                      })

                      $('#country option')
                        .removeAttr('selected')
                        .filter('[value='+filtered_country[0].value+']')
                        .attr('selected', true)

                        $('#country').val(filtered_country[0].value).change();
            // $('#country option[value='+filtered_country[0].value+']').attr('selected','selected');


            $('.country_code').val(filtered_country[0].phone_code);            
            $('.timezone').val(filtered_country[0].time_zone);            
            $('.country_flag').val(filtered_country[0].flag);            
    
            
    
            }
    
    function  toggleEditCountryData(id){
            var agency = @json($agency);
            var country = $('#nationality_id_'+id).val();


            
           
            var countries = @json($countries);
              filtered_country =  countries.filter(function(q){
                    return q.id == country
                      })

                      $('#country_'+id +' option')
                        .removeAttr('selected')
                        .filter('[value='+filtered_country[0].value+']')
                        .attr('selected', true)

                        $('#country_'+id ).val(filtered_country[0].value).change();
            // $('#country option[value='+filtered_country[0].value+']').attr('selected','selected');


            $('.country_code').val(filtered_country[0].phone_code);            
            $('.timezone').val(filtered_country[0].time_zone);            
            $('.country_flag').val(filtered_country[0].flag);            
    
            
    
            }
    </script>

<script>




function  show_add_div(){
    hide_check_div();
 var  div = document.querySelector('.add_lead');
    if(div.style.display === 'none'){
        div.style.display = 'block';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }




    

function  show_filter(){
 var  div = document.querySelector('.filter_lead');
    if(div.style.display === 'none'){
        div.style.display = 'block';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    

  function  hide_add_div(){
    var  div = document.querySelector('.add_lead');
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }




    
function  show_check_div(){
    
    hide_add_div();
    

 var  div = document.querySelector('.check_lead');
    if(div.style.display === 'none'){
        div.style.display = 'block';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    

  function  hide_check_div(){
    var  div = document.querySelector('.check_lead');
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }



    
  function  show_edit_div(id){

   
    // hide_call_div(id)
   


    // hide_assign_div(id)
    // hide_task_div(id)

 var  div = document.querySelector('.edit_lead_'+id);
    if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }





    
  function  hide_edit_div(id){
    var  div = document.querySelector('.edit_lead_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }
 
    
  function  show_call_div(id){
    // hide_edit_div(id)
    // hide_assign_div(id)
    // hide_task_div(id)


    var  div = document.querySelector('.call_'+id);
        if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    function  hide_call_div(id){
    var  div = document.querySelector('.call_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }






      
  function  show_assign_div(id){
    // hide_edit_div(id)
    // hide_call_div(id)
    // hide_task_div(id)
    var  div = document.querySelector('.assign_'+id);
        if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    function  hide_assign_div(id){
    var  div = document.querySelector('.assign_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }





    
      
  function  show_task_div(id){
    // hide_edit_div(id)
    // hide_call_div(id)
    // hide_assign_div(id)
    var  div = document.querySelector('.task_'+id);
        if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    function  hide_task_div(id){
    var  div = document.querySelector('.task_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }




       
      
  function  show_opportunity_div(id){
    // hide_edit_div(id)
    // hide_call_div(id)
    // hide_assign_div(id)
    var  div = document.querySelector('.opportunity_'+id);
        if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    function  hide_opportunity_div(id){
    var  div = document.querySelector('.opportunity_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }
</script>


<script>




ClassicEditor
    .create(document.querySelector('#note'))
    .then()
    .catch(error => {

    });




</script>



@endpush
