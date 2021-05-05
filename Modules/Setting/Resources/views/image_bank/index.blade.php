@extends('layouts.master')
@section('title',trans('settings.image_banks'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- icons -->
@endsection


@section('content')


    <div class="content p-3">


        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('settings.image_banks')
            </h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($id))
                        <li class="breadcrumb-item"><a href="{{url('/'.$agency)}}">@lang('settings.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{ route('setting.image_banks.index',$agency)}}">@lang('settings.image_banks')</a>
                        </li>

                        @if( count($bread_crumb) >= 1)
                            @foreach($bread_crumb as $item)
                                @if($loop->last)
                                    <li class="breadcrumb-item "><a
                                                href="#">{{$item['name']}}</a>
                                    </li>
                                   @else
                                    <li class="breadcrumb-item active"><a
                                                href="{{ route('setting.image_banks.open_folder',[$agency,$item['id']])}}">{{$item['name']}}</a>
                                    </li>
                                @endif


                            @endforeach

                        @endif


                    @else
                        <li class="breadcrumb-item"><a href="{{url('/'.$agency)}}">@lang('settings.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('settings.image_banks')</li>
                    @endif
                </ol>
            </div>
        </div>

        <div class="row col-12">
            <div class="d-flex justify-content-center col-9">
                <form method="post" id="myform2">
                    <input name="path" id="path_folder" type="hidden" value="main">
                    <a href="#"
                       class="btn btn-outline-secondary btn-rounded waves-effect m-3"
                       onclick="add_folder()">@lang('settings.new_folder')</a>
                </form>
                <form method="post" enctype="multipart/form-data" id="myform">
                    <div class="btn btn-outline-secondary btn-rounded waves-effect m-3">
                        <label for="image">
                            <input name="image[]" id="image" multiple="" type="file" style="display: none;"
                                   onchange="add_image()">
                            <input name="agency_id" id="agency_id" type="hidden" value="{{$agency}}">
                            <input name="path" id="path" type="hidden" value="">
                            <i class="fa fa-plus-circle"></i>@lang('settings.upload_image')</label>
                    </div>
                </form>

            </div>
            <div class="justify-content-end col-3">
                <form method="GET" action="{{ route('setting.image_banks.index',$agency) }}" id="user_form">
                    <div class="form-group">
                        <label for="user_id" class="font-weight-medium text-muted">@lang('settings.user')</label>
                        <select class="form-control select2 " data-toggle="select2" name="user_id" id="user_id"
                                onchange="user_change()">
                            <option value="">@lang('settings.select')</option>
                            @foreach($users as $user)
                                <option
                                        value="{{$user->id}}" {{$user_id == $user->id ? 'selected' : ''}}>{{$user->{'name_'.app()->getLocale()} ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

            </div>
        </div>
        <div id="content">

        </div>


    </div>
@endsection

@push('js')



    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script>
        $(document).ready(function () {
            get_content();
            $('.select2').select2();
        });


        function user_change() {
            $('#user_form').submit();
        }

        function delete_image(id) {

            url = "{{url('setting/image_banks/delete/image')}}" + '/' + id;


            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    get_content()
                },
                error: function (data) {
                    //function here
                }
            });
        }

        function delete_folder(id) {

            url = "{{url('setting/image_banks/delete_folder')}}" + '/' + id;

            if (confirm("{{trans('settings.delete_confirm')}}")) { // Standard confirmation message.

                $.ajax({
                    type: 'GET',
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        get_content()
                    },
                    error: function (data) {
                        //function here
                    }
                });
            } else {
                // Pressed Cancel.
            }


        }

        function get_content() {
            let agency_id = $('#agency_id').val();
            let user_id = $('#user_id').val();
            @if(isset($id))
                url = "{{url('setting/image_banks/store/get_content')}}" + '/' + agency_id + '/' + "{{$id}}" + '?user_id=' + user_id;
            @else
                url = "{{url('setting/image_banks/store/get_content')}}" + '/' + agency_id + '?user_id=' + user_id;
            @endif




            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    $('#content').html('');
                    $('#content').append(data);
                },
                error: function (data) {
                    //function here
                }
            });
        }

        function add_image() {

            url = "{{route('setting.image_banks.store.image')}}";

            var fd = new FormData();
            var files = $('#image')[0].files;
            let agency_id = $('#agency_id').val();
            let path = $('#path').val();
            let user = $('#user_id').val();
            @if(isset($id))
            fd.append('id', "{{$id}}");
            @endif
            // Check file selected or not
            if (files.length > 0) {

                var totalfiles = document.getElementById('image').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    fd.append("file[]", document.getElementById('image').files[index]);
                }

                // fd.append('file',files[0]);
                fd.append('agency_id', agency_id);
                fd.append('path', path);
                fd.append('user_id', user);


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: url,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#image').val('');
                        get_content()
                    },
                    error: function (data) {
                        //function here
                    }
                });
            } else {
                alert("Please select a file.");
            }
        }

        function add_folder() {

            url = "{{route('setting.image_banks.store.folder')}}";
            var fd = new FormData();
            let path = $('#path').val();
            let agency_id = $('#agency_id').val();
            let user = $('#user_id').val();
            @if(isset($id))
            fd.append('id', "{{$id}}");
            @endif

            // Check file selected or not
            fd.append('agency_id', agency_id);
            fd.append('path_folder', path);
            fd.append('user_id', user);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: url,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    get_content()
                },
                error: function (data) {
                    //function here
                }
            });


        }

        function open_folder(id) {
            let user_id = $('#user_id').val();

            window.location.href = "{{url('setting/image_banks/open_folder')}}" + '/' + "{{$agency}}" + '/' + id + '?user_id=' + user_id;
            ;
        }

        function edit_folder_name(id) {
            $('#folder_name_' + id).hide(50);
            $('#folder_input_' + id).show(50);
            $('#folder_submit_' + id).show(50);
        }

        function save_new_name(id) {
            url = "{{route('setting.image_banks.store.folder.name')}}";
            var fd = new FormData();
            let name = $('#folder_input_' + id).val();
            let agency_id = $('#agency_id').val();
            // Check file selected or not
            fd.append('name', name);
            fd.append('id', id);
            fd.append('agency_id', agency_id);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: url,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    get_content()
                },
                error: function (data) {
                    //function here
                }
            });


        }
    </script>


@endpush
