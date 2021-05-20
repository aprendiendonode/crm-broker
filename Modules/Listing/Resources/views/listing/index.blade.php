@extends('layouts.master')

@section('title',trans('listing.listings'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    {{-- <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    
    {{-- <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">
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

    {{-- <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    --}}
    @endsection
 

@section('content')

{{-- <div id="tasksFor-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tasksFor-modalLabel"
   aria-hidden="true">
  <div class="modal-dialog modal-full-width">
      <div class="modal-content">
          <div class="modal-header py-2">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <div class="text-center mb-4">
                  <i class="far fas fa-tasks fa-2x"></i>
                  <h4>Tasks For (122-VI-R-1160)</h4>
              </div>
              <h5 class="border-bottom pb-1">ADD NEW TASK (VIEWING)</h5>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="mb-1 font-weight-medium text-muted" style="flex:1;">Type*</label>
                          <div style="flex:2;">
                              <select class="form-control select2" name="Type2" data-toggle="select2"
                                      data-placeholder="select">
                                  <option value="">1</option>
                                  <option value="1">2</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label>Contact</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <button class="input-group-text" onclick="event.preventDefault()"
                                          id="basic-addon1">
                                      <i class="fas fa-plus-circle"></i>
                                  </button>
                              </div>
                              <input type="text" class="form-control" placeholder="Search Contacts"
                                     aria-label="Username"
                                     aria-describedby="basic-addon1">
                          </div>
                      </div>
                      <div class="form-group mb-2">
                          <label class="font-weight-medium text-muted">Status*</label>
                          <input type="text" class="form-control" name="status1" id="status1">
                      </div>
                      <div class="form-group mb-2">
                          <label class="font-weight-medium text-muted">Note</label>
                          <textarea class="form-control" name="note3" id="" cols="3" rows="3"></textarea>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="mb-1 font-weight-medium text-muted" style="flex:1;">Staff*</label>
                          <div style="flex:2;">
                              <select class="form-control select2" name="Staff2" data-toggle="select2"
                                      data-placeholder="select">
                                  <option value="">1</option>
                                  <option value="1">2</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="example-date">Date</label>
                          <input class="form-control" id="taskDueDate" type="date" name="date">
                      </div>
                      <div class="form-group">
                          <label class="font-weight-medium text-muted" style="flex:1">Time*</label>
                          <div class="form-group">
                              <div class="input-group mb-2 mr-sm-2">
                                  <input type="text" class="form-control" id="permit1"
                                         data-tippy-placement="top-start" title="">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text" data-plugin="tippy"
                                           data-tippy-placement="top-start" data-tippy=""
                                           data-original-title="Validate">
                                          <i class="far fa-clock"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="checkbox checkbox-primary mb-2">
                          <input id="customizedReminder" type="checkbox">
                          <label for="customizedReminder">
                              Customized Reminder
                          </label>
                      </div>
                      <div class="mt-3 d-flex justify-content-end">
                          <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Cancel
                          </button>
                          <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
              </div>
              <table class="table table-striped" style="table-layout: fixed">
                  <thead>
                  <tr>
                      <th scope="col">
                          <div class="checkbox checkbox-single checkbox-primary">
                              <input id="tasksForTableCheck" type="checkbox">
                              <label for="tasksForTableCheck"></label>
                          </div>
                          <!-- <div class="checkbox checkbox-single">
                              <input type="checkbox" id="singleCheckbox1" value="option1" aria-label="Single checkbox One">
                              <label></label>
                          </div> -->
                      </th>
                      <th scope="col">#</th>
                      <th scope="col">Type</th>
                      <th scope="col">TASK AGAINST</th>
                      <th scope="col">STAFF</th>
                      <th scope="col">ADDED BY</th>
                      <th scope="col">DATE ADDED</th>
                      <th scope="col">DEADLINE</th>
                      <th scope="col">LATEST NOTE</th>
                      <th scope="col">STATUS</th>
                      <th scope="col">CONSTROLS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr></tr>
                  </tbody>
              </table>
          </div>
          <!--  <div class="modal-footer">
              <button type="button" class="btn btn-primary">Done</button>
          </div> -->
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> --}}

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
                <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                    <i class="fe-plus-square"></i> ADD LISTING
                </button>
            @endcan
        </div>

        @can('add_listing')
            <div class="mb-2 add_listing " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
                @include('listing::listing.create.index')
            </div>
        @endcan


        @include('listing::listing.filter')

        <div class="table-responsive">
            <table class="table table-bordered toggle-circle mb-0">
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
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <i class="fas fa-plus-circle cursor-pointer show-hidden-data-{{ $listing->id }}" onclick="show_data({{ $listing->id }})"></i>
                                <i class="fas fa-minus-circle cursor-pointer d-none hide-data-{{ $listing->id }}" onclick="hide_data({{ $listing->id }})"></i>
                            </td>
                            <td>{{ $listing->listing_ref }}</td>
                            <td>{{ Str::ucfirst($listing->purpose) }}</td>
                            <td>{{ $listing->type ? $listing->type->{'name_'.app()->getLocale()} : '' }}</td>
                            <td>
                                  <span
                                  class="cursor-pointer"
                                  data-plugin="tippy" 
                                data-tippy-placement="top-start" 
                                title="{{ $listing->location }}"
                                >
                                 {{ Str::words($listing->location,2,'...') }}
                                </span>
                         </td>
                            <td>{{ number_format($listing->area)  }}</td>
                            <td>{{ number_format($listing->price) }}</td>
                            <td>{{ $listing->agent->{'name_'.app()->getLocale()} }}</td>
                            <td>{{ $listing->updated_at->toFormattedDateString() }}</td>
                            <td>
                                @can('edit_listing')
                               
                                    <select onchange="show_status_modal({{ $listing->id }},this)" id="modify_listing_status_{{ $listing->id }}"
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
                    @can('edit_listing')
                    
                        <tr class="table-row_{{ $listing->id }} edit_listing_{{ $listing->id }}
                            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $listing->id ))  @else d-none @endif
                            "
                             >
                            <td colspan="14">

                                @include('listing::listing.edit.index')

                            </td>
                        </tr>



                        <tr  class="table-row_{{ $listing->id }} portals_{{ $listing->id }}    
                            @if( (session()->has('open-portals-tab') && session('open-portals-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="14">
                                
                                @include('listing::listing.portals')
                                
                            </td>
                        </tr>

                        <tr  class="table-row_{{ $listing->id }} notes_{{ $listing->id }}    
                            @if( (session()->has('open-notes-tab') && session('open-notes-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="14">
                                
                                @include('listing::listing.notes')
                                
                            </td>
                        </tr>
                        <tr  class="table-row_{{ $listing->id }} borchures_{{ $listing->id }}    
                            @if( (session()->has('open-borchures-tab') && session('open-borchures-tab') ==  $listing->id ))
                              @else d-none @endif
                            "   >
                            <td colspan="14">
                                
                                @include('listing::listing.borchures')
                                
                            </td>
                        </tr>



                        <tr  class="table-row_{{ $listing->id }} task_{{ $listing->id }}
        
                            @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $listing->id ))
                            @else d-none @endif
                            
                            "  >
                            <td colspan="14">
                                
                                @include('listing::listing.tasks.tasks')
                                
                            </td>
                        </tr>

                    @endcan

                  
                    <tr  class=" more_info_{{ $listing->id }} d-none"  >
                        <td colspan="2"></td>
                       
                        <td colspan="12">
                            
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
                             {{ $listing->addedBy ? $listing->addedBy->{'name_'.app()->getLocale()} : '' }}
                          </i>
                          
                           </div>
                            
                        </td>
                    </tr>
               
                    
              
                
                
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
                @can('can_generate_reports')
                    <a
                            data-plugin="tippy"
                            data-tippy-placement="bottom-start"
                            title="@lang('listing.export_help')" href="{{ url('listing/export_all/'.request('agency')) }}"
                            class="mt-2">@lang('listing.generate_report')
                    </a>
                @endcan
            </div>
        </div>

    </div>
    @include('listing::listing.settings_modals')

@endsection

@push('js')


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

    
    <script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>


    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
 

    <script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
    <script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>

  {{--   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language=ar&region=EG&callback=initMap"
     async >
    </script> --}}
    
    <script>
        $(document).ready(function () {
         
            $('.select2').select2();
            $('.select2-multiple').select2();
            $(".basic-datepicker").flatpickr();
            $(".clockpicker").clockpicker({
                twelvehour :false
            });

      /*       var listings = @json($listings);
            for (var i = 0; i < listings.data.length; i++) {

                ClassicEditor
                    .create(document.querySelector('#edit_description_en_' + listings.data[i].id))
                    .then()
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#edit_description_ar_' + listings.data[i].id), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });
            }
 */

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
      var  CkEditorScriptIsInjected   = false;
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

            function injectCkeditor(){
                if(CkEditorScriptIsInjected){
                return;
            }

                const url  =  "https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js";
                const url2 = "https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js";
                const url3 = "https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js";

                const script = document.createElement('script');
                const script2 = document.createElement('script');
                const script3 = document.createElement('script');

                script.setAttribute('src', url);
                script2.setAttribute('src', url2);
                script3.setAttribute('src', url3);
       
                document.head.appendChild(script);
                document.head.appendChild(script2);
                document.head.appendChild(script3);

              

              
                    ClassicEditor
                    .create(document.querySelector('#description_en'))
                    .then()
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#description_ar'), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });

                    CkEditorScriptIsInjected = true;
            
             
                }



        function show_add_div() {
            var div = document.querySelector('.add_listing');
            if (div.style.display === 'none') {

                injectGoogleMapsApiScript({
                    key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries: 'places',
                    language: 'ar',
                    region: 'EG',
                    callback: 'initMap',
                });
                injectCkeditor();


                div.style.display = 'block';

                setTimeout(function () {

                    div.style.opacity = 1;

                }, 10);
            } else {
                div.style.display = 'none';
                setTimeout(function () {

                    div.style.opacity = 0;


                }, 10);

            }

        }


        function hide_add_div() {
            var div = document.querySelector('.add_listing');

            div.style.display = 'none';
            setTimeout(function () {

                div.style.opacity = 0;


            }, 10);


        }


        function show_edit_div(id) {
            var div = document.querySelector('.edit_listing_' + id);
            if (div.style.display === 'none') {


                div.style.display = '';

                setTimeout(function () {

                    div.style.opacity = 1;

                }, 10);
            } else {
                div.style.display = 'none';
                setTimeout(function () {

                    div.style.opacity = 0;


                }, 10);

            }

        }


        function hide_edit_div(id) {
            var div = document.querySelector('.edit_listing_' + id);

            div.style.display = 'none';
            setTimeout(function () {

                div.style.opacity = 0;


            }, 10);


        }
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

                $('.agent-profile-en').removeClass('d-none');
                $('.agent-profile-ar').addClass('d-none');
                $('.features_copy_en').removeClass('d-none');
                $('.features_copy_ar').addClass('d-none');
                $('.templates-en').removeClass('d-none');
                $('.templates-ar').addClass('d-none');
            } else {
                $('.description_en').addClass('d-none');
                $('.description_ar').removeClass('d-none');
                $('.ar-button').removeClass('d-none');
                $('.en-button').addClass('d-none');

                $('.agent-profile-ar').removeClass('d-none');
                $('.agent-profile-en').addClass('d-none');
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

                $('.agent-profile-en-'+id).removeClass('d-none');
                $('.agent-profile-ar-'+id).addClass('d-none');
                $('.features_copy_en_'+id).removeClass('d-none');
                $('.features_copy_ar_'+id).addClass('d-none');
                $('.templates-en-'+id).removeClass('d-none');
                $('.templates-ar-'+id).addClass('d-none');
            } else {
                $('.edit_description_en_' + id).addClass('d-none');
                $('.edit_description_ar_' + id).removeClass('d-none');

                $('.ar-button-'+id).removeClass('d-none');
                $('.en-button-'+id).addClass('d-none');

                $('.agent-profile-ar-'+id).removeClass('d-none');
                $('.agent-profile-en-'+id).addClass('d-none');
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
            
                //TODO request ajax to change which one of the should be on to use later
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
            
           //TODO request ajax to change which one of the should be on to use later

            $('#'+sliced_id+' .with-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .with-enlarg-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-enlarg-watermark').toggleClass('d-none')


        
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
                }else{
                    // typeof car.color === 'undefined'
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
                }
        }


    
        function editloadCheckedFeatures(type,id){


            
            var  checkboxesFeature = $('.choosen-features-'+id+':checkbox:checked ').map(function() {
                var name = this.name.replace('"',""); 
                name = name .replace('edit_features_'+id,""); 
                name = name .replace("[",""); 
                name = name .replace("]",""); 
                name = name .replace(/_/g," "); 

                const words = name.split(" ");

                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                }

                  name = words.join(" ");
               
                return name;
            }).get();
           var  inputsFeature = $('.choosen-features-inputs-'+id).map(function() {

                        if(this.value != ''){

                            var name = this.name.replace('"',""); 
                            name = name .replace('edit_features_'+id,""); 
                            name = name .replace("[",""); 
                            name = name .replace("]",""); 
                            name = name .replace(/_/g," "); 

                            const words = name.split(" ");

                            for (let i = 0; i < words.length; i++) {
                                words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                            }

                            name = words.join(" ");
                        
                           
                            return name+' ( '+ this.value +')';
                        }
                                          
                }).get();

           var  selectsFeature = $('.choosen-features-select-'+id).map(function() {
            if(this.value != ''){
                var name = this.name.replace('"',""); 
                name = name .replace('edit_features_'+id,""); 
                name = name .replace("[",""); 
                name = name .replace("]",""); 
                name = name .replace(/_/g," "); 

                const words = name.split(" ");

                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                }

                  name = words.join(" ");
               
                return name+' ( '+ this.value +')';
            }
                          
             
              }).get(); 

             var merged =  inputsFeature.concat(checkboxesFeature);
             var all =  merged.concat(selectsFeature);
           
              if(all.length > 0){
                  
                  var ul_html = '';
                  ul_html+= '<ul>';
                        for (let index = 0; index < all.length; index++) {
                           
                            ul_html += '<li>' + all[index]+'</li>'; 
                            
                        }
    
                  ul_html+= '</ul>';
                  const domEditableElement = document.querySelector( '.description-profile-modal-'+id+' .edit_description_'+type+'_'+id+' .ck-editor__editable' );

                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView(ul_html);
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition); 
              }else {
                
                            var message = @json(trans('listing.choose_features_to_copy'));
                            $('.features_copy_message_'+type+'_'+id).text(message)
                            return;
               
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
    </script>
@endpush