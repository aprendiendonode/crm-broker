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
    
    
@include('sales::opportunities.table')
<div class="d-flex justify-content-between">
    
    <div class="mt-2">
        @if($pagination)
        {{ $opportunities->links() }}
        @endif
        
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
    




    function getCommunitites(type,id){

var city_id ='';
if(type == "create"){
    city_id = $('.city-in-create').val();

}else{
    city_id = $('.city-in-edit-'+id).val();

}
  
    var option = '';
    var locale      = @json(app()->getLocale());
    var communities = @json($communities);
       communities.forEach(function(value,key){

        if(value.city_id == city_id){

      
        if(type == 'create'){
            option += '<option value="'+value.id+'" class="create-appended-communities">';
        } else{
            option += '<option value="'+value.id+'" class="edit-appended-communities-'+id+'">';
        }
       
 
            if(locale == 'en'){

                option += value.name_en;
            } else{
                option += value.name_ar;
            }
        option += '</option>';

    }

    })


    if(type == "create"){
        $('.create-appended-communities').remove();
        $('.create-appended-sub-communities').remove();
        $('.community-in-create').append(option)


    }else{
        $('.edit-appended-communities-'+id).remove();
        $('.edit-appended-sub-communities-'+id).remove();
        $('.community-in-edit-'+id).append(option)

    }


}

function getSubCommunities(type,id){
        var community_id ='';
        if(type == "create"){
        community_id = $('.community-in-create').val();

        }else{
            community_id = $('.community-in-edit-'+id).val();
        }


    var option = '';
    var locale = @json(app()->getLocale());
    var sub_communities = @json($sub_communities);
    sub_communities.forEach(function(value,key){
        if(value.community_id ==community_id ){

            if(type == 'create'){
                option += '<option value="'+value.id+'" class="create-appended-sub-communities">';
                } else{
                    option += '<option value="'+value.id+'" class="edit-appended-sub-communities-'+id+'">';
                }
        
                if(locale == 'en'){
    
                    option += value.name_en;
                } else{
                    option += value.name_ar;
                }
            option += '</option>';
        }

    })


    if(type == "create"){
        $('.create-appended-sub-communities').remove();
        $('.sub-community-in-create').append(option)

    }else{
        $('.edit-appended-sub-communities-'+id).remove();
        $('.sub-community-in-edit-'+id).append(option)
    }




}
    

</script>



@endpush
