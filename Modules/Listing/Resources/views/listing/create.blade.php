@extends('layouts.master')

@section('title',trans('listing.listings'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/modals.css') }}" rel="stylesheet">
    <style>
        .toggle.android {
            border-radius: 0px;
        }

        .toggle.android .toggle-handle {
            border-radius: 0px;
        }


        .description-profile-modal
        .ck-editor__editable_inline {
                min-height: 350px;
        }
    </style>

    @endsection


@section('content')
    <div class="content p-3">
        <div class="content">

            <div class="content-page">
           
      


                   
                      
                            <!-- project card -->
                            <div class="card d-block">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete mr-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline mr-1"></i>Invite</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app mr-1"></i>Leave</a>
                                        </div>
                                    </div>


                                    <form id="add-staff-form" action="{{ route('listing.store') }}" data-parsley-validate="" autocomplete="off" method="POST" enctype="multipart/form-data">
                                        <div class="row ">
                                                @csrf
            
                                                @if($agency)
                                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                                @endif
                                                @if($business)
                                                <input type="hidden" name="business_id" value="{{ $business }}">
                                                @endif
            
            
            
                                                <div class="form-group offset-md-4 col-md-8">
                                                    <button   class="btn btn-primary" onclick="event.preventDefault();alert('clicked')">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG8AAABPCAYAAADlaZtWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpCNEVERjI4MDdDNTBFOTExOTRFMDhDQzQzQjM3ODNGNCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3NkM1REE2NzVGNDYxMUU5ODE3NzhFMkU5Q0E2M0VCMyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3NkM1REE2NjVGNDYxMUU5ODE3NzhFMkU5Q0E2M0VCMyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkNDQzMxRTBFNUI1MUU5MTE4NjRFOTA2MEUwOTc4OUI4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI0RURGMjgwN0M1MEU5MTE5NEUwOENDNDNCMzc4M0Y0Ii8+IDwvcmRmOkRlc2NyaXB0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"
                                                        class="sc-bdVaJa sc-bZQynM eGHNJB"><div font-size="1" class="sc-bdVaJa sc-htpNat dKhyze">@lang('listing.Property for Sale')</div></button>
            
            
                                                        <button  class="btn btn-warning"   onclick="event.preventDefault();alert('clicked')">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG8AAABPCAYAAADlaZtWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUE4ODhGQTlGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUE4ODhGQUFGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5QTg4OEZBN0Y2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5QTg4OEZBOEY2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Ps1OxK0AAAWLSURBVHja7F1NiBxFFH41O7vZNWZjNv4l/hAlEUEIiEYUDYoogl69KQFz1ouQg55EkIDgRfCgeBDBHxBBQVQU9eIlIkYUEUSjHrJL3I1xs5vdnf1r30e/ZprRmame9HRXb38ffOywVHe/qq/qVdWr6moXRZEQ1UQzp/s8pzyibCg3A83rNuWq8mXlq8qlqovncmp508o9FcnzCeUTyp/Z8mK07O+68rTyvNX0EHzyhnJSebXlFzaN0G22EaVa4PPKk8rtgYiHinWn8lnzDlHArr0U8RIsKL9V/hBYPkeVy1ttwNLI+X7jyt0B5vNy5RjF83ehISEK1K6gxIsCFk8oHkHxCIpH8QiKR1A8whfNEp89oZyyCoTIzLzHkB5pd0ocekPM8pxyhS2veDykfEP5tvJJE7MfEGB+RvmOXXuf0rHlFY8DysMSrz7MetqCENc9yrus5X1g4kVsecXiQqrQFz0FgGD/pK5ZqqtwoQ1YihIBFWCNbrOa2LT+dUdJldeZDecpXnbcpDymnJNylolQYbBA/KHyK4qXDdgO8XgAdtytPMRJejXQ2afvo9vMjhnlx8ozEq/8FwX0cfuVjyh3WWCC4mXEKeVLyt8KzD8GKcvmKu8w8TjaHHC0iZDaqrFI5DpFqWOf1xS/UNwwMJ5nmXPAUuFABMWrMCgexSMoHkHx6jRsJv6LK5TXWeXe8EiPV8bwetufEm/NoHglVuiHlU/bb6wAOI9rsDj8gvIjilceINSNyoMZr0MLvZ5us1wgfIag9WlpL5z6CI5A8xzFK1+8T0w89GWrHm4z6Ru/p3jlAiGs342cKhAUj6B4FI+geATFo3hE1RDKPC/KkC4a4LqscDLYq2OFHmVSpnhjqZY/5ukFkGab/R41DkM4xDXx+lmyWuBjF9J9ofylDuLh9Swsn2BHFTak+h7mNm/p8arXMN6KhWD3K49b+Sx7tMJRs2mhLuJ9LnEgFxn/1VMIFNCLyncljjmeHFLLG0+18Es9r0tfs+XFGyR+CMFOGIcFBJhxkOpnVrGWPFse0p2q44AlJMB9f6r8eoBB0SLFKx8rUoFTJjjP4ySdoHgExaN4BMUjKB4R4DwveUs1ayTe2TxsWCcZTUj76ydZbEJ0ZqkO4l2rPKq8WeKwV5ShkBCO+lH5uuS70RWrGziN8FGJA9RrGcsSEZb3lF9udfEelPgkou0pUXyQiIxCRkD7fclvDQ0V6inlAx2Vxdcm/MUHOL6RAkJlZYp3mT0/cTdrlnnXo4CctNf+EMWfknyPbJwwu5J7rpltro9wTfMGSIfDXCe3unit1G98f+gt68cgymaXPm7SXO0t5mpbku/K9bq0j/fAeiEOcv1O4qWeboM72IXzVR6zitUSv9fCKj9gSfCT8hXpvyCLlnGviTfsz6jNm0v2OdxtwfrJQg+iC2Wq0BS/o6TGUxVu2HtFnPgtro5YusKPSw5FPCf+e1hcYDYlaWsrHkHxKB5RU/Gy+H53kX3GoM8qu293Ibe8LMZFGTPV+B/RByk0l3OFcp4DHRdyy8OE9axn2r9T4iUbafthNhW5wER4znPKMJeafGMT7ZkeNi2nggg+eUk+i5NMzGHfX13SnpUcNzblPUnHcfe329yn16e2EXY6mJpoI6Z42P4/0qXGrto9r7T/IRx1qwnaa8IOEW6T9hmbU/as6Y78o/D3SvuDxXjWIYu6jPVoNRsdebnKAgmL0t6Oj2svmL07cnNxUZTLXBebZ/eJ30fuk++U7zYhnKWfsf83uoi3boVxjfISSztrraXRp2WkP3K/YsK1Oq6L7P57Teh1a6HzfSoH7r/LRGuYSNMdFdHZ8ybNftjxh/KGEMSDsXs4/suEGasopbvN15RHrOZtUpe+4wyU0ZsXe6N/BRgAju4p4jVEHlIAAAAASUVORK5CYII=" class="sc-bdVaJa sc-bZQynM eGHNJB">
                                                            <div font-size="1" class="sc-bdVaJa sc-htpNat bDKqpz">@lang('listing.Property for Rent')</div>
                                                        </button>
            
                                                </div>
                                                <div class="form-group offset-md-3 col-md-6">
                                                    <label class="font-weight-medium text-muted" >@lang('listing.type')<span class="text-danger"> *</span></label>
                                                    
                                                        <select class="form-control select2 listing_type" onchange="showFurnishedQuestion();"  name="type_id" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
                                                            <option value=""></option>
                                                                <optgroup label="@lang('listing.residential')">
                                                                    @foreach($listing_types->where('type','residential') as $type)
                                                                    <option 
                                                                    data-furnished="{{ $type->furnished_question }}"
                                                                    @if(old('type_id') == $type->id) selected @endif
                                                                    value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                                    @endforeach
                                        
                                                                </optgroup>
                                                                <optgroup label="@lang('listing.commercial')">
                                                                    @foreach($listing_types->where('type','commercial') as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                                    @endforeach
                                        
                                                                </optgroup>
                                                
                                                        </select>
                                                    
                                                </div>



                                                <div class="form-group offset-md-3 col-md-6">
                                                    <div class="card-box">
                                                        <h4 class="header-title mb-3">Markers</h4>
                    
                                                        {{-- <div id="gmaps-markers" class="gmaps"></div> --}}
                                                        <div id="map" class="gmaps" ></div>

                                                    </div> <!-- end card-box-->
                                                </div> <!-- end col-->
                             
                                                <div class="form-group offset-md-3 col-md-6" >
                                                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
                                                    <div class="d-flex align-items-center" style="flex:2">
                                                        <input type="text" class="form-control" name="location"  id="location_input"  value="{{ old('location') }}" 
                                                         >
                                                         <input type="hidden" name="loc_lat" id="latitude" value="{{ old('loc_lat') }}" >
                                                         <input type="hidden" name="loc_lng" id="longitude" value="{{ old('loc_long') }}">
                                                     
                                                     
                                                    </div>
                                                </div>
                                
                                            

                                                <div class="form-group offset-md-3 col-md-6">

                                                    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
                                                    <div style="flex:2;">
                                                        <select required onchange="getCommunitites('create',null)" class="form-control select2 city-in-create" name="city_id"
                                                         data-toggle="select2" data-placeholder="@lang('listing.city')">
                                                                <option value=""></option>
                                                            
                                                            @foreach($cities as $city)
                                                                <option @if(old('city_id') == $city->id  ) selected @endif value="{{ $city->id }}">
                                                                    {{ $city->{'name_'.app()->getLocale()} }}
                                                                </option>
                                                            @endforeach
                                    
                                                        </select>
                                                  
                                                    </div>
                                                </div>
                                
                                
                                    
                                            <div class="form-group offset-md-3 col-md-6">
                                
                                                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
                                                <div style="flex:2;">
                                                    <select required onchange="getSubCommunities('create',null)" class="form-control select2 community-in-create" name="community_id"
                                                     data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
                                                            <option value=""></option>
                                                        
                                                      @if(old('city_id'))
                                                        @if(old('community_id'))
                                                            @foreach($communities->where('city_id',old('city_id')) as $community)
                                                                <option class="create-appended-communities"
                                                                    @if(old('community_id') == $community->id)  
                                                                        selected  
                                                                        @endif
                                                                        value="{{ $community->id }}">
                                                    
                                                                    {{ $community->{'name_'.app()->getLocale()}  }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endif    
                                                    
                                     
                                
                                                    </select>
                                              
                                                </div>
                                            </div>
                                
                                
                                            <div class="form-group offset-md-3 col-md-6">
                                
                                                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
                                                <div style="flex:2;">
                                                    <select class="form-control select2 sub-community-in-create" name="sub_community_id"
                                                     data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
                                                            <option value=""></option>
                                
                                                            @if(old('city_id') && old('community_id'))
                                                            @if(old('sub_community_id'))
                                                                @foreach($sub_communities->where('community_id',old('community_id')) as $sub_community)
                                                                    <option class="create-appended-sub-communities"
                                                                        @if(old('sub_community_id') == $sub_community->id)  
                                                                            selected  
                                                                            @endif
                                                                            value="{{ $sub_community->id }}"
                                                                    >
                                                        
                                                                        {{ $sub_community->{'name_'.app()->getLocale()}  }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endif  
                                                    </select>
                                              
                                                </div>
                                            </div>
                                

      

                                                    
                                </div> <!-- end card-body-->
                                                    
                 

                 
                            <!-- end card-->
                    

                     

                          
                                    
                                                
                                        

                                                <!-- end row -->
                            
                                    {{-- @include('listing::listing.create.location_price')
                                    @include('listing::listing.create.listing_details')
                                    @include('listing::listing.create.associates')
                                    @include('listing::listing.modals.create_modals') --}}

                                    

                                
                             

                                <div class="d-flex justify-content-end">
    
                                    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn  btn-outline-success waves-effect waves-light">
                                    @lang('agency.cancel')
                                    </button>
                                    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
                                    </button>
                                </div>
    
                            </div>
                        </form>
                 
                       

             

                          
            
        </div>
    </div>
</div>


@endsection


@push('js')



<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>


<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

<script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/google-maps.init.js') }}"></script> --}}

<script>


   $(document).ready(function () {
        $('.select2').select2();
        $('.select2-multiple').select2();
        $(".basic-datepicker").flatpickr();
        $(".clockpicker").clockpicker({
            twelvehour :false
        });


        injectGoogleMapsApiScript({
                    key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries: 'places',
                    language: 'ar',
                    region: 'EG',
                    callback: 'initMap',
                });



});

var formatter = new Intl.NumberFormat('en-EG', {
//   style: 'currency',
//   currency: 'EGP',
});


function updatePrice() {
    let price = +document.getElementById('rent-sale-create').value;
    let annualCommissionPercentage = +(document.getElementById('annaul-commission').value) / 100;
    let depositPercenatage = +(document.getElementById('deposit-percenatage').value) / 100;
    // let commissionValue = document.getElementById('commissionValue');
    

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


<script>
    var googleMapsScriptIsInjected;
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



    var region = @json($agency_region);
        function initMap() {

           
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
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language=ar&region=EG&callback=initMap"></script> --}}

@endpush