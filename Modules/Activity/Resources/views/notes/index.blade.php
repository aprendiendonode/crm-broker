@extends('layouts.master')

@section('title',trans('activity.notes'))
@section('css')


    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">--}}


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

        .list-link {
            display: flex;
            align-items: center;
            padding: 0.5rem 3rem;
            background-color: #fff;
            border: 1px solid #ccc;
            color: #585858;
            border-radius: 5px;
            transition: 0.2s;
            margin: 0 6px 6px 0;
            font-weight: 500;
            font-size: 12px
        }
        .list-link.active, .list-link:hover {
            background-color: #11ca6d;
            border-color: #11ca6d;
            color:#fff;
        }
    </style>


    <!-- icons -->
@endsection
@section('content')

    <div class="content p-3">


        @php
            if (!owner()){
                    $agency_id = auth()->user()->agency_id;
            }else{

                    $agency_id = auth()->user()->agencies->first()->id;
            }

        @endphp

        <div class="d-flex justify-content-between align-items-start mb-3">

            <div class="d-flex flex-wrap">
                {{--<a href="" class="list-link active">--}}
                    {{--<i class="fas fa-info-circle mr-1"></i>--}}
                    {{--<div>LIVE(8)</div>--}}
                {{--</a>--}}
                <a href="{{url('activity/notes/'.$agency_id.'/listings')}}" class="list-link  {{ request()->segment(4) == 'listings' ? 'active' : '' }}  waves-effect waves-light" >
                    listings
                </a>

                <a href="{{url('activity/notes/'.$agency_id.'/leads')}}" class="list-link {{ request()->segment(4) == 'leads' ? 'active' : '' }}  waves-effect waves-light" >
                    leads
                </a>

                <a href="{{url('activity/notes/'.$agency_id.'/deals')}}" class="list-link {{ request()->segment(4) == 'deals' ? 'active' : '' }}  waves-effect waves-light" >
                    deals
                </a>

                <a href="{{url('activity/notes/'.$agency_id.'/tasks')}}" class="list-link {{ request()->segment(4) == 'tasks' ? 'active' : '' }}  waves-effect waves-light" >
                    @lang('activity.tasks.title')
                </a>

                <a href="{{url('activity/notes/'.$agency_id.'/contacts')}}" class="list-link  {{ request()->segment(4) == 'contacts' ? 'active' : '' }}  waves-effect waves-light" >
                    contacts
                </a>

            </div>

        </div>

        @include('activity::notes.filter')

        <h4 class="pt-3">
            @lang('activity.notes_list.list')
        </h4>

        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr >
                    <th > # </th>
                    <th > @lang('activity.notes_list.id') </th>
                    <th > @lang('activity.tasks.add_by') </th>
                    <th > @lang('activity.tasks.date_add') </th>
                    <th > @lang('activity.tasks.note') </th>
{{--                    <th > @lang('global.controls') </th>--}}
                </tr>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                        <tr >
                            <td>
                                {{ $note->id ?? ''}}
                            </td>
                            <td>
                                @if(request()->segment(4) == 'listings')
                                    {{ $note->listing && $note->listing->id ? $note->listing->id : '' }}
                                @elseif(request()->segment(4) == 'leads')

                                    {{ $note->lead && $note->lead->id ? $note->lead->id : '' }}
                                @elseif(request()->segment(4) == 'deals')

                                    {{ $note->deal && $note->deal->id ? $note->deal->id : '' }}

                                @elseif(request()->segment(4) == 'tasks')

                                    {{ $note->task && $note->task->id ? $note->task->id : '' }}

                                @elseif(request()->segment(4) == 'contacts')

                                    {{ $note->contact && $note->contact->id ? $note->contact->id : '' }}
                                @endif

                            </td>

                            <td>
                                {{$note->addBy && $note->addBy->{'name_'.app()->getLocale()} ? $note->addBy->{'name_'.app()->getLocale()} : ''}}
                            </td>

                            <td>
                                {{$note->created_at ? date('d-m-Y',strtotime($note->created_at)) :''}}
                            </td>

                            <td>
                                {!! $note->{'notes_'.app()->getLocale()} ?? '' !!}
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


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>



    <script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{asset('assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $(".basic-datepicker").flatpickr();
            @if(request()->has('id'))
                show_advanced_search_div();
            @endif
        });

        function show_advanced_search_div()
        {
            var id_div = document.getElementById('id_div');
            var advanced_search = document.getElementById('advanced_search');
            var quick_search = document.getElementById('quick_search');
            if (id_div.style.display == 'none')
            {
                id_div.style.display            = 'block';
                advanced_search.style.display   = 'block';
                quick_search.style.display      = 'none';
            }else{
                id_div.style.display            = 'none';
                advanced_search.style.display   = 'none';
                quick_search.style.display      = 'block';
            }

        }

    </script>
@endpush