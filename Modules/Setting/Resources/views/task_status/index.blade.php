@extends('layouts.master')
@section('title',trans('settings.task_status'))
@section('css')


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <style>


        .toggle.android {
            border-radius: 0px;
        }

        .toggle.android .toggle-handle {
            border-radius: 0px;
        }

        .custom-toggle .btn {
            padding: 0 !important;
        }

        .custom-toggle .toggle.btn {
            min-height: 26px;
            min-width: 46px;
        }
    </style>
    <!-- icons -->
@endsection
@section('content')
{{--@dd('kkkkk')--}}
    <div class="content p-3">

        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('settings.manage_task_status')
            </h4>
            <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('settings.add_task_status')
            </button>
        </div>


        <div class="mb-2 add_status "
             @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
            @include('setting::task_status.create')
        </div>

        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                    <tr>
                        <th># </th>
                        <th> @lang('settings.status') </th>
                        <th> @lang('settings.type_complete') </th>
                        <th> @lang('settings.controls') </th>

                    </tr>
                </thead>
                <tbody>

                    @forelse($task_status as $status)
                        <tr>
                            <td>{{ $status->id ?? '' }}</td>
                            <td>{{ $status->{'status_'.app()->getLocale()} ?? ''}}</td>
                            <td>{{ $status->type_complete ?? ''}}</td>

                            <td>


                                <i
                                        onclick="event.preventDefault();show_edit_div({{ $status->id }})"
                                        data-plugin="tippy"
                                        data-tippy-placement="top-start"
                                        title="@lang('settings.edit')"

                                        class="fe-edit cursor-pointer feather-16">
                                </i>


                                <i
                                        data-plugin="tippy"
                                        data-tippy-placement="top-start"
                                        title="@lang('settings.delete_status')"
                                        data-toggle="modal" data-target="#delete-alert-modal_{{ $status->id }}"

                                        class="fe-trash cursor-pointer feather-16">
                                </i>

                            </td>


                        </tr>

                        <tr class="edit_status_{{ $status->id }}"
                            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $status->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                            <td colspan="8">

                                @include('setting::task_status.edit',['edited_status' => $status])

                            </td>
                        </tr>
                        <!-- Info Alert Modal -->
                        <div id="delete-alert-modal_{{ $status->id }}" class="modal fade" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body p-4">
                                        <div class="text-center">
                                            <i class="dripicons-information h1 text-danger"></i>
                                            <h4 class="mt-2">@lang('settings.head_up')</h4>
                                            <p class="mt-3">@lang('settings.delete_warning')</p>
                                            <form action="{{ route('setting.task_status.delete',$status->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger my-2">@lang('settings.confirm_delete')</button>
                                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('settings.cancel')</button>

                                            </form>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @empty
                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="mt-2">
            {{ $task_status->links() }}
        </div>
    </div>
@endsection

@push('js')


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('.select2').select2();

        })
    </script>

    <script>


        function show_add_div() {
            var div = document.querySelector('.add_status');
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
            var div = document.querySelector('.add_status');

            div.style.display = 'none';
            setTimeout(function () {

                div.style.opacity = 0;


            }, 10);


        }


        function show_edit_div(id) {
            var div = document.querySelector('.edit_status_' + id);
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
            var div = document.querySelector('.edit_status_' + id);

            div.style.display = 'none';
            setTimeout(function () {

                div.style.opacity = 0;


            }, 10);


        }
    </script>


@endpush
