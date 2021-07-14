@extends('layouts.master')

@section('title',trans('sales.leads'))
@section('css')


<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/intlcss/intlTelInput.css') }}" />
<script
src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"
integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw=="
crossorigin="anonymous"
></script>

@endsection
@section('content')
<div class="content p-3">


    <div class="d-flex justify-content-between align-items-start mb-3">
        <div class="d-flex flex-wrap">

            <a href="{{ url('sales/leads/'.request('agency')) }}" class="list-link @if(!request('filter_type')) active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>{{ trans('sales.all') }} </div>
            </a>
            @foreach($lead_types as $type)
                <a href="{{ url('sales/leads/'.request('agency').'?filter_type='. $type->id) }}" class="list-link @if(request('filter_type') == $type->id) active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>{{ ucfirst($type->{'name_'.app()->getLocale()} ) }} </div>
                </a>
      
            @endforeach
          
        </div>
        @can('add_lead')
        {{-- <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
            <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_leads')
        </button> --}}


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
        
            </div>
        @can('manage_lead_setting') 
                  @include('sales::leads.settings_modals')
        @endcan

@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

{{-- <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> --}}



{{-- <script src="{{ asset('assets/js/validation.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2-multiple').select2();
        $(".basic-datepicker").flatpickr();
        $(".clockpicker").clockpicker({
            twelvehour :false
        });   
    })
</script>

<script>

function  show_add_div(){
    hide_check_div();
    var  div = document.querySelector('.add_lead');
    if(div.style.display === 'none'){

         var region = @json($agency_region); 
        injectGoogleMapsApiScript({
                    key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries: 'places',
                    language: 'ar',
                    region: region,
                    callback: 'initMap',
                });

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

 var leads = @json($leads);
 var region = @json($agency_region);
 function initMap() {
    
leads.data.forEach(function(value,key){


             edit_autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input_'+value.id)), {
                 types: ["establishment"],
                 });
                 edit_autocompletelocation_input.setComponentRestrictions({
                 country: [region],
             });

             google.maps.event.addListener(edit_autocompletelocation_input, 'place_changed', function () {
                     var place = edit_autocompletelocation_input.getPlace();
                             $('#latitude_'+value.id).val(place.geometry.location.lat());
                             $('#longitude_'+value.id).val(place.geometry.location.lng());
             
             

                 });


                 var editMap = new google.maps.Map(document.getElementById('map_'+value.id), {
                         center: {lat: value.lat_loc ? parseInt(value.lat_loc) : 30.0444 , lng:  value.lng_loc ? parseInt(value.lng_loc ) : 31.2357  },
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


        autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input')), {
        types: ["establishment"],
        });
        autocompletelocation_input.setComponentRestrictions({
        country: [region],
        });

        google.maps.event.addListener(autocompletelocation_input, 'place_changed', function () {
        var place = autocompletelocation_input.getPlace();
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());


        });


    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat:30.0444, lng: 31.2357 },
        zoom: 13,
        
        mapTypeId: 'roadmap'
    }); 

    var geocoder = new google.maps.Geocoder();
    google.maps.event.addListener(map, 'click', function(event) {
        SelectedLatLng = event.latLng;
        geocoder.geocode({
            'latLng': event.latLng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    deleteMarkers();
                    addMarkerRunTime(event.latLng);
                    SelectedLocation = results[0].formatted_address;
             
                    splitLatLng(String(event.latLng));
                    $("#location_input").val(results[0].formatted_address);
                }
            }
        });
    });


    function addMarkerRunTime(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }
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
    function splitLatLng(latLng){
    var newString = latLng.substring(0, latLng.length-1);
    var newString2 = newString.substring(1);
    var trainindIdArray = newString2.split(',');
    var lat = trainindIdArray[0];
    var Lng  = trainindIdArray[1];
    $("#latitude").val(lat);
    $("#longitude").val(Lng);
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

        
    
    function  show_call_breif_div(call,id){

    var  div = document.querySelector('.call_breif_'+call+'_'+id);
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




    function add_call_status(){
            var name_en  =  $('.callstatus_name_en').val();
            var name_ar  =  $('.callstatus_name_ar').val();
            var agency   =  @json($agency);
            var business =  @json($business);

            var locale = @json(app()->getLocale());
        
            if(name_en == ''){
                $('.callstatus-error-message').text('invalid data');
                return false;
            }
            
            $.ajax({
                url:"{{ url('sales/call_status_from_index')  }}",
                type:'POST',
                data:{
                    name_en : name_en,
                    name_ar : name_ar,
                    agency  : agency,
                    business: business,
                    _token  :'{{ csrf_token() }}'
                },
                success: function(data){
                    $('.callstatus-error-message').text('');
                    name = '';
                    if(locale == 'en'){
                        name = data.data.name_en
                    } else {
                        name = data.data.name_ar
                    
                    }

                    html = '<option value='+data.data.id+' >'+name+'</option>'
                    $('.select_callstatus_id').append(html)
                    $('.callstatus_name_en').val('');
                    $('.callstatus_name_ar').val('');
                    $('#add_callstatus').modal('hide');

                    toast(data.message, 'success')

                },
                error: function (error) {
                    $('.callstatus-error-message').text(error.responseJSON.message);
                }
            })
        }
</script>
    
<script>
    function table_row_show(row_id,id,lead = null){

        $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');

        var exists = false;
        var exists_value = null;
        @if( session()->has('open-edit-tab') )
            exists = true;
            exists_value = @json(session('open-edit-tab'));
        @endif 
        if(exists_value != lead.id ){

            exists =  false ;
        }
      
        
      
        if(id == 'edit_lead_'+row_id){
                injectGoogleMapsApiScript({
                    key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries: 'places',
                    language: 'ar',
                    region: 'EG',
                    callback: 'initMap',
                });

            if(exists == false && exists_value != lead.id){
                var edit_phone1 = document.querySelector(".phone1_"+row_id);
                var edit_phone1_iti = window.intlTelInput(edit_phone1, {
                
                  initialCountry: "auto",
                  utilsScript: "{{ asset('assets/js/util.js') }}",
                });
                if(lead.phone1_symbol){

                    edit_phone1_iti.setCountry(lead.phone1_symbol);
                }



                $('.phone1_'+row_id).change(function(){
                    var number = edit_phone1_iti.getSelectedCountryData();
                    if(edit_phone1_iti.isValidNumber() == false){
                        $('.phone1_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = edit_phone1.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.phone1_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                edit_phone1.addEventListener("countrychange", function() {
                        number = edit_phone1_iti.getSelectedCountryData()           
                        $('.edit_phone1_code_'+row_id).val(number.dialCode)
                        $('.edit_phone1_symbol_'+row_id).val(number.iso2)
                        if(edit_phone1.value != ''){
                            var str = edit_phone1.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.phone1_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!edit_phone1_iti.isValidNumber()){
                                formSubmit = false;
                                $('.phone1_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });
                





                var edit_phone2 = document.querySelector(".phone2_"+row_id);
                var edit_phone2_iti = window.intlTelInput(edit_phone2, {
                
                  initialCountry: "auto",
                  utilsScript: "{{ asset('assets/js/util.js') }}",
                });
                if(lead.phone2_symbol){

                    edit_phone2_iti.setCountry(lead.phone2_symbol);
                }



                $('.phone2_'+row_id).change(function(){
                    var number = edit_phone2_iti.getSelectedCountryData();
                    if(edit_phone2_iti.isValidNumber() == false){
                        $('.phone2_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = edit_phone2.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.phone2_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                edit_phone2.addEventListener("countrychange", function() {
                        number = edit_phone2_iti.getSelectedCountryData()           
                        $('.edit_phone2_code_'+row_id).val(number.dialCode)
                        $('.edit_phone2_symbol_'+row_id).val(number.iso2)
                        if(edit_phone2.value != ''){
                            var str = edit_phone2.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.phone2_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!edit_phone2_iti.isValidNumber()){
                                formSubmit = false;
                                $('.phone2_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });







                var edit_phone3 = document.querySelector(".phone3_"+row_id);
                var edit_phone3_iti = window.intlTelInput(edit_phone3, {
                
                  initialCountry: "auto",
                  utilsScript: "{{ asset('assets/js/util.js') }}",
                });
              if(lead.phone3_symbol){

                edit_phone3_iti.setCountry(lead.phone3_symbol);
              }


                $('.phone3_'+row_id).change(function(){
                    var number = edit_phone3_iti.getSelectedCountryData();
                    if(edit_phone3_iti.isValidNumber() == false){
                        $('.phone3_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.phone3_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = edit_phone3.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.phone3_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.phone3_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                edit_phone3.addEventListener("countrychange", function() {
                        number = edit_phone3_iti.getSelectedCountryData()           
                        $('.edit_phone3_code_'+row_id).val(number.dialCode)
                        $('.edit_phone3_symbol_'+row_id).val(number.iso2)
                        if(edit_phone3.value != ''){
                            var str = edit_phone3.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.phone3_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.phone3_'+row_id).css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!edit_phone3_iti.isValidNumber()){
                                formSubmit = false;
                                $('.phone3_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });






                var edit_phone4 = document.querySelector(".phone4_"+row_id);
                var edit_phone4_iti = window.intlTelInput(edit_phone4, {
                
                  initialCountry: "auto",
                  utilsScript: "{{ asset('assets/js/util.js') }}",
                });
                 if(lead.phone4_symbol){
                edit_phone4_iti.setCountry(lead.phone4_symbol);
                }


                $('.phone4_'+row_id).change(function(){
                    var number = edit_phone4_iti.getSelectedCountryData();
                    if(edit_phone4_iti.isValidNumber() == false){
                        $('.phone4_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.phone4_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = edit_phone4.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.phone4_'+row_id).css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.phone4_'+row_id).css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                edit_phone4.addEventListener("countrychange", function() {
                        number = edit_phone4_iti.getSelectedCountryData()           
                        $('.edit_phone4_code_'+row_id).val(number.dialCode)
                        $('.edit_phone4_symbol_'+row_id).val(number.iso2)
                        if(edit_phone4.value != ''){
                            var str = edit_phone4.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.phone4_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.phone4_'+row_id).css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!edit_phone4_iti.isValidNumber()){
                                formSubmit = false;
                                $('.phone4_'+row_id).css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });


                $('form[name="lead-update-'+row_id+'"]').submit(function(e){
                    return formEditSubmit == false ? event.preventDefault() : true;
                });

            }

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


</script>

@endpush
