@extends('layouts.master')
@section('title',trans('settings.floor_plans'))
@section('css')

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- icons -->
@endsection


@section('content')

    <div class="content p-3">


        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('settings.floor_plans')
            </h4>

        </div>

        <div class="row col-12">
            <div class="d-flex justify-content-center col-9">
                <form method="post" enctype="multipart/form-data" id="myform">
                    <div class="btn btn-outline-secondary btn-rounded waves-effect m-3">
                        <label for="image">
                            <input name="image[]" id="image" multiple="" type="file" style="display: none;"
                                   onchange="add_image()">
                            <input name="agency_id" id="agency_id" type="hidden" value="{{$agency}}">
                            <i class="fa fa-plus-circle"></i>@lang('settings.upload_image')</label>
                    </div>
                </form>

            </div>

        </div>
        <div id="content">

        </div>


    </div>




@endsection

@push('js')



    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script>
        $(document).ready(function () {
            get_content();
        });



        function delete_image(id) {

            url = "{{url('setting/floor_plans/delete/image')}}" + '/' + id+ '/' + "{{$agency}}";


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

        function get_content() {
            let agency_id = $('#agency_id').val();
            let user_id = $('#user_id').val();
            @if(isset($id))
                url = "{{url('setting/floor_plans/store/get_content')}}" + '/' + agency_id + '/' + "{{$id}}";
            @else
                url = "{{url('setting/floor_plans/store/get_content')}}" + '/' + agency_id;
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

            url = "{{route('setting.floor_plans.store.image')}}";

            var fd = new FormData();
            var files = $('#image')[0].files;
            let agency_id = $('#agency_id').val();
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

    </script>


@endpush
