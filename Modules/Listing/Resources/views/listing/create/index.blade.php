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
    var region = @json($agency_region);
        function initMap() {



           listings.data.forEach(function(value,key){


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

// Create our number formatter.
var formatter = new Intl.NumberFormat('en-EG', {
//   style: 'currency',
//   currency: 'EGP',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

formatter.format(2500); /* $2,500.00 */

function updatePrice() {
    let price = +document.getElementById('rent-sale-create').value;
    let annualCommissionPercentage = +(document.getElementById('annaul-commission').value) / 100;
    let depositPercenatage = +(document.getElementById('deposit-percenatage').value) / 100;
    // let commissionValue = document.getElementById('commissionValue');
    
    console.log(annualCommissionPercentage);
    console.log(price);
    console.log(annualCommissionPercentage * price);
    document.getElementById('commissionValue').value = formatter.format(annualCommissionPercentage * price);
    document.getElementById('depositValue').value = formatter.format(depositPercenatage * price);
}

function showRentDiv() {
    if($('.rent-radio')[0].checked){
        $('#rent_div')[0].style.display = "block";
        document.getElementById('rent-sale-label-create').innerHTML = "Rent";
    }else {
        $('#rent_div')[0].style.display = "none";
        document.getElementById('rent-sale-label-create').innerHTML = "Sale";

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