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


            @if(owner())
                <a href="{{ url('listing/old_requests/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.old_requests')</div>
                </a>
            @elseif(moderator())
                <a href="{{ url('listing/old_requests/'.request('agency')) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.old_requests')</div>
                </a>
            @else
                <a href="{{ url('listing/old_requests/'.auth()->user()->agency_id) }}" class="list-link">
                    <i class="fas fa-save mr-1"></i>
                    <div>@lang('listing.old_requests')</div>
                </a>
            @endif


            <a href="#" class="list-link active">
                <i class="fas fa-save mr-1"></i>
                <div>@lang('listing.black_listed')</div>
            </a>


        </div>





        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr>
                    <th>@lang('listing.agency') </th>
                    <th>@lang('listing.controls') </th>

                </tr>
                </thead>
                <tbody>
                @forelse($black_listed_agencies as $blacklist)

                       <tr>
                           <td>{{$blacklist->blacklist->company_name_en ?? '' }}</td>
                           <td>
                               <i
                                   title="{{trans('listing.unblock')}}"
                                   data-toggle="modal" data-target="#unblock_agency-alert-modal_{{$blacklist->id ?? ''}}"

                                   class="fas fa-unlock-alt cursor-pointer">
                               </i>
                           </td>


                       </tr>



                       <!-- Info Alert Modal -->
                       <div id="unblock_agency-alert-modal_{{$blacklist->id ?? ''}}" class="modal fade" tabindex="-1" role="dialog"
                            aria-hidden="true">
                           <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                                   <div class="modal-body p-4">
                                       <div class="text-center">
                                           <i class="dripicons-information h1 text-success"></i>
                                           <h4 class="mt-2">@lang('listing.unblock')</h4>
                                           <p class="mt-3">@lang('listing.unblock_confirmation')</p>
                                           <form action="{{route('listings.unblock')}}" method="post">
                                               @csrf
                                               <input type="hidden" name="id" value="{{$blacklist->id ?? ''}}">
                                               <button type="submit"
                                                       class="btn btn-success my-2">@lang('listing.confirm_unblock')</button>
                                               <button type="button" class="btn btn-light my-2 border-danger"
                                                       data-dismiss="modal">@lang('settings.cancel')</button>
                                           </form>
                                       </div>
                                   </div>
                               </div><!-- /.modal-content -->
                           </div><!-- /.modal-dialog -->
                       </div>
                       <!-- /.modal -->

                @empty
                @endforelse
                </tbody>
            </table>

        </div>
        <div class="mt-2">
            {{ $black_listed_agencies->links() }}
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
