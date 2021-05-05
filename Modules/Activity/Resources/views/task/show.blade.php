@extends('layouts.master')

@section('title',trans('activity.tasks.title'))
@section('css')


    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">--}}




    <!-- icons -->
@endsection
@section('content')

    <div class="p-3">
        <div class="card">
            <h4 class="card-header">@lang('activity.tasks.show_task')</h4>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="col-sm-4 border-right ">

                        <div class="pl-1 ">
                            <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.task_type')  :</p> <span class="col-md-6">{{ $task->task_type && $task->task_type->{'type_'.app()->getLocale()} ? $task->task_type->{'type_'.app()->getLocale()} : ''  }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.status')  :</p> <span class="col-md-6">{{ $task->task_status && $task->task_status->{'status_'.app()->getLocale()} ? $task->task_status->{'status_'.app()->getLocale()} : ''  }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">{{ $task->module }}  : </p>
                                <span class="col-md-6">

                                    @if($task->module == 'lead')
                                        {{$task->lead && $task->lead->full_name ? $task->lead->full_name : ''}}
                                    @elseif($task->module == 'opportunity')
                                        {{$task->opportunity && $task->opportunity->lead && $task->opportunity->lead->full_name ? $task->opportunity->lead->full_name : ''}}
                                    @endif

                                </span> </div>
                            <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.deadline') :</p> <span class="col-md-6">{{ $task->deadline ?? '' }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.time') :</p> <span class="col-md-6">{{ date('g:i A', strtotime( $task->time ?? '')) }}</span> </div>


                        </div>
                    </div>
                    <div class="col-sm-5 border-right ">
                        <div class=" pl-1">

                            @if( ($task->custom_reminder ?? '') == 'on')
                                <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.custom_reminder')</p> <span class="col-md-6">{{ $task->period_reminder ?? '' }} {{ $task->type_reminder_number ?? '' }} {{ $task->type_reminder ?? '' }}</span> </div>
                            @endif

                            <div class="row"> <p class="font-bold col-md-6">@lang('activity.tasks.note')</p>
                                <span class="col-md-6">

                                        {!! $task->notes && $task->notes->last() && $task->notes->last()->{'notes_'.app()->getLocale()}  ? $task->notes->last()->{'notes_'.app()->getLocale()} : '' !!}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3  ">
                        <div class=" pl-1">

                            <div class="row pb-2"> <p class="font-bold col-md-6">@lang('activity.tasks.staff') :</p>
                                <span class="col-md-6">
                                   @forelse($task->staff as $staff)

                                        @php
                                            $current_users = \App\Models\User::where('id', $staff->id)->first();
                                        @endphp

                                        <img
                                                class="avatar-sm rounded-circle"
                                                data-plugin="tippy"
                                                data-tippy-placement="top-start"
                                                title="{{ $current_users ? $current_users->{'name_'.app()->getLocale()} :'' }}"

                                                src="{{  $current_users->image != null ? asset('profile_images/'.$current_users->image) :
                                                    asset('images/user-placeholder.jpg')  }}"
                                                alt="{{  $current_users->{'name_'.app()->getLocale()}  }}" >
                                    @empty

                                    @endforelse
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection