@extends('layouts.master')

@section('title',trans('agency.notifications'))
@section('css')


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

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
                                    onclick="changeNotifyStatus('opportunity','{{$notify->data['opportunity_id'] ?? '' }}','{{ $notify->id}}')"
                                    @elseif( $notify->data['type'] == 'task')
                                    onclick="changeNotifyStatus('task','{{$notify->data['lead_task_id'] ?? '' }}','{{ $notify->id}}')"
                                    @elseif( $notify->data['type'] == 'assign')
                                    onclick="changeNotifyStatus('assign','{{$notify->data['opportunity_id'] ?? '' }}','{{ $notify->id}}')"
                                    @elseif( $notify->data['type'] == 'answer')
                                    onclick="changeNotifyStatus('answer','{{$notify->data['opportunity_id'] ?? '' }}','{{ $notify->id}}')"
                                    @elseif( $notify->data['type'] == 'result')
                                    onclick="changeNotifyStatus('result','{{$notify->data['opportunity_id'] ?? '' }}','{{ $notify->id}}')"
                                    @elseif( $notify->data['type'] == 'question')
                                    onclick="changeNotifyStatus('question','{{$notify->data['opportunity_id'] ?? '' }}','{{$notify->id}}')"
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
        function goToLink(type, id) {
            var url = '';
            if (type == 'task') {
                url = @json(url('activity/tasks/'.request('agency')).'?id=');
                location.replace(url + id);
            }
            else if (type == 'assign') {
                url = @json(url('sales/opportunities/'.request('agency').'?id=') );
                location.replace(url + id);
            }
            else if (type == 'result') {
                sessionStorage.setItem('open-result-tab', id);
                url = @json(url('sales/opportunities/'.request('agency').'?id=') );
                location.replace(url + id);
            }
            else if (type == 'question') {
                sessionStorage.setItem('open-question-tab', id);
                url = @json(url('sales/opportunities/'.request('agency').'?id=') );
                location.replace(url + id);
            }
            else if (type == 'answer') {
                sessionStorage.setItem('open-question-tab', id);
                url = @json(url('sales/opportunities/'.request('agency').'?id=') );
                location.replace(url + id);
            }
        }


        function changeNotifyStatus(type, id, notify) {

            let _token = $('meta[name="csrf-token"]').attr('content');
            const url = @json(url('update_notification'));
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    notify: notify,
                    _token: _token
                },
                success: function (response) {
                    if (response) {
                        goToLink(type,id);
                    }
                },
            });

        }
    </script>


@endpush
