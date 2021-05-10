@extends('layouts.master')

@section('title',trans('sales.clients'))
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
            @lang('sales.manage_clients')
        </h4>
        
        
        <a href="#" class="list-link active">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.client')</div>
        </a>
        @if(owner())
        <a href="{{ url('sales/leads/'.request('agency')) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>
        <a href="{{ url('sales/opportunities/'.request('agency')) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.opportunities')</div>
        </a>
        @elseif(moderator())
        <a href="{{ url('sales/leads/'.request('agency')) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>

            <a href="{{ url('sales/opportunities/'.request('agency')) }}" class="list-link">
                <i class="fas fa-save mr-1"></i>
                <div>@lang('sales.opportunities')</div>
            </a>
        @else
        <a href="{{ url('sales/leads/'.auth()->user()->agency_id) }}" class="list-link">
            <i class="fas fa-save mr-1"></i>
            <div>@lang('sales.leads')</div>
        </a>

            <a href="{{ url('sales/opportunities/'.auth()->user()->agency_id) }}" class="list-link">
                <i class="fas fa-save mr-1"></i>
                <div>@lang('sales.opportunities')</div>
            </a>
        @endif
        
        @can('add_client')
            <button onclick="show_check_div()" type="button" class="btn btn-info waves-effect waves-light">
                <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_clients')
            </button>
        @endcan 
    </div>
    
    @can('add_client')
    
    <div class="mb-2 check_client "  style="display: none;opacity:0;transition:0.7s">
        @include('sales::clients.check_before_create')
    </div>
    
    <div class="mb-2 add_client " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
        @include('sales::clients.create')
    </div>
    @endcan
    
    
    <button class="btn btn-primary mb-2" onclick="show_filter()">@lang('sales.filter') <i class="fa fa-search"></i></button>   
    <a class="btn btn-outline-primary mb-2" href="{{ url('sales/clients/'.request('agency')) }}">@lang('sales.reset_filters')</a>
    
    <div class="mb-2 filter_client " @if(!request()->has('filter_name')) style="display: none;opacity:0;transition:0.7s" @endif>
        
        @include('sales::clients.filter')
        
    </div>    
    
    
@include('sales::clients.table')

    <div class="d-flex justify-content-between">
            
        <div class="mt-2">
            @if($pagination)
            {{ $clients->links() }}
            @endif
            
        </div>

    </div>
</div>
@can('manage_client_setting') 
@include('sales::clients.settings_modals')
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

    
        $(".foo-filtering").footable()
        $(".foo-task").footable()
    
        $(".foo-call").footable()
        $(".foo-question").footable()
       
     
        
        
        
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
        var  div = document.querySelector('.add_client');
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
        var  div = document.querySelector('.filter_client');
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
        var  div = document.querySelector('.add_client');
        
        div.style.display = 'none';
        setTimeout(function(){
            
            div.style.opacity = 0;
            
            
        },10);
        
        
        
    }
    
 
    
    function hide_all(){
        $(".client-table tr:gt(1)").css('display','none');
        $(".client-table tr:gt(1)").css('opacity',0);
    }
</script>



@endpush
