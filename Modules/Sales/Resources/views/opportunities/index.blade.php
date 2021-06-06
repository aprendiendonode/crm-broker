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
    



var  googleMapsScriptIsInjected = false;
        function injectGoogleMapsApiScript(options){

            if(googleMapsScriptIsInjected){
                return;
            }

    
                const optionsQuery = Object.keys(options)
                    .map(k => `${encodeURIComponent(k)}=${encodeURIComponent(options[k])}`)
                    .join('&');

                const url = `https://maps.googleapis.com/maps/api/js?${optionsQuery}`;

                const script = document.createElement('script');

                script.setAttribute('src', url);
                script.setAttribute('async', '');
                script.setAttribute('defer', '');

                document.head.appendChild(script);

                googleMapsScriptIsInjected = true;
            };

</script>




<script>


 
   

    var opportunities = @json($opportunities);
        function initMap() {



            opportunities.data.forEach(function(value,key){


                        edit_autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input_'+value.id)), {
                            types: ["establishment"],
                            });
                            edit_autocompletelocation_input.setComponentRestrictions({
                            country: ['EG'],
                        });

                        google.maps.event.addListener(edit_autocompletelocation_input, 'place_changed', function () {
                                var place = edit_autocompletelocation_input.getPlace();
                                        $('#latitude_'+value.id).val(place.geometry.location.lat());
                                        $('#longitude_'+value.id).val(place.geometry.location.lng());
                        
                        

                            });


                            var editMap = new google.maps.Map(document.getElementById('map_'+value.id), {
                                    center: {lat: value.loc_lat ? parseInt(value.loc_lat) : 30.0444 , lng:  value.loc_lng ? parseInt(value.loc_lng ) : 31.2357  },
                                    zoom: 13,
                                    
                                    mapTypeId: 'roadmap'
                                }); 

                                var geocoder = new google.maps.Geocoder();
                                google.maps.event.addListener(editMap, 'click', function(event) {
                                    SelectedLatLng = event.latLng;
                                    geocoder.geocode({
                                        'latLng': event.latLng
                                    }, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            if (results[0]) {
                                                deleteMarkers();
                                                addMarkerRunTime(event.latLng);
                                                SelectedLocation = results[0].formatted_address;
                                                console.log( results[0].formatted_address);
                                                editSplitLatLng(String(event.latLng),value.id);
                                                $("#location_input_"+value.id).val(results[0].formatted_address);
                                            }
                                        }
                                    });
                                });


                                function addMarkerRunTime(location) {
                                    var marker = new google.maps.Marker({
                                        position: location,
                                        map: editMap
                                    });
                                    markers.push(marker);
                                }




           })

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
        
            var markers = [];
          

        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function editSplitLatLng(latLng,id){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude_"+id).val(lat);
        $("#longitude_"+id).val(Lng);
    }


</script>


<script>
    var load_listing = false;
    function table_row_show(row_id,id){
      
        $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');
    
        if(id == 'edit_opportunity_'+row_id){
                    injectGoogleMapsApiScript({
                        key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                        libraries: 'places',
                        language: 'ar',
                        region: 'EG',
                        callback: 'initMap',
                    });
                }



        if(id == 'client_'+row_id && load_listing == false){
             var locale  =  @json(app()->getLocale());
             var agency  =  @json($agency);
                $.ajax({
                    url  : "{{ route('sales.load-listings') }}",
                    type : 'POST',
                    data :{
                        _token :'{{ csrf_token() }}',
                        agency_id : agency
                    },
                    success: function(data){
                        load_listing = true;
                        var option = '';
                        data.listings.forEach(function(value,key){
                                  option += '<option value="'+value.id+'" >';
                                  option += value.listing_ref;
                                  option += '</option>';
                             })
 
                    $('listing-loading-'+row_id).append(option)
             
            }
        })
    }


    if($('.'+id).hasClass('d-none')){
            $('.'+id).removeClass('d-none');
        }else{
            $('.'+id).addClass('d-none');

        }
    }
   
    function table_row_hide(id){
        
        $('.'+id).addClass('d-none');
    
    }
      
    
    function  hide_edit_div(id){
    
        $('.edit_opportunity_'+id).addClass('d-none');
    
    
    }
    
    
    
    
    function  hide_call_div(id){
        $('.call_'+id).addClass('d-none');
    
    }
    
    function  hide_assign_div(id){
    
        $('.assign_'+id).addClass('d-none');
    
    }
    
    
        function  hide_task_div(id){
    
            $('.task_'+id).addClass('d-none');
    
    
    
        }
    
    
        function  hide_client_div(id){
            $('.client_'+id).addClass('d-none');
    
    
        }
     
    
    function  hide_approve_div(id){
        $('.approve_'+id).addClass('d-none');
    
    
    }
    
    
    function  hide_hold_div(id){
        $('.hold_'+id).addClass('d-none');
    
    }
    
    
    function  hide_result_div(id){
        $('.result_'+id).addClass('d-none');
    
    }
    
    function  hide_question_div(id){
        $('.question_'+id).addClass('d-none');
    
    
    }


    function  show_total_call_div(id){

        $('.total_calls_'+id).toggleClass('d-none');

        }

        function hide_custom(id){
                $('.custom-staff_'+id).addClass('d-none');
        }

            function show_custom(id){
                $('.custom-staff_'+id).removeClass('d-none');
                
            }

            function  show_note_assign_div(assign,id){
                $('.opportunity_assign_note_'+assign+'_'+id).toggleClass('d-none');
            }

            function  show_current_note_assign_div(assign,id){
                $('.opportunity_current_assign_note_'+assign+'_'+id).toggleClass('d-none');
            }

            function  show_history_assign_div(id){
                $('.opportunity_history_assign_'+id).toggleClass('d-none');

            }


            function  show_question_answered_div(id){

            $('.question_answered_div_'+id).toggleClass('d-none');

            }
            function  show_question_not_answered_div(id){

            $('.question_not_answered_div_'+id).toggleClass('d-none');

            }

            function  show_result_report_div(result,id){

            $('.result_report_'+result+'_'+id).toggleClass('d-none');

            }

    </script>
    
@endpush
