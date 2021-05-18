@section('css')
<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
  </style>
   

@endsection
<form id="add-staff-form" action="{{ route('listing.store') }}" data-parsley-validate="" autocomplete="off" method="POST" enctype="multipart/form-data">
<div class="row">
        @csrf

        @if($agency)
          <input type="hidden" name="agency_id" value="{{ $agency }}">
        @endif
        @if($business)
          <input type="hidden" name="business_id" value="{{ $business }}">
        @endif

        @include('listing::listing.create.location_price')
        @include('listing::listing.create.listing_details')
        @include('listing::listing.create.associates')
        @include('listing::listing.modals.create_modals')

        

    
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn  btn-outline-success waves-effect waves-light">
       @lang('agency.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
    </button>
</div>

</form>



@push('js')
<script>


 
   

    var listings = @json($listings);
        function initMap() {



           listings.data.forEach(function(value,key){


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



                        edit_autocomplete = new google.maps.places.Autocomplete((document.getElementById('city_'+value.id)), {
                            types: ['(cities)']
                            });
                            edit_autocomplete.setComponentRestrictions({
                            country: ['EG'],
                        });





                            edit_autocompletecommunity = new google.maps.places.Autocomplete((document.getElementById('community_'+value.id)), {
                            types: ['(regions)']
                            });
                            edit_autocompletecommunity.setComponentRestrictions({
                            country: ['EG'],
                        });
                    



                            var map = new google.maps.Map(document.getElementById('map_'+value.id), {
                                    center: {lat:30.0444, lng: 31.2357 },
                                    zoom: 13,
                                    
                                    mapTypeId: 'roadmap'
                                }); 


                                // infoWindow = new google.maps.InfoWindow;
                                geocoder = new google.maps.Geocoder();

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
                                                console.log( results[0].formatted_address);
                                                editSplitLatLng(String(event.latLng),value.id);
                                                $("#location_input_"+value.id).val(results[0].formatted_address);
                                            }
                                        }
                                    });
                                });
           })

           
            autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input')), {
        types: ["establishment"],
        });
        autocompletelocation_input.setComponentRestrictions({
           country: ['EG'],
       });

       google.maps.event.addListener(autocompletelocation_input, 'place_changed', function () {
            var place = autocompletelocation_input.getPlace();
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
     
     

        });



       autocomplete = new google.maps.places.Autocomplete((document.getElementById('city')), {
        types: ['(cities)']
        });
        autocomplete.setComponentRestrictions({
           country: ['EG'],
       });





        autocompletecommunity = new google.maps.places.Autocomplete((document.getElementById('community')), {
        types: ['(regions)']
        });
        autocompletecommunity.setComponentRestrictions({
           country: ['EG'],
       });
  



        var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:30.0444, lng: 31.2357 },
                zoom: 13,
                
                mapTypeId: 'roadmap'
            }); 


            // infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();

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
                            console.log( results[0].formatted_address);
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
</script>




<script>
function showRentDiv() {
    // console.log('showRentDiv');
    // console.log($('#rent_div'));
    if($('.rent-radio')[0].checked){
        $('#rent_div')[0].style.display = "block";
    }else {
        $('#rent_div')[0].style.display = "none";
    }
}
function showSubRentDiv() {
 
    if($('.sub-rent-checkbox')[0].checked){
        $('#sub_rent_div')[0].style.display = "block";
    }else {
        $('#sub_rent_div')[0].style.display = "none";
    }
        
}

function showFurnishedQuestion(){
    question_status = $('.listing_type').find(':selected').data('furnished');
    if(question_status == 'yes'){
        $('.furnished_question').removeClass('d-none');
    }else{
        $('.furnished_question').addClass('d-none');
    }
  
}
</script>

@endpush