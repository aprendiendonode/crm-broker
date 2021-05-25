@extends('layouts.master')

@section('title',trans('activity.activity_log_list.list'))
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


        @include('activity::activity_logs.filter')

        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr >
                    <th > @lang('activity.activity_log_list.id') </th>
                    <th > @lang('activity.activity_log_list.log') </th>
                    <th > @lang('activity.tasks.staff') </th>
                    <th > @lang('activity.activity_log_list.group') </th>
                    <th > @lang('activity.activity_log_list.published') </th>
                    <th > @lang('global.preview') </th>
                </tr>
                </thead>
                <tbody >
                @forelse($activities as $activity)
                    <tr >
                        <td>
                            {{$activity->id ?? ''}}
                        </td>
                        <td>
                            {{ $activity->{'log_'.app()->getLocale()} ? $activity->{'log_'.app()->getLocale()} : ''}}
                        </td>
                        <td>
                            {{$activity->addBy && $activity->addBy->{'name_'.app()->getLocale()} ? $activity->addBy->{'name_'.app()->getLocale()} : ''}}
                        </td>
                        <td>
                            {{$activity->group ?? ''}}
                        </td>
                        <td>
                            {{$activity->created_at ?? ''}}
                        </td>

                        <td>
                            @php
                                $link = '';
                                if ($activity->group == 'task')
                                {
                                    $link = 'activity/tasks/'.request('agency').'/show/'.$activity->group_id;
                                }else if ($activity->group == 'task_note')
                                {
                                    $link = 'activity/notes/'.request('agency').'/tasks?id='.$activity->group_id;
                                }
                                else if ($activity->group == 'email')
                                {
                                    $link = 'activity/emails/'.request('agency').'?id='.$activity->group_id;
                                }

                            @endphp

                            <a href="{{url($link)}}">

                                <i
                                        data-plugin="tippy"
                                        data-tippy-placement="top-start"
                                        title="@lang('activity.view')"

                                        class="fe-eye cursor-pointer feather-16">
                                </i>
                            </a>

                        </td>


                    </tr>

                @empty
                    <tr>
                        <td colspan="6">
                            @lang('global.messages.no_data_in_table')
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            <div class="d-flex justify-content-between">

                <div class="mt-2">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


@endpush