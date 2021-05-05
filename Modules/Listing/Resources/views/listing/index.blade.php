@extends('layouts.master')

@section('title',trans('listing.listings'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">
   
    @endsection
 

@section('content')


   <!-- icons -->
   <div id="notesFor-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notesFor-modalLabel"
   aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header py-2">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <div class="text-center mb-4">
                  <i class="far fa-file-pdf fa-2x"></i>
                  <h4>Notes For (122-VI-R-1160)</h4>
              </div>
              <h5 class="border-bottom pb-1">ADD NEW NOTE</h5>
              <div class="form-group mb-2">
                  <label class="font-weight-medium text-muted">Note*</label>
                  <textarea class="form-control" name="note2" id="" cols="3" rows="3"></textarea>
              </div>
              <div class="mt-3 d-flex justify-content-end">
                  <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Submit</button>
              </div>
              <h5 class="mb-2">NOTES LIST</h5>
              <table class="table table-striped" style="table-layout: fixed">
                  <thead>
                  <tr>
                      <th scope="col">ADDED BY</th>
                      <th scope="col">DATE ADDED</th>
                      <th scope="col">NOTE</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>Ahmed Amin Ayad</td>
                      <td>2021-03-01 3:45:12</td>
                      <td>
                       
                          <div>
                              Note
                          </div>
                      </td>
                  </tr>
                  </tbody>
              </table>

          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn btn-primary">Done</button>
          </div> -->
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="tasksFor-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tasksFor-modalLabel"
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
</div><!-- /.modal -->

    <div class="content p-3">


        <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d-flex flex-wrap">
                <a href="" class="list-link active">
                    <i class="fas fa-info-circle mr-1"></i>
                    <div>LIVE(8)</div>
                </a>
                <a href="" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>DRAFT(8)</div>
                </a>
                <a href="" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>ARCHIVE(8)</div>
                </a>
                <a href="" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>ALL(8)</div>
                </a>
                <a href="" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>REVIEW(8)</div>
                </a>

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

        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                    <tr>
                        <th>@lang('listing.id') </th>
                        <th> @lang('listing.purpose') </th>
                        <th> @lang('listing.type') </th>
                        <th> @lang('listing.beds') </th>
                        <th> @lang('listing.location') </th>
                        <th> @lang('listing.area') </th>
    
                        <th> @lang('listing.price') </th>
                        <th> @lang('listing.assigned') </th>
                        <th> @lang('listing.updated') </th>
                        <th> @lang('listing.status') </th>
                        <th> @lang('listing.controlls') </th>
                        <th> @lang('listing.advertise') </th>
                      
    
                    </tr>
                    </thead>
                    <tbody>
    
                    @forelse($listings as $listing)
                {{--     @php
                        $views = $listing->view_ids;
                        var_dump($views);
                        dd();
                    @endphp --}}
               {{-- @dd(in_array( 1,old('edit_view_ids_'.$listing->id,  $views )) ) --}}
                        <tr>
                            <td>{{ $listing->ref }}</td>
                            <td>{{ $listing->purpose }}</td>
                            <td>{{ $listing->type_id }}</td>
                            <td>{{ $listing->beds }}</td>
                            <td>{{ $listing->location }}</td>
                            <td>{{ $listing->area }}</td>
                            <td>{{ $listing->price }}</td>
                            <td></td>
                            <td>{{ $listing->updated_at }}</td>
                            <td>{{ $listing->status }}</td>
                            <td>
                                @include('listing::listing.controlls')
                            </td>
                        <td>
                            @can('edit_listing')
                                <i
                                        onclick="event.preventDefault();show_edit_div({{ $listing->id }})"
                                        data-plugin="tippy"
                                        data-tippy-placement="top-start"
                                        title="Edit"
                                        class="fa fa-edit cursor-pointer feather-16">
                                </i>
                            @endcan

                   
                            @can('delete_listing')
                                <i
                                        data-plugin="tippy"
                                        data-tippy-placement="top-start"
                                        title="@lang('agency.delete_listing')"
                                        data-toggle="modal" data-target="#delete-alert-modal_{{ $listing->id }}"

                                        class="fe-trash cursor-pointer feather-16">
                                </i>
                           @endcan


            

                        </td>


                        @include('listing::listing.modals')

                    </tr>
                    @can('edit_listing')
                    
                        <tr class="edit_listing_{{ $listing->id }}"
                            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $listing->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                            <td colspan="12">

                                @include('listing::listing.edit.index')

                            </td>
                        </tr>

                    @endcan
                @empty
                @endforelse
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
                            title="@lang('agency.export_help')" href="{{ url('agency/export/'.request('agency')) }}"
                            class="mt-2">@lang('agency.generate_report')
                    </a>
                @endcan
            </div>
        </div>

    </div>
    @include('listing::listing.settings_modals')

@endsection

@push('js')


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>


    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

    <!-- Init js -->
    {{-- <script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script> --}}
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>




    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
 

    <script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
    <script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language=ar&region=EG&callback=initMap" async>
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2-multiple').select2();

            var listings = @json($listings);
            for (var i = 0; i < listings.data.length; i++) {

                ClassicEditor
                    .create(document.querySelector('#description_edit_en_' + listings.data[i].id))
                    .then()
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#description_edit_ar_' + listings.data[i].id), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });
            }

        })
    </script>

    <script>


        function show_add_div() {
            var div = document.querySelector('.add_listing');
            if (div.style.display === 'none') {
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
            } else {
                $('.description_en').addClass('d-none');
                $('.description_ar').removeClass('d-none');


            }
        }

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


        function toggle_edit_desc(id) {
            type = $('.description_edit_' + id).prop('checked');
            if (type == true) {
                //english
                $('.description_edit_en_' + id).removeClass('d-none');
                $('.description_edit_ar_' + id).addClass('d-none');
            } else {
                $('.description_edit_en_' + id).addClass('d-none');
                $('.description_edit_ar_' + id).removeClass('d-none');


            }
        }

    </script>
@endpush
