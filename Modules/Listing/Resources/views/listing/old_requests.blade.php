@extends('layouts.master')
@section('title',trans('listing.old_requests'))
@section('css')


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')

    <div class="content p-3">


        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('listing.old_requests')
            </h4>



            @if(owner())
                <a href="{{ url('listing/requests/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.requests')</div>
                </a>
            @elseif(moderator())
                <a href="{{ url('listing/requests/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.requests')</div>
                </a>
            @else
                <a href="{{ url('listing/requests/'.auth()->user()->agency_id) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.requests')</div>
                </a>
            @endif

            <a href="#" class="list-link active">
                <i class="fas fa-save mr-1"></i>
                <div>@lang('listing.old_requests')</div>
            </a>


            @if(owner())
                <a href="{{ url('listing/black_listed/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.black_listed')</div>
                </a>
            @elseif(moderator())
                <a href="{{ url('listing/black_listed/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.black_listed')</div>
                </a>
            @else
                <a href="{{ url('listing/black_listed/'.auth()->user()->agency_id) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.black_listed')</div>
                </a>
            @endif

        </div>





        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr>
                    <th>@lang('listing.agency') </th>
                    <th>@lang('listing.response') </th>

                </tr>
                </thead>
                <tbody>
                @forelse($requests as $request)

                       <tr>
                           <td>{{$request->receiver->company_name_en ?? '' }}</td>
                           <td>{{ucfirst($request->response) ?? '' }}</td>

                       </tr>

                @empty
                @endforelse
                </tbody>
            </table>

        </div>
        <div class="mt-2">
            {{ $requests->links() }}
        </div>
    </div>
@endsection

@push('js')




    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>



    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>



@endpush
