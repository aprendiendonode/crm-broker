<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title> OTG | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    @include('feed::links')

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
        <h2>Furnitured Bed | Partial Marina View</h2>
        <button class="btn btn-sm pdf-btn">Generate PDF</button>
    </div>    
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleControls" class="carousel mb-3 slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('assets/images/bayute-image.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/bayute-image.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/bayute-image.jpg') }}" alt="Third slide">
                    </div>
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
                        <td>12-Apr-R-1133</td>
                        <th>Area</th>
                        <td>828 sqft</td>
                    </tr>
                    <tr>
                        <th>Permit No.</th>
                        <td>-</td>
                        <th>Beds</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>AED 142,555</td>
                        <th>Baths</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>Marina Gate 121, Dubai</td>
                        <th>Parking</th>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="text-center mb-4">
                <div>
                    <img class="w-100 mb-2" style="background: #000; ; max-width: 160px;" src="{{ asset('assets/images/perfecta-logo.svg') }}" alt="">
                </div>
                <div>Perfecta Casa Real Estate</div>
                <div>Agent: Shqfique UL-Hassan</div>
            </div>
            <div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <td>ex@perfectacas.com</td>
                        </tr>
                        <tr>
                            <th>Primary</th>
                            <td>+20109933443</td>
                        </tr>
                        <tr>
                            <th>Work</th>
                            <td>+20100331243</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>Marina Gate 121, Dubai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14610049.559018193!2d21.856659345987513!3d26.61943941976208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2sEgypt!5e0!3m2!1sen!2seg!4v1623933156580!5m2!1sen!2seg" style="width: 100%;" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
       
    </div>
</div>

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
    $( document ).ready(function() {
        flatpickr(".flatpicker-range", {
            mode: "range"
        });
        flatpickr(".flatpicker");
    });
</script>
{{-- <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

{{-- <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script> --}}

<!-- Dashboar 1 init js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "600",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "progressBar": true,

    }

    function toast(message, type) {
        if (type == "success") {
            toastr.success(message)
        } else if (type == "error") {
            toastr.error(message)

        }
        else if (type == "danger") {
            toastr.error(message)

        }
        else if (type == "warning") {
            toastr.warning(message)

        }
        else if (type == "info") {
            toastr.info(message)

        }

    }

</script>


@if(Session::has('message'))
    <script>

        var type = "{{ Session::get('alert-type', 'info') }}";

        toast('{{ session('message') }}', type)

    </script>
@endif
<!-- App js-->
@stack('js')
<script src="{{asset('assets/js/app.min.js')}}"></script>


</body>
</html>
