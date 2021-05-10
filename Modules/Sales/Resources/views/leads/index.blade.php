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
           

         @include('sales::leads.table')

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


</script>


<script>




ClassicEditor
    .create(document.querySelector('#note'))
    .then()
    .catch(error => {

    });




</script>



@endpush
