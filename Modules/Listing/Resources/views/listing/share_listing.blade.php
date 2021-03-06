@extends('layouts.master')
@section('title',trans('listing.share_listing'))
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
                @lang('listing.share_listing')
            </h4>

        </div>


        <div class="mb-2">
            @include('listing::listing.share_listing_filter')
        </div>



        <div>
            <table class="table table-bordered toggle-circle mb-0">
                <thead>
                <tr>
                    <th> @lang('listing.id') </th>
                    <th> @lang('listing.purpose') </th>
                    <th> @lang('listing.type') </th>
                    <th> @lang('listing.title') </th>
                    <th> @lang('listing.location') </th>
                    <th> @lang('listing.area') </th>
                    <th> @lang('listing.price') </th>
                    <th> @lang('listing.updated') </th>
                    <th> @lang('listing.agency') </th>
                    <th> @lang('listing.controls') </th>

                </tr>
                </thead>
                <tbody>
                @forelse($listings as $listing)
                    <tr>
                        <td><a href="#">{{$listing->id ?? ''}}</a></td>
                        <td>{{$listing->purpose ?? ''}}</td>
                        <td>{{$listing->type->{'name_'.app()->getLocale()} ?? ''}}</td>
                        <td>{{$listing->title ?? ''}}</td>
                        <td>{{explode(' ',$listing->location)[0] ?? ''}}
                            <i title="{{$listing->location ?? ''}}" class="fas fa-info-circle mr-2 " data-toggle="tooltip" data-placement="top" ></i>
                        </td>
                        <td>{{$listing->area ?? ''}}</td>
                        <td>{{$listing->price ?? ''}}</td>
                        <td>{{$listing->updated_at->toFormattedDateString() ?? ''}}</td>
                        <td>{{$listing->agency->{'company_name_'.app()->getLocale()} ?? ''}}</td>
                        <td>
                            <a href="#" target="_blank">
                                <i title="{{trans('listing.view')}}" class="fas fa-external-link-alt mr-2 " data-toggle="tooltip" data-placement="top" ></i>
                            </a>

                            <i
                                    title="{{trans('listing.contact_client')}}"
                                    data-toggle="modal" data-target="#send_mail-alert-modal_{{$listing->id ?? ''}}"

                                    class="fas fa-envelope cursor-pointer">
                            </i>
                        </td>
                    </tr>

                <!-- Info Alert Modal -->
                <div id="send_mail-alert-modal_{{$listing->id ?? ''}}" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-information h1 text-success"></i>
                                    <h4 class="mt-2">@lang('listing.contact_client')</h4>
                                    <p class="mt-3">@lang('listing.send_mail_confirmation')</p>
                                    <form action="{{route('listings.contact_client')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="listing_id" value="{{$listing->id ?? ''}}">
                                        <input type="hidden" name="sender_id" value="{{request('agency') ?? ''}}">
                                        <button type="submit"
                                                class="btn btn-success my-2">@lang('listing.confirm_send_mail')</button>
                                        <button type="button" class="btn btn-light my-2 border-success"
                                                data-dismiss="modal">@lang('settings.cancel')</button>
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
            {{ $listings->links() }}
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


    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>


    <script>
        function advanced_search() {
            check = $('#advanced_filter_form').css('opacity');

            if(check == 0){
                $('#advanced_filter_form').css('display','block');
                $('#advanced_filter_form').css('opacity',1);
            }else{
                $('#advanced_filter_form').css('display','none');
                $('#advanced_filter_form').css('opacity',0);
            }
        }
    </script>


    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $(".basic-datepicker").flatpickr();
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

@endpush
