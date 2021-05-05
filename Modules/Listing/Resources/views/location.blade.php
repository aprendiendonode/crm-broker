{{-- <!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Restricted to Multiple Countries</title>

  </head>
  <body>
  
      <div id="pac-container">
        <input id="search_input" type="text" placeholder="Enter a location" />
      </div>
    </div>
    <div id="result-text"></div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon" />
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script   src="https://maps.google.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&callback=initMap&libraries=places&v=weekly"
  
></script>
  <script>

var searchInput = 'search_input';
google.maps.event.addDomListener(window,'load',initialize)
function initialize(){
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
    autocomplete.addListener('place_changed',function(){
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    })
}

  </script>
  </body>
</html> --}}


<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
  </head>
  <body>

    <div id="map-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cheque-modalLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content ">
              <div class="modal-header py-2">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
  
  
  
                  <div id="map" ></div>
  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="addCheque()"><i class="fas fa-plus-circle"></i>
                      @lang('listing.add_more_cheques')
  
                      </button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Done</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
    <h3>My Google Maps Demo</h3>
    <i class="fas fa-map-marker-alt" style="font-size:1.2rem"  data-toggle="modal" data-target="#map-modal"></i>

    <!--The div element for the map -->

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>