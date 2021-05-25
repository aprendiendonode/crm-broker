@extends('layouts.master')

@section('title',trans('activity.emails_list.list'))
@section('css')


    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">


    <style>
        .toggle.android { border-radius: 0px;}
        .toggle.android .toggle-handle { border-radius: 0px; }

        .custom-toggle .btn {
            padding:0 !important;
        }
        .custom-toggle .toggle.btn {
            min-height: 26px;
            min-width: 46px;
        }
    </style>


    <!-- icons -->
@endsection
@section('content')

    <div class="content p-3">

        <div class="d-flex justify-content-between mb-3">

            <div class="">

            </div>

            <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('activity.emails_list.new_email')
            </button>
        </div>

        <div class="mb-2 new_email "  @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
            @include('activity::emails.create')
        </div>

        @include('activity::emails.filter')

        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr >
                    <th > # </th>
                    <th > @lang('activity.emails_list.subject') </th>
                    <th > @lang('activity.emails_list.sender') </th>
                    <th > @lang('activity.emails_list.sent_time') </th>
                    <th > @lang('global.preview') </th>
                </tr>
                </thead>
                <tbody >
                @forelse($emails as $email)
                    <tr >
                        <td>
                            {{$email->id ?? ''}}
                        </td>
                        <td>
                            {{$email->subject ?? ''}}
                        </td>
                        <td>
                            {{$email->addBy && $email->addBy->{'name_'.app()->getLocale()} ? $email->addBy->{'name_'.app()->getLocale()} : ''}}
                        </td>
                        <td>
                            {{$email->created_at ?? ''}}
                        </td>
                        <td>


                            <i
                                    data-plugin="tippy"
                                    data-tippy-placement="top-start"
                                    title="@lang('activity.emails_list.preview')"
                                    data-toggle="modal" data-target="#show_email-modal_{{ $email->id }}"

                                    class="fe-eye cursor-pointer feather-16">
                            </i>

                        </td>


                    @include('activity::emails.show_email_content')

                    </tr>

                @empty
                    <tr>
                        <td colspan="10">
                            @lang('global.messages.no_data_in_table')
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            <div class="d-flex justify-content-between">

                <div class="mt-2">
                    {{ $emails->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    {{--<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>




    <script>

        $(document).ready(function() {
            $('.select2').select2();
            $(".basic-datepicker").flatpickr();


        });

        function  show_add_div(){

            var  div = document.querySelector('.new_email');
            if(div.style.display === 'none'){
                div.style.display = 'block';

                setTimeout(function(){

                    div.style.opacity = 1;

                },10);

            } else {
                div.style.display = 'none';
                setTimeout(function(){

                    div.style.opacity = 0;


                },10);

            }

        }

        var  emails = @json($emails);
        var emails_data = emails.data;
        emails_data.filter(function(value,key){
            //preview email
            ClassicEditor
                .create( document.querySelector( '#show_email_content_modal_textarea_'+value.id ))
                .then( newEditor => {
                    // newEditor.ui.view.editable.element.style.height = '500px';
                    editor = newEditor;
                } )
                .catch( error => {
                    console.error( error );
                } );
        });

    </script>

@endpush
