@extends('layouts.master')
@section('title',trans('listing.requests'))
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
                @lang('listing.requests')
            </h4>

        </div>





        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr>
                    <th>@lang('listing.agency') </th>
                    <th> @lang('listing.controls') </th>

                </tr>
                </thead>
                <tbody>
                @forelse($agencies as $agency)
                   @if($sender->id != $agency->id && !in_array($agency->id,$blocked_from) && !in_array($agency->id,$blocked_to) )
                       <tr>
                           <td>{{$agency->company_name_en ?? '' }}</td>
                           <td>


                               <i
                                   title="{{trans('listing.send_request')}}"
                                   data-toggle="modal" data-target="#send_mail-alert-modal_{{$agency->id ?? ''}}"

                                   class="fas fa-envelope cursor-pointer mr-2">
                               </i>

                               <i
                                   title="{{trans('listing.block')}}"
                                   data-toggle="modal" data-target="#block_agency-alert-modal_{{$agency->id ?? ''}}"

                                   class="fas fa-user-lock cursor-pointer">
                               </i>
                           </td>
                       </tr>

                    @include('listing::listing.share_request_modals')
                   @endif
                @empty
                @endforelse
                </tbody>
            </table>

        </div>
        <div class="mt-2">
            {{ $agencies->links() }}
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
