@extends('layouts.master')

@section('title',trans('agency.notifications'))
@section('css')


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">



@endsection
@section('content')
    <div class="content p-3">


        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('agency.notifications')
            </h4>

        </div>


        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr>
                    <th> @lang('agency.notification') </th>
                    <th> @lang('agency.type') </th>
                    <th> @lang('agency.read_at') </th>
                    <th> @lang('agency.time') </th>
                    <th> @lang('agency.controls') </th>


                </tr>
                </thead>
                <tbody>

                @forelse($notifications as $notify)

                    <tr>
                        <td>
                            <abbr title="{{ $notify->data['message']  ?? '' }}"> @if(array_key_exists('type',$notify->data)){{ substr( $notify->data['message'] ,0,35).'...' ?? '' }}@endif</abbr>
                        </td>
                        <td>  @if(array_key_exists('type',$notify->data)){{ $notify->data['type'] ?? '' }}@endif </td>
                        <td>@if($notify->read_at) {{$notify->read_at->toFormattedDateString()}} @else @lang('agency.unread') @endif</td>
                        <td>{{  $notify->created_at->toFormattedDateString() }}</td>
                        <td>
                            <i
                            @if( $notify->data['type'] == 'opportunity')
{{--                                <a href="{{ url('sales/opportunities/'.request('agency'))->with('open-call-tab', $notify->data['opportunity_answer_id']) }}">--}}
                                    onclick="goToLink('opportunity',{{$notify->data['opportunity_answer_id']}})"
                            @elseif( $notify->data['type'] == 'task')
{{--                                <a href="{{ url('activity/tasks/'.request('agency'))->with('open-call-tab', $notify->data['lead_task_id']) }}">--}}
                                    onclick="goToLink('task',{{$notify->data['lead_task_id']}})"
                            @elseif( $notify->data['type'] == 'assign')
{{--                                <a href="{{ url('sales/opportunities/'.request('agency'))->with('open-call-tab', $notify->data['opportunity_id']) }}">--}}
                                    onclick="goToLink('assign',{{$notify->data['opportunity_id']}})"
                            @elseif( $notify->data['type'] == 'answer')
{{--                                <a href="{{ url('sales/opportunities/'.request('agency'))->with('open-call-tab', $notify->data['opportunity_answer_id']) }}">--}}
                                    onclick="goToLink('answer',{{$notify->data['opportunity_answer_id']}})"
                            @elseif( $notify->data['type'] == 'result')
{{--                                <a href="{{ url('sales/opportunities/'.request('agency'))->with('open-call-tab', $notify->data['opportunity_result_id']) }}">--}}
                                    onclick="goToLink('result',{{$notify->data['opportunity_result_id']}})"
                            @elseif( $notify->data['type'] == 'question')
{{--                                <a href="{{ url('sales/opportunities/'.request('agency'))->with('open-call-tab', $notify->data['opportunity_answer_id']) }}">--}}
                                    onclick="goToLink('question',{{$notify->data['opportunity_answer_id']}})"
                            @endif


                                            title="@lang('agency.view')"
                                            class="fe-eye cursor-pointer feather-16">
                                    </i>
                        </td>
                    </tr>

                @empty
                @endforelse
                </tbody>
            </table>

        </div>

    </div>


@endsection

@push('js')



    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>



    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        function goToLink(type,id){
            var url = '';
            if(type == 'task'){
                url = "{{url('activity/tasks/'.request('agency'))}}";
                location.replace(url+'?ssss=')
            }
            else {
                url = "{{url('sales/opportunities/'.request('agency'))}}";
                location.replace(url)
            }
        }
    </script>


@endpush
