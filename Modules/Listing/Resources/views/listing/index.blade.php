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
    
   
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language={{ $agency_language }}&region={{ $agency_region }}"></script>
     <script src="{{ asset('assets/js/listing_modify.js') }}"></script>
     <script src="{{ asset('assets/js/listing.js') }}"></script>
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

        .lds-facebook {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-facebook div {
  display: inline-block;
  position: absolute;
  left: 8px;
  width: 14px;
  background:#981717;
  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
}
.lds-facebook div:nth-child(1) {
  left: 8px;
  animation-delay: -0.24s;
}
.lds-facebook div:nth-child(2) {
  left: 32px;
  animation-delay: -0.12s;
}
.lds-facebook div:nth-child(3) {
  left: 56px;
  animation-delay: 0;
}
@keyframes lds-facebook {
  0% {
    top: 8px;
    height: 64px;
  }
  50%, 100% {
    top: 24px;
    height: 32px;
  }
}



.table-info-summary {
margin-bottom: 0px !important;
}
.table-info-summary td,th {
 padding:5px !important;
}
    </style>

    @endsection


@section('content')
    <div class="content p-3">


        <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d-flex flex-wrap">

                @if(owner())

                <a href="{{ url('listing/controll/'.request('agency').'?status_main=live') }}" class="list-link @if(request('status_main') == 'live') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.live')({{ $live_count }})</div>
                </a>


            @elseif(moderator())

                <a href="{{ url('listing/controll/'.request('agency').'?status_main=live') }}" class="list-link @if(request('status_main') == 'live') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.live')({{ $live_count }})</div>
                </a>

            @else
                <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=live') }}" class="list-link @if(request('status_main') == 'live') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.live')({{ $live_count }})</div>
                </a>

            @endif




            @if(owner())

                <a href="{{ url('listing/controll/'.request('agency').'?status_main=draft') }}" class="list-link @if(request('status_main') == 'draft') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.draft')({{ $draft_count }})</div>
                </a>


            @elseif(moderator())

                <a href="{{ url('listing/controll/'.request('agency').'?status_main=draft') }}" class="list-link @if(request('status_main') == 'draft') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.draft')({{ $draft_count }})</div>
                </a>


            @else
                <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=draft') }}" class="list-link @if(request('status_main') == 'draft') active @endif">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>@lang('listing.draft')({{ $draft_count }})</div>
                </a>

            @endif



            @if(owner())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=review') }}" class="list-link @if(request('status_main') == 'review') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.review')({{ $review_count }})</div>
            </a>


            @elseif(moderator())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=review') }}" class="list-link @if(request('status_main') == 'review') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.review')({{ $review_count }})</div>
            </a>


            @else
            <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=review') }}" class="list-link @if(request('status_main') == 'review') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.review')({{ $review_count }})</div>
            </a>

            @endif




            @if(owner())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=archive') }}" class="list-link @if(request('status_main') == 'archive') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.archive')({{ $archive_count }})</div>
            </a>


            @elseif(moderator())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=archive') }}" class="list-link @if(request('status_main') == 'archive') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.archive')({{ $archive_count }})</div>
            </a>


            @else
            <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=archive') }}" class="list-link @if(request('status_main') == 'archive') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.archive')({{ $archive_count }})</div>
            </a>

            @endif




            @if(owner())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=all') }}" class="list-link @if(request('status_main') == 'all') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.all')({{ $all_count }})</div>
            </a>


            @elseif(moderator())

            <a href="{{ url('listing/controll/'.request('agency').'?status_main=all') }}" class="list-link @if(request('status_main') == 'all') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.all')({{ $all_count }})</div>
            </a>


            @else
            <a href="{{ url('listing/controll/'.auth()->user()->agency_id.'?status_main=all') }}" class="list-link @if(request('status_main') == 'all') active @endif">
                <i class="fas fa-info-circle mr-1"></i>
                <div>@lang('listing.all')({{ $all_count }})</div>
            </a>

            @endif




            </div>

            @can('add_listing')

                <a href="#" onclick="event.preventDefault();show_duplicate_div()" type="button" class="btn btn-success waves-effect waves-light">
                    <i class="fe-plus-square"></i> @lang('listing.duplicate')
                </a>
                <a href="{{ url('listing/create/'.$agency) }}" type="button" class="btn btn-info waves-effect waves-light">
                    <i class="fe-plus-square"></i> @lang('listing.add_listing')
                </a>                
            @endcan
        </div>

        @can('add_listing')
        <div class="mb-2 duplicate-listing  d-none"    >
           <div class="row">
                  <div class="col-md-4 offset-md-8">
             
                    <select 
                    onchange="event.preventDefault();generate_duplicate_link('{{ url('listing/create/'.$agency) }}')"
                    class="form-control select2 duplicate-listing-select" data-placeholder="@lang('listing.select_ref')"  data-toggle="select2">
                     <option value=""></option>
                        @forelse($ref_ids as $id)
                            <option value="{{$id}}" > {{$id}} </option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="col-md-4 offset-md-8">
                <span>

                    <a href="" class="duplicate-link">
                        @lang('listing.duplicate')
                    </a>
                   
                </span>
                </div>
            </div>  
        </div>
        
        @endcan

        <div class="show-fliter-div d-none" >
          @include('listing::listing.filter')
         </div>

       <button type='button' class="btn btn-primary mt-1 mb-2 show-search-button" onclick="show_filter_div()">
           @lang('listing.advanced_search')
       </button>
       <button type='button' class="btn btn-secondary mt-1 mb-2 hide-search-button d-none" onclick="show_filter_div()">
           @lang('listing.close_search')
       </button>
        <div class="table-responsive">
            <table class="table table-bordered toggle-circle mb-0" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th># </th>
                        <th>  </th>
                        <th> @lang('listing.id') </th>
                        <th> @lang('listing.purpose') </th>
                        <th> @lang('listing.type') </th>
                        <th> @lang('listing.location') </th>
                        <th> @lang('listing.area') </th>

                        <th> @lang('listing.price') </th>
                        <th> @lang('listing.assigned') </th>
                        <th> @lang('listing.updated') </th>
                        <th> @lang('listing.status') </th>
                        <th> @lang('listing.advertise') </th>
                        <th> @lang('listing.controlls') </th>


                    </tr>
                    </thead>
                    <tbody>
                    @if($listings)
                    @forelse($listings as $listing)

                        <tr>
                            <td>{{ $loop->iteration }}

                                <input type="checkbox" onchange="viewFloatModal({{ $listing->id }})" />
                            
                            </td>
                            <td>
                                <i class="fas fa-plus-circle cursor-pointer show-hidden-data-{{ $listing->id }}" onclick="show_data({{ $listing->id }})"></i>
                                <i class="fas fa-minus-circle cursor-pointer d-none hide-data-{{ $listing->id }}" onclick="hide_data({{ $listing->id }})"></i>
                                @php 
                                $photo_table = $listing->photos->where('photo_main','yes')->first();
                                @endphp

                                @if($photo_table)
                                    @if($photo_table->active == 'main')
                                        <a target="_blank" href="{{  asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo_table->id.'/'.$photo_table->main) }}">


                                
                                        <img 
                                        class="w-100 table-image"

                                        src="{{  asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo_table->id.'/'.$photo_table->icon) }}" alt="">

                                        </a>
                                    @else
                                        <a
                                         target="_blank"
                                         href="{{  asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo_table->id.'/'.$photo_table->watermark) }}">
                                        <img
                                        class="w-100 table-image"
                                        src="{{  asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo_table->id.'/'.$photo_table->icon) }}" alt="">
                                        </a>
                                    

                                    @endif
                                @endif
                            </td>
                            <td >
                                <a target="_blank" href="{{ route('listings.front',[$listing->id,$listing->listing_ref]) }}">{{ $listing->listing_ref }}</a></td>
                            <td>{{ Str::ucfirst($listing->purpose) }}</td>
                            <td>{{ $listing->type ? $listing->type->{'name_'.app()->getLocale()} : '' }}</td>
                            {{--@dd($listing)--}}
                            <td>

                                  <span
                                  class="cursor-pointer"
                                  data-plugin="tippy"
                                data-tippy-placement="top-start"
                               title="{{  ($listing->city && $listing->city->{'name_'.app()->getLocale()} ? $listing->city->{'name_'.app()->getLocale()} : '') .' , '. ($listing->community && $listing->community->{'name_'.app()->getLocale()} ? $listing->community->{'name_'.app()->getLocale()} : '' ).' , '. ($listing->subCommunity && $listing->subCommunity->{'name_'.app()->getLocale()} ? $listing->subCommunity->{'name_'.app()->getLocale()} : '' ).' , '.$listing->location ?? '' }}"
                                >
                                 {{ Str::words($listing->location,3,'...') }}
                                </span>
                         </td>
                            <td class="listing-agent-table-area-{{ $listing->id }}"> {{ number_format($listing->area)  }}</td>
                            <td class="listing-agent-table-price-{{ $listing->id }}">{{ number_format($listing->price) }}</td>
                            <td class="listing-agent-table-name-{{ $listing->id }}">{{ ucfirst( $listing->agent->{'name_'.app()->getLocale()} ) }}</td>
                            <td>{{ $listing->updated_at->toFormattedDateString() }}</td>
                            <td>
                                @can('edit_listing')

                                    <select onchange="show_status_modal('{{ $listing->id }}',this)" id="modify_listing_status_{{ $listing->id }}"
                                         class="form-control mb-0 show-tick"   data-style="btn-outline-secondary">
                                        <option value=""></option>
                                        <option  value="draft" @if($listing->status == 'draft') selected @endif >@lang('listing.draft')</option>
                                        <option  value="live"  @if($listing->status == 'live') selected @endif>@lang('listing.live')</option>
                                        <option  value="archive" @if($listing->status == 'archive') selected @endif>@lang('listing.archive')</option>
                                        <option  value="review" @if($listing->status == 'review') selected @endif>@lang('listing.review')</option>

                                    </select>

                                @else

                                    {{ Str::ucfirst($listing->status) }}
                                @endcan



                            </td>
                            <td>
                                @include('listing::listing.advertise')
                            </td>

                            <td>
                                @include('listing::listing.controlls')
                            </td>





                    </tr>

                    <tr  class=" more_info_{{ $listing->id }} d-none"  >
                        <td colspan="2"></td>

                        <td colspan="11">

                           <div class="d-flex justify-content-start">
                            <i


                             data-plugin="tippy"
                             data-tippy-placement="top-start"
                             title="@lang('listing.matching_lead')"

                             class="fas fa-flag cursor-pointer feather-16 px-1">
                             0
                          </i>
                            <i

                             data-plugin="tippy"
                             data-tippy-placement="top-start"
                             title="@lang('listing.beds')"

                             class="fas fa-bed cursor-pointer feather-16 px-1">
                             {{ $listing->beds ?? 0 }}
                          </i>
                            <i

                             data-plugin="tippy"
                             data-tippy-placement="top-start"
                             title="@lang('listing.parkings')"

                             class="fas fa-car cursor-pointer feather-16 px-1">
                             {{ $listing->parkings ?? 0 }}
                          </i>
                            <i

                             data-plugin="tippy"
                             data-tippy-placement="top-start"
                             title="@lang('listing.video')"

                             class="fas fa-video cursor-pointer feather-16 px-1">
                            {{ $listing->videos ? $listing->videos->count() : 0 }}
                          </i>
                            <i

                             data-plugin="tippy"
                             data-tippy-placement="top-start"
                             title="@lang('listing.added_by')"

                             class="far fa-user cursor-pointer feather-16 px-1">
                             {{ $listing->addedBy ? Str::ucfirst( $listing->addedBy->{'name_'.app()->getLocale()} ) : '' }}
                          </i>

                           </div>

                        </td>
                    </tr>

                    @can('edit_listing')

                        {{-- <tr class="table-row_{{ $listing->id }} edit_listing_{{ $listing->id }}
                            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $listing->id ))  @else d-none @endif
                            "
                             >
                            <td colspan="13">

                                @include('listing::listing.edit.index')

                            </td>
                        </tr> --}}


                        <tr class="load_edit_listing_{{ $listing->id }} d-none  ">
                            <td colspan="13" class="load_edit_listing_show_{{ $listing->id }}">
                                <div class="lds-ring-row-{{ $listing->id }} row d-none justify-content-center">

                                    <div class="lds-facebook"><div></div><div></div><div></div></div>
                                </div>
                                {{-- @include('listing::listing.edit.index') --}}

                            </td>
                        </tr>



                        <tr  class="table-row_{{ $listing->id }} portals_{{ $listing->id }}
                            @if( (session()->has('open-portals-tab') && session('open-portals-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="13">

                                @include('listing::listing.portals')

                            </td>
                        </tr>

                        <tr  class="table-row_{{ $listing->id }} notes_{{ $listing->id }}
                            @if( (session()->has('open-notes-tab') && session('open-notes-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="13">

                                @include('listing::listing.notes')

                            </td>
                        </tr>
                        <tr  class="table-row_{{ $listing->id }} borchures_{{ $listing->id }}
                            @if( (session()->has('open-borchures-tab') && session('open-borchures-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="13">

                                @include('listing::listing.borchures')

                            </td>
                        </tr>



                        <tr  class="table-row_{{ $listing->id }} task_{{ $listing->id }}

                            @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $listing->id ))
                            @else d-none @endif

                            "  >
                            <td colspan="13">

                                @include('listing::listing.tasks.tasks')

                            </td>
                        </tr>

                    @endcan


               




                @empty
                @endforelse
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-between">

                <div class="mt-2">

                    @if($pagination)
                    {{ $listings->links() }}
                    @endif

                </div>
                {{-- @can('can_generate_reports')
                    <a
                            data-plugin="tippy"
                            data-tippy-placement="bottom-start"
                            title="@lang('listing.export_help')" href="{{ url('listing/export_all/'.request('agency')) }}"
                            class="mt-2">@lang('listing.generate_report')
                    </a>
                @endcan --}}
            </div>
        </div>

    </div>
    @include('listing::listing.settings_modals')
    @include('listing::listing.shortcut_modals')

@endsection

@push('js')


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>


    <script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>


    {{-- <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script> --}}


    <script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
    <script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>
    <script src="{{ asset('assets/js/modals.js') }}"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function () {
            // var agency_region = @json($agency_region);
            // var agency_language = @json($agency_language);
            // var map_key = @json(env('GOOGLE_API_KEY'));
            // injectGoogleMapsApiScript({
            //         key        :  map_key,
            //         libraries  : 'places',
            //         language   : agency_language,
            //         region     : agency_region,
            //         callback   : 'initMap'
            //     });
            ClassicEditor
                    .create(document.querySelector('#description_en'))
                    .then(
                    
                    )
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#description_ar'), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });

            $('.select2').select2();
            $('.select2-multiple').select2();
            $(".basic-datepicker").flatpickr();
            $(".clockpicker").clockpicker({
                twelvehour :false
            });

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

        function toggle_desc() {
            type = $('.description').prop('checked');
            if (type == true) {
                //english
                $('.description_en').removeClass('d-none');
                $('.description_ar').addClass('d-none');
                $('.en-button').removeClass('d-none');
                $('.ar-button').addClass('d-none');

                $('.profile-en').removeClass('d-none');
                $('.profile-ar').addClass('d-none');
                $('.features_copy_en').removeClass('d-none');
                $('.features_copy_ar').addClass('d-none');
                $('.templates-en').removeClass('d-none');
                $('.templates-ar').addClass('d-none');
            } else {
                $('.description_en').addClass('d-none');
                $('.description_ar').removeClass('d-none');
                $('.ar-button').removeClass('d-none');
                $('.en-button').addClass('d-none');

                $('.profile-ar').removeClass('d-none');
                $('.profile-en').addClass('d-none');
                $('.features_copy_ar').removeClass('d-none');
                $('.features_copy_en').addClass('d-none');

                $('.templates-ar').removeClass('d-none');
                $('.templates-en').addClass('d-none');


            }
        }



        function toggle_edit_desc(id) {
            type = $('.edit-toggle-description-' + id).prop('checked');
            if (type == true) {
                //english
                $('.edit_description_en_' + id).removeClass('d-none');
                $('.edit_description_ar_' + id).addClass('d-none');

                $('.en-button-'+id).removeClass('d-none');
                $('.ar-button-'+id).addClass('d-none');

                $('.profile-en-'+id).removeClass('d-none');
                $('.profile-ar-'+id).addClass('d-none');
                $('.features_copy_en_'+id).removeClass('d-none');
                $('.features_copy_ar_'+id).addClass('d-none');
                $('.templates-en-'+id).removeClass('d-none');
                $('.templates-ar-'+id).addClass('d-none');
            } else {
                $('.edit_description_en_' + id).addClass('d-none');
                $('.edit_description_ar_' + id).removeClass('d-none');

                $('.ar-button-'+id).removeClass('d-none');
                $('.en-button-'+id).addClass('d-none');

                $('.profile-ar-'+id).removeClass('d-none');
                $('.profile-en-'+id).addClass('d-none');
                $('.features_copy_ar_'+id).removeClass('d-none');
                $('.features_copy_en_'+id).addClass('d-none');

                $('.templates-ar-'+id).removeClass('d-none');
                $('.templates-en-'+id).addClass('d-none');


            }
        }





      
    </script>



<script>






    function editSplitLatLng(latLng,id){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude_"+id).val(lat);
        $("#longitude_"+id).val(Lng);
    }




function removePhoto(input,table){
    var id         = input.id
    var sliced_id  = id.slice(7);
    var  photo_id = $('#'+sliced_id+' .photo-id').val();
    $.ajax({
        url:'{{  route("listings.remove-listing-temporary") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : photo_id,
            type  : 'photo',
            table : table

        },
        success: function(data){

            $('#'+sliced_id).remove();

        },
        error: function(error){

        },
    })

}


function removeDocument(input,table){

            var id         = input.id
            var sliced_id  = id.slice(7);
            var  document_id = $('#'+sliced_id+' .document-id').val();
            $.ajax({
                url:'{{  route("listings.remove-listing-temporary") }}',
                type:'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id    : document_id,
                    type  : 'document',
                    table : table

                },
                success: function(data){

                    $('#'+sliced_id).remove();

                },
                error: function(error){

                },
            })

}


function removePlan(input,table){
            var id         = input.id
            var sliced_id  = id.slice(7);
            var  plan_id = $('#'+sliced_id+' .plan-id').val();
            $.ajax({
                url:'{{  route("listings.remove-listing-temporary") }}',
                type:'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id    : plan_id,
                    type : 'plan',
                    table : table

                },
                success: function(data){

                    $('#'+sliced_id).remove();

                },
                error: function(error){

                },
            })

}


function modifyName(id,table,type){

    var title = $('#rename_' + id.id).val();

    if(title === ''){
        return;
    }
    $.ajax({
        url:'{{  route("listings.modify-listing-title") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : id.id,
            title : title,
            table : table,
            type  : type
        },
        success: function(data){
        $('#rename_' + id.id).val('');
        $('#title_' + id.id).text(title);
        $('#save_success_' + id.id).text(data.message);
        $('#save_success_' + id.id).removeClass('d-none');
        setTimeout(function () {
            $('#save_success_' + id.id).addClass('d-none');
        },2000)

        },
        error: function(error){

        },
    })
}

function togglePlanWatermark(input,table){
        var id         = input.id
        var sliced_id  = id.slice(10);
        var  plan_id = $('#'+sliced_id+' .plan-id').val();


    $.ajax({
        url:'{{  route("listings.update-listing-temporary-active") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : plan_id,
            type : 'plan',
            table : table

        },
        success: function(data){

            $('#'+sliced_id+' .plan-with-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-no-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-with-enlarg-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-no-enlarg-watermark').toggleClass('d-none')



        },
        error: function(error){

        },
    })


}

function toggleWatermark(input,table){

    var id         = input.id
    var sliced_id  = id.slice(10);
    var  photo_id = $('#'+sliced_id+' .photo-id').val();


 $.ajax({
        url:'{{  route("listings.update-listing-temporary-active") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : photo_id,
            type:'photo',
            table:table

        },
        success: function(data){

            $('#'+sliced_id+' .with-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .with-enlarg-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-enlarg-watermark').toggleClass('d-none')



        },
        error: function(error){

        },
    })

    }



    


   function updateListingCategory(input,table){

    var id         = input.id
    var sliced_id  = id.slice(17);
    var  photo_id = $('#uploaderFile'+sliced_id+' .photo-id').val();


    var category_id = $('#'+input.id).val()

 

        $.ajax({
        url:'{{  route("listings.update-listing-temporary-category") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id          : photo_id,
            category_id : category_id,
            table : table
       
        },
        success: function(data){

            toast(data.message,'success')
        },
        error: function(error){

        },
    })

        
    }

 
</script>
@endpush


@push('js')
    <script>

        function editshowCompanyProfile(inputSelf,type,id){

                if(type == 'ar'){

                    if( $('.agency-profile-ar-'+id).data('agencyprofile') === ''){
                    var message = @json(trans('listing.no_arabic_profile_for_agency'));
                    $('.agency-profile-message-ar-'+id).text(message)
                    return;
                    }

                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+' .edit_description_ar_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agency-profile-ar-'+id).data('agencyprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);

                
                }else{
                    if( $('.agency-profile-en-'+id).data('agencyprofile') === ''){
                    var message = @json(trans('listing.no_english_profile_for_agency'));
                    $('.agency-profile-message-en-'+id).text(message)
                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+'  .edit_description_en_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agency-profile-en-'+id).data('agencyprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);

                  
                }

        }

        function editshowAgentProfile(inputSelf,type,id){


            if(type == 'ar'){
                if($('.agent-profile-ar-'+id).find(':selected').data('agentprofile') == ''){
                    var message = @json(trans('listing.no_arabic_profile_for_agent'));
                    $('.agent-profile-message-ar-'+id).text(message)
                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+' .edit_description_ar_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agent-profile-ar-'+id).find(':selected').data('agentprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);

                    $('.agent-profile-ar-'+id).val('');
                }else{
                       if($('.agent-profile-en').find(':selected').data('agentprofile') == ''){
                            var message = @json(trans('listing.no_english_profile_for_agent'));
                            $('.agent-profile-message-en-'+id).text(message)
                            return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+'  .edit_description_en_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agent-profile-en-'+id).find(':selected').data('agentprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);

                    $('.agent-profile-en-'+id).val('');
                }
        }



     

        function editshowTemplates(type,id){
            if(type == 'ar'){
                if($('.load-templates-ar-'+id).find(':selected').data('desctemplate') == ''){

                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+' .edit_description_ar_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.load-templates-ar-'+id).find(':selected').data('desctemplate'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);

                    $('.load-templates-ar-'+id).val();
                }else{
                    // typeof car.color === 'undefined'
                       if($('.load-templates-en-'+id).find(':selected').data('desctemplate') == ''){

                            return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal-'+id+'  .edit_description_en_'+id+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.load-templates-en-'+id).find(':selected').data('desctemplate'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);
                    $('.load-templates-en-'+id).val();
                }


        }

        function save_note(id){
            var note = $('.note-to-save-'+id).val();
                console.log(note)
                if(note == ''){
                    var message = @json(trans('listing.fill_the_note'));
                    $('.note-to-save-message-'+id).text(message)
                    return ;
                }
            $.ajax({
                    url:'{{  route("listings.save_note") }}',
                    type:'POST',
                    data:{
                        _token: '{{ csrf_token() }}',
                        id    : id,
                        note  : note,

                    },
                    success: function(data){
                        var locale = @json(app()->getLocale());
                        $('.note-to-save-message-'+id).text();
                        $('.note-to-save-message-'+id).text();

                        var htmlTr = '';
                         htmlTr += '<tr>';
                          htmlTr += '<td>'  ;

                           htmlTr += data.added_by ;

                          htmlTr += '</td>'  ;
                          htmlTr += '<td>'  ;
                            htmlTr += data.created_at ;
                          htmlTr += '</td>' ;
                          htmlTr += '<td>'  ;
                          htmlTr += data.note ;
                          htmlTr += '</td>' ;
                         htmlTr += '</tr>';

                        $('.note-list-'+id+' > tbody:last-child').append(htmlTr);

                            toast(data.message,'success');

                    },
                    error: function(error){
                    toast(error.responseJSON.message,'error');
                    },
                })
        }

        function show_data(id){
            $('.show-hidden-data-'+id).addClass('d-none');
            $('.hide-data-'+id).removeClass('d-none');
            $('.more_info_'+id).removeClass('d-none');
        }
        function hide_data(id){
            $('.show-hidden-data-'+id).removeClass('d-none');
            $('.hide-data-'+id).addClass('d-none');
            $('.more_info_'+id).addClass('d-none');

        }


      



            var currencyFormatter = new Intl.NumberFormat('en-EG', {
    //   style: 'currency',
    //   currency: 'EGP',
    });


        function updatePriceEdit(id) {
            
            let price = +document.getElementById(`rent-sale_${id}`).value;
            let annualCommissionPercentage = +(document.getElementById(`annual-commission_${id}`).value) / 100;
            let depositPercenatage = +(document.getElementById(`deposit-percenatage_${id}`).value) / 100;
            
            document.getElementById(`commissionValue_${id}`).value = currencyFormatter.format(annualCommissionPercentage * price);
           
            document.getElementById(`depositValue_${id}`).value = currencyFormatter.format(depositPercenatage * price);
        }
    
    
    </script>


<script>

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


@endpush