@extends('layouts.master')

@section('title',trans('sales.opportunities'))
@section('css')
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
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
            @lang('sales.manage_opportunities')
        </h4>
        
        
        <a href="#" class="list-link active">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.opportunity')</div>
        </a>
        @if(owner())
        <a href="{{ url('sales/leads/'.request('agency')) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>
        @elseif(moderator())
        <a href="{{ url('sales/leads/'.request('agency')) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>
        @else
        <a href="{{ url('sales/leads/'.auth()->user()->agency_id) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>
        @endif
        
        @can('add_opportunity')
        {{-- <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
            <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_opportunities')
        </button> --}}
        
        {{-- check div --}}
        <button onclick="show_check_div()" type="button" class="btn btn-info waves-effect waves-light">
            <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_opportunities')
        </button>
        @endcan 
    </div>
    
    @can('add_opportunity')
    
    <div class="mb-2 check_opportunity "  style="display: none;opacity:0;transition:0.7s">
        @include('sales::opportunities.check_before_create')
    </div>
    
    <div class="mb-2 add_opportunity " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
        @include('sales::opportunities.create')
    </div>
    @endcan
    
    
    <button class="btn btn-primary mb-2" onclick="show_filter()">@lang('sales.filter') <i class="fa fa-search"></i></button>   
    <a class="btn btn-outline-primary mb-2" href="{{ url('sales/opportunities/'.request('agency')) }}">@lang('sales.reset_filters')</a>
    
    <div class="mb-2 filter_opportunity " @if(!request()->has('filter_name')) style="display: none;opacity:0;transition:0.7s" @endif>
        
        @include('sales::opportunities.filter')
        
    </div>    
    
    
    <div class="table-responsive">
        <table  class=" table table-bordered toggle-circle mb-0 opportunity-table">
            <thead>
                <tr>
                    <th>@lang('sales.name') </th>
                    <th > @lang('sales.email') </th>
                    
                    <th > @lang('sales.phone') </th>
                    <th data-hide="phone"> @lang('sales.lead_qualifications') </th>
                    <th data-hide="phone , tablet"> @lang('sales.converted_by') </th>
                    <th data-hide="phone, tablet"> @lang('sales.controlls') </th>
                    
                </tr>
            </thead>
            <tbody>
                
                @forelse($opportunities as $opportunity)
    
                    @php
                            $phone_number = '';
                            if($opportunity->phone1){
                                $phone_number = $opportunity->phone1;
                            } elseif($opportunity->phone2){
                                $phone_number = $opportunity->phone2;
                            } elseif($opportunity->phone3){
                                $phone_number = $opportunity->phone3;
                            }else{
                                $phone_number = $opportunity->phone4;
                            }
                            
                            
                            $email = '';
                            if($opportunity->email1){
                                $email = $opportunity->email1;
                            } elseif($opportunity->email2){
                                $email = $opportunity->email2;
                            }else{
                                $email = $opportunity->email3;
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
                    <td class=" ribbon-box">
                        
                        
                        <div class="ribbon
                        
                        @if($opportunity->converting_approval == 'hold')
                        ribbon-warning
                        @elseif($opportunity->converting_approval == 'rejected')
                        ribbon-danger
                        @elseif($opportunity->converting_approval == 'waiting_for_approve')
                        ribbon-success
                        @else
                        ribbon-primary
                        
                        @endif 
                        float-left">
                        <i class="ml-1
                        
                        @if($opportunity->converting_approval == 'hold')
                        mdi mdi-car-brake-hold
                        @elseif($opportunity->converting_approval == 'rejected')
                        mdi mdi-close-thick
                        @elseif($opportunity->converting_approval == 'waiting_for_approve')
                        fa fa-check
                        @else
                        mdi mdi-access-point
                        
                        @endif 
                        
                        
                        mr-1"></i> {{ $opportunity->converting_approval == null ? trans('sales.no_action') : ucfirst(str_replace('_',' ',$opportunity->converting_approval)) }}
                    </div>
                    <div class="ribbon-content">
                        <p class="mb-0">{{$opportunity->salutation .' : '. ucfirst( $opportunity->full_name )}}</p>
                    </div>
                    
                    
                    
                </div>
                
                
                <div class="progress mb-0">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $opportunity->probability_of_winning }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $opportunity->probability_of_winning }}%">{{ $opportunity->probability_of_winning }}</div>
                </div>
                
                
            </td>
            <td>{{ $email}}</td>
            
            
            <td> 
                <div class="d-flex align-items-center">
                    
                    @if($flag)
                    <div style="width:30px" class="mr-1"><img class="w-100" src="{{ asset('images/flags/'.$flag) }}" alt=""></div>
                    @endif
                    <div>
                        
             
                            <div> {{ $phone_number }}</div>
                            <div>{{ $long_name }}</div>
                            @if($time)
                            <small>{{ $time }}</small>
                        @endif
                    </div>
                </div>
            </td>
            <td>
                @can('edit_opportunity')
                
                
                <select onchange="show_qualification_modal({{ $opportunity->id }})" id="modify_opportunity_qualification_{{ $opportunity->id }}" class=" selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                    @forelse($lead_qualifications as $qualification)
                    <option @if($opportunity->qualification_id == $qualification->id) selected @endif  value="{{ $qualification->id}}">{{ $qualification->{'name_'.app()->getLocale()} }}</option>
                    @empty
                    
                    @endforelse
                </select>
                
                
                
                
                @else
                
                {{ $opportunity->qualification->{'name_'.app()->getLocale()} }} 
                @endcan
                
                
            </td>
            <td>
                {{ $opportunity->convertedBy ? $opportunity->convertedBy->{'name_'.app()->getLocale()} :'' }}
            </td>
            
            
            
            
            
            <td>
                @include('sales::opportunities.controlls')
                
            </td>
            
            
            
            
            
            @include('sales::opportunities.modals')
            
        </tr>
        @can('edit_opportunity')
        
        <tr  class="table-row_{{ $opportunity->id }} edit_opportunity_{{ $opportunity->id }}    
            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $opportunity->id ))
              @else d-none @endif
            "   >
            <td colspan="8">
                
                @include('sales::opportunities.edit',['edited_opportunity' => $opportunity])
                
            </td>
        </tr>
        
        @endcan
        
        
        
        @can('edit_opportunity')
        
        <tr  class="table-row_{{ $opportunity->id }} call_{{ $opportunity->id }}
            @if( (session()->has('open-call-tab') && session('open-call-tab') ==  $opportunity->id ))
              @else d-none @endif
            
            "   >
            <td colspan="8">
                
                @include('sales::opportunities.calls')
                
            </td>
        </tr>
        
        @endcan
        @can('edit_opportunity')
        
        <tr  class="table-row_{{ $opportunity->id }} result_{{ $opportunity->id }}
            @if( (session()->has('open-result-tab') && session('open-result-tab') ==  $opportunity->id ))
              @else d-none @endif
            
            "
               >
            <td colspan="8">
                
                @include('sales::opportunities.result')
                
            </td>
        </tr>
        
        @endcan
        @can('edit_opportunity')
        
        <tr  class="table-row_{{ $opportunity->id }} total_result_{{ $opportunity->id }}
            @if( (session()->has('open-total_result-tab') && session('open-total_result-tab') ==  $opportunity->id ))
              @else d-none @endif
            
            "
               >
            <td colspan="8">
                
                @include('sales::opportunities.total_results.total_results')
                
            </td>
        </tr>
        
        @endcan
        @can('edit_opportunity')
        
        <tr  class="table-row_{{ $opportunity->id }} question_{{ $opportunity->id }}
            @if( (session()->has('open-question-tab') && session('open-question-tab') ==  $opportunity->id ))
              @else d-none @endif
            
            "   >
            <td colspan="8">
                
                @include('sales::opportunities.question')
                
            </td>
        </tr>
        
        @endcan
        
        
        @can('assign_opportunity_to_staff')
        
        <tr  class="table-row_{{ $opportunity->id }} assign_{{ $opportunity->id }}
            @if( (session()->has('open-assign-tab') && session('open-assign-tab') ==  $opportunity->id ))
              @else d-none @endif
            "  >
            <td colspan="8">
                
                @include('sales::opportunities.assign')
                
            </td>
        </tr>
        
        @endcan
        
        
        
        @can('assign_task_on_opportunity')
        
            <tr  class="table-row_{{ $opportunity->id }} task_{{ $opportunity->id }}

                @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $opportunity->id ))
                @else d-none @endif
                
                "  >
                <td colspan="8">
                    
                    @include('sales::opportunities.tasks.tasks')
                    
                </td>
            </tr>
            
        @endcan
        
        
        
        @can('convert_opportunity_to_client')
        
        <tr  class="table-row_{{ $opportunity->id }} client_{{ $opportunity->id }}
            @if( (session()->has('open-client-tab') && session('open-client-tab') ==  $opportunity->id )) 
             @else d-none @endif
            "  >
            <td colspan="8">
                
                @include('sales::opportunities.convert_to_client')
                
            </td>
        </tr>
        
        @endcan
        
        @if($opportunity->client)
        @can('convert_opportunity_to_client')
        @if($opportunity->converting_approval == 'waiting_for_approve')
        <tr  class="table-row_{{ $opportunity->id }} approve_{{ $opportunity->id }}
            @if( (session()->has('open-approve-tab') && session('open-approve-tab') ==  $opportunity->id ))
              @else d-none @endif
            "   >
            <td colspan="8">
                
                @include('sales::opportunities.approve')
                
            </td>
        </tr>
        @endif
        
        @if($opportunity->converting_approval == 'hold' )
        
        <tr  class="table-row_{{ $opportunity->id }} hold_{{ $opportunity->id }}
            @if( (session()->has('open-hold-tab')  ==  $opportunity->id )) 
             @else d-none @endif
            "   >
            <td colspan="8">
                
                @include('sales::opportunities.hold')
                
            </td>
        </tr>
        @endif
        
        @endcan
        
        
        @endif
        
        
        @empty
        @endforelse
        
        
        
    </tbody>
</table>
<div class="d-flex justify-content-between">
    
    <div class="mt-2">
        @if($pagination)
        {{ $opportunities->links() }}
        @endif
        
    </div>

</div>
</div>

</div>
@can('manage_opportunity_setting') 
@include('sales::opportunities.settings_modals')
@endcan

@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/libs/footable/footable.all.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/pages/foo-tables.init.js')}}"></script> --}}

<script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>

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


        $(".foo-filtering").footable();
        $(".foo-assign").footable();
        $(".foo-task").footable();
        $(".foo-assign-history").footable();
        $(".foo-call").footable();
        $(".foo-question").footable();
        $(".foo-result").footable();

        if(sessionStorage.getItem('open-call-tab')){
            $('.call_'+sessionStorage.getItem('open-call-tab')).removeClass('d-none');
            sessionStorage.removeItem('open-call-tab')
        }

        if(sessionStorage.getItem('open-result-tab')){
            $('.result_'+sessionStorage.getItem('open-result-tab')).removeClass('d-none');
            sessionStorage.removeItem('open-result-tab')
        }

        if(sessionStorage.getItem('open-question-tab')){
            $('.question_'+sessionStorage.getItem('open-question-tab')).removeClass('d-none');
            sessionStorage.removeItem('open-question-tab')
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
                
        $('.country_code').val(filtered_country[0].phone_code);            
        $('.timezone').val(filtered_country[0].time_zone);            
        $('.country_flag').val(filtered_country[0].flag);            
        
        
        
    }
</script>

<script>
    
    
    
    
    function  show_add_div(){
        hide_check_div();
        var  div = document.querySelector('.add_opportunity');
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
        var  div = document.querySelector('.filter_opportunity');
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
        var  div = document.querySelector('.add_opportunity');
        
        div.style.display = 'none';
        setTimeout(function(){
            
            div.style.opacity = 0;
            
            
        },10);
        
        
        
    }
    
    
    
    
    
    function  show_check_div(){
        
        hide_add_div();
        
        
        var  div = document.querySelector('.check_opportunity');
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
        var  div = document.querySelector('.check_opportunity');
        
        div.style.display = 'none';
        setTimeout(function(){
            
            div.style.opacity = 0;
            
            
        },10);
        
        
        
    }
    
    

</script>



@endpush
