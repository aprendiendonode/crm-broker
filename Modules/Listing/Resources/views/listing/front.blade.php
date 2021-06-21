<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title> {{ env('APP_NAME') }} | {{ $listing->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('logo.png')}}">


<!-- App css -->
    <link href="{{asset('assets/css/bootstrap-modern.min.css')}}" rel="stylesheet" type="text/css"
          id="bs-default-stylesheet"/>
    <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css"
          id="app-default-stylesheet"/>

    {{-- <link href="{{asset('assets/css/bootstrap-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
          id="bs-dark-stylesheet" disabled/>
    <link href="{{asset('assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
          id="app-dark-stylesheet" disabled/> --}}

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"
          type="text/css"/>


    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .pdf-btn {
            background-color: #8dc7f7;
            color: #fff;
        }
    </style>
  
</head>

<body data-layout-mode="detached"
      data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

<div class="container">
    <div class="header mt-3">
        <h2>{{ $listing->title }}</h2>
        <button class="btn btn-sm pdf-btn">Generate PDF</button>
    </div>    
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleControls" class="carousel mb-3 slide" data-ride="carousel">
                <div class="carousel-inner">

                    @if($listing->photos)
                       @foreach($listing->photos as $photo)
                            <div class="carousel-item @if($loop->iteration == 1) active @endif">
                                <img class="d-block w-100" 
                                @if($photo->active == 'main')
                                src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
                                @else
                                src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
                                @endif
                                >
                            </div>
                        @endforeach
                    @endif

                    



                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Ref No.</th>
                        <td>{{ $listing->listing_ref }}</td>
                        <th>Area</th>
                        <td>{{ $listing->area }} sqft</td>
                    </tr>
                    <tr>
                        <th>Permit No.</th>
                        <td> {{ $listing->permit_no }}</td>
                        <th>Beds</th>
                        <td>{{ $listing->beds }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>AED {{ $listing->price }}</td>
                        <th>Baths</th>
                        <td>{{ $listing->baths }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $listing->location }}</td>
                        <th>Parking</th>
                        <td>{{ $listing->parking }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="text-center mb-4">
                <div>
                    <img class="w-100 mb-2" style="background: #000; ; max-width: 160px;"
                     src="{{ $listing->agency && $listing->agency->image != null ? asset('company_profile_images/'.$listing->agency->image) : '' }}" alt="">
                </div>
                <div>{{ $listing->agency ? $listing->agency->{'company_name_'.app()->getLocale()} : '' }}</div>
                <div>Agent: {{ $listing->agent ? $listing->agent->{'name_'.app()->getLocale()} : '' }}</div>
            </div>
            <div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <td>{{ $listing->agent ? $listing->agent->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>Primary</th>
                            <td>{{ $listing->agent ? $listing->agent->phone : '' }}</td>
                        </tr>
                        <tr>
                            <th>Work</th>
                            <td>{{ $listing->agency ? $listing->agency->country_code .'-'.$listing->agency->phone : '' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $listing->agency ? $listing->agency->address : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div id="map" style="width:400px;height:300px;"></div>

            </div>
        </div>
       
    </div>
</div>

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<script>
  $(document).ready(function () {
    var region = @json($listing->agency && $listing->agency->country ? $listing->agency->country->iso2 : '');

    injectGoogleMapsApiScript({
        key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
        libraries: 'places',
        language: 'ar',
        region: region,
        callback: 'initMap',
    });

  })



     
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

    function initMap(){
        var lat = @json($listing->loc_lat);
    var lng = @json($listing->loc_lng);
        var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:parseInt( lat), lng: parseInt(lng) },
                zoom: 13,
                
                mapTypeId: 'roadmap'
            });
            
            
    
    
    }

</script>
<script src="{{asset('assets/js/app.min.js')}}"></script>


</body>
</html>
