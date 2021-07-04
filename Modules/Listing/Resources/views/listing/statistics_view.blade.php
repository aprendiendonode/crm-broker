@extends('layouts.master')

@section('title',trans('listing.statistics'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">
    <style>
        .toggle.android {
            border-radius: 0px;
        }

        .toggle.android .toggle-handle {
            border-radius: 0px;
        }

        .description-profile-modal
        .ck-editor__editable_inline {
            min-height: 350px;
        }
    </style>

@endsection


@section('content')

    <div class="content pt-3">


        <div class="mb-4">

            <h3 class="p-2">@lang('listing.statistics')</h3>


            <a
                    @if(owner())
                    href="{{ url('listing/statistics/'.request('agency')) }}"

                    @elseif(moderator())
                    href="{{ url('listing/statistics/'.request('agency')) }}"
                    @else
                    href="{{ url('listing/statistics/'.auth()->user()->agency_id) }}"
                    @endif
                    class="float-right btn btn-info waves-effect waves-light">
                <i class="fe-plus-square"></i>@lang('listing.import_statistics')
            </a>

            <hr>
        </div>

        <button class="btn btn-primary mb-2" onclick="show_filter()">@lang('sales.filter') <i class="fa fa-search"></i></button>
        <a class="btn btn-outline-primary mb-2"
           @if(owner())
           href="{{ url('listing/statistics_data/'.request('agency')) }}"

           @elseif(moderator())
           href="{{ url('listing/statistics_data/'.request('agency')) }}"
           @else
           href="{{ url('listing/statistics_data/'.auth()->user()->agency_id) }}"
                @endif
        >@lang('sales.reset_filters')</a>

        <div class="mb-2 filter_lead "
             @if( !request()->has('filter_data_source')) style="display: none;opacity:0;transition:0.7s" @endif>

            @include('listing::listing.statistics_filter')
        </div>

        <div class="table-responsive">
            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                <thead>
                <tr>
                    <th> @lang('listing.data_source') </th>
                    <th> @lang('listing.transaction_type') </th>
                    <th> @lang('listing.type') </th>
                    <th> @lang('listing.day') </th>
                    <th> @lang('listing.month') </th>
                    <th> @lang('listing.country') </th>
                    <th> @lang('listing.city') </th>
                    <th> @lang('listing.area_code') </th>
                    <th> @lang('listing.community') </th>
                    <th> @lang('listing.sub_community') </th>
                    <th> @lang('listing.property_type') </th>
                    <th> @lang('listing.purpose') </th>
                    <th> @lang('listing.property_number') </th>
                    <th> @lang('listing.additional_details') </th>
                    <th> @lang('listing.size_sqm') </th>
                    <th> @lang('listing.price_sqm') </th>
                    <th> @lang('listing.total_worth') </th>
                    <th> @lang('listing.size_sqft') </th>
                    <th> @lang('listing.price_sqft') </th>


                </tr>
                </thead>
                <tbody>
                @if($statistics)
                    @forelse($statistics as $statistic)

                        <tr>
                            <td> {{ $statistic->data_source }}</td>
                            <td> {{ $statistic->transaction_type }}</td>
                            <td> {{ $statistic->type }}</td>
                            <td> {{ $statistic->day }}</td>
                            <td> {{ $statistic->month }}</td>
                            <td> {{ $statistic->country ?  $statistic->country->value : ''}}</td>
                            <td> {{ $statistic->city ? $statistic->city->{'name_'.app()->getLocale()} : '' }}</td>
                            <td> {{ $statistic->area_code }}</td>
                            <td> {{ $statistic->community }}</td>
                            <td> {{ $statistic->subcommunity }}</td>
                            <td> {{ $statistic->property_type }}</td>
                            <td> {{ $statistic->purpose }}</td>
                            <td> {{ $statistic->property_number }}</td>
                            <td> {{ $statistic->additional_details }}</td>
                            <td> {{ $statistic->size_sqm }}</td>
                            <td> {{ $statistic->price_sqm }}</td>
                            <td> {{ $statistic->total_worth }}</td>
                            <td> {{ $statistic->size_sqft }}</td>
                            <td> {{ $statistic->price_sqft }}</td>

                        </tr>
                    @empty
                    @endforelse
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-between">

                <div class="mt-2">

                    @if($pagination)
                        {{ $statistics->links() }}
                    @endif

                </div>

            </div>
        </div>

    </div>

@endsection

@push('js')


    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>


    <script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>


    {{-- <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script> --}}


    <script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
    <script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language=ar&region=EG&callback=initMap"--}}
    {{--async >--}}
    {{--</script> --}}

    <script>
        $(document).ready(function () {

            ClassicEditor
                .create(document.querySelector('#description_en'))
                .then()
                .catch(error => {

                });

            ClassicEditor
                .create(document.querySelector('#description_ar'), {
                    language: 'ar'
                })
                .then()
                .catch(error => {

                });

            $('.select2').select2();
            $('.select2-multiple').select2();
            $(".basic-datepicker").flatpickr();
            $(".clockpicker").clockpicker({
                twelvehour: false
            });

            if (sessionStorage.getItem('open-call-tab')) {
                $('.call_' + sessionStorage.getItem('open-call-tab')).removeClass('d-none');
                sessionStorage.removeItem('open-call-tab')
            }

            if (sessionStorage.getItem('open-result-tab')) {
                $('.result_' + sessionStorage.getItem('open-result-tab')).removeClass('d-none');
                sessionStorage.removeItem('open-result-tab')
            }

            if (sessionStorage.getItem('open-question-tab')) {
                $('.question_' + sessionStorage.getItem('open-question-tab')).removeClass('d-none');
                sessionStorage.removeItem('open-question-tab')
            }


        })


        function  show_filter(){
            var  div = document.querySelector('.filter_lead');
            if(div.style.display === 'none'){
                div.style.display = 'block';

                setTimeout(function(){

                    div.style.opacity = 1;

                },10);
            } else {
                div.style.display = 'none';
                setTimeout(function(){

                    div.style.opacity = 0;


                },10);

            }

        }


    </script>



    <script>

        function toggle_desc() {
            type = $('.description').prop('checked');
            if (type == true) {
                //english
                $('.description_en').removeClass('d-none');
                $('.description_ar').addClass('d-none');
                $('.en-button').removeClass('d-none');
                $('.ar-button').addClass('d-none');

                $('.agent-profile-en').removeClass('d-none');
                $('.agent-profile-ar').addClass('d-none');
                $('.features_copy_en').removeClass('d-none');
                $('.features_copy_ar').addClass('d-none');
                $('.templates-en').removeClass('d-none');
                $('.templates-ar').addClass('d-none');
            } else {
                $('.description_en').addClass('d-none');
                $('.description_ar').removeClass('d-none');
                $('.ar-button').removeClass('d-none');
                $('.en-button').addClass('d-none');

                $('.agent-profile-ar').removeClass('d-none');
                $('.agent-profile-en').addClass('d-none');
                $('.features_copy_ar').removeClass('d-none');
                $('.features_copy_en').addClass('d-none');

                $('.templates-ar').removeClass('d-none');
                $('.templates-en').addClass('d-none');


            }
        }


        function toggle_edit_desc(id) {
            type = $('.edit-toggle-description-' + id).prop('checked');
            if (type == true) {
                //english
                $('.edit_description_en_' + id).removeClass('d-none');
                $('.edit_description_ar_' + id).addClass('d-none');

                $('.en-button-' + id).removeClass('d-none');
                $('.ar-button-' + id).addClass('d-none');

                $('.agent-profile-en-' + id).removeClass('d-none');
                $('.agent-profile-ar-' + id).addClass('d-none');
                $('.features_copy_en_' + id).removeClass('d-none');
                $('.features_copy_ar_' + id).addClass('d-none');
                $('.templates-en-' + id).removeClass('d-none');
                $('.templates-ar-' + id).addClass('d-none');
            } else {
                $('.edit_description_en_' + id).addClass('d-none');
                $('.edit_description_ar_' + id).removeClass('d-none');

                $('.ar-button-' + id).removeClass('d-none');
                $('.en-button-' + id).addClass('d-none');

                $('.agent-profile-ar-' + id).removeClass('d-none');
                $('.agent-profile-en-' + id).addClass('d-none');
                $('.features_copy_ar_' + id).removeClass('d-none');
                $('.features_copy_en_' + id).addClass('d-none');

                $('.templates-ar-' + id).removeClass('d-none');
                $('.templates-en-' + id).addClass('d-none');


            }
        }


        function getCommunitites(type, id) {

            var city_id = '';
            if (type == "create") {
                city_id = $('.city-in-create').val();

            } else {
                city_id = $('.city-in-edit-' + id).val();

            }


            $.ajax({
                url: '{{  route("listings.get-communities") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    city_id: city_id,
                },
                success: function (data) {

                    var option = '';
                    var locale = @json(app()->getLocale());
                    data.communities.forEach(function (value, key) {
                        if (type == 'create') {
                            option += '<option value="' + value.id + '" class="create-appended-communities">';
                        } else {
                            option += '<option value="' + value.id + '" class="edit-appended-communities-' + id + '">';
                        }


                        if (locale == 'en') {

                            option += value.name_en;
                        } else {
                            option += value.name_ar;
                        }
                        option += '</option>';

                    });


                    if (type == "create") {
                        $('.create-appended-communities').remove();
                        $('.create-appended-sub-communities').remove();
                        $('.community-in-create').append(option)


                    } else {
                        $('.edit-appended-communities-' + id).remove();
                        $('.edit-appended-sub-communities-' + id).remove();
                        $('.community-in-edit-' + id).append(option)

                    }


                },
                error: function (error) {

                },
            })


        }

        function getSubCommunities(type, id) {
            var community_id = '';
            if (type == "create") {
                community_id = $('.community-in-create').val();

            } else {
                community_id = $('.community-in-edit-' + id).val();
            }


            $.ajax({
                url: '{{  route("listings.get-sub-communities") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    community_id: community_id,
                },
                success: function (data) {

                    var option = '';
                    var locale = @json(app()->getLocale());

                    data.sub_communities.forEach(function (value, key) {
                        if (type == 'create') {
                            option += '<option value="' + value.id + '" class="create-appended-sub-communities">';
                        } else {
                            option += '<option value="' + value.id + '" class="edit-appended-sub-communities-' + id + '">';
                        }

                        if (locale == 'en') {

                            option += value.name_en;
                        } else {
                            option += value.name_ar;
                        }
                        option += '</option>';

                    })


                    if (type == "create") {
                        $('.create-appended-sub-communities').remove();
                        $('.sub-community-in-create').append(option)

                    } else {
                        $('.edit-appended-sub-communities-' + id).remove();
                        $('.sub-community-in-edit-' + id).append(option)
                    }


                },
                error: function (error) {

                },
            })


        }
    </script>



    <script>


        function editSplitLatLng(latLng, id) {
            var newString = latLng.substring(0, latLng.length - 1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng = trainindIdArray[1];
            $("#latitude_" + id).val(lat);
            $("#longitude_" + id).val(Lng);
        }


        function removePhoto(input, table) {
            var id = input.id
            var sliced_id = id.slice(7);
            var photo_id = $('#' + sliced_id + ' .photo-id').val();
            $.ajax({
                url: '{{  route("listings.remove-listing-temporary") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: photo_id,
                    type: 'photo',
                    table: table

                },
                success: function (data) {

                    $('#' + sliced_id).remove();

                },
                error: function (error) {

                },
            })

        }


        function removeDocument(input, table) {

            var id = input.id
            var sliced_id = id.slice(7);
            var document_id = $('#' + sliced_id + ' .document-id').val();
            $.ajax({
                url: '{{  route("listings.remove-listing-temporary") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: document_id,
                    type: 'document',
                    table: table

                },
                success: function (data) {

                    $('#' + sliced_id).remove();

                },
                error: function (error) {

                },
            })

        }


        function removePlan(input, table) {
            var id = input.id
            var sliced_id = id.slice(7);
            var plan_id = $('#' + sliced_id + ' .plan-id').val();
            $.ajax({
                url: '{{  route("listings.remove-listing-temporary") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: plan_id,
                    type: 'plan',
                    table: table

                },
                success: function (data) {

                    $('#' + sliced_id).remove();

                },
                error: function (error) {

                },
            })

        }


        function modifyName(id, table, type) {

            var title = $('#rename_' + id.id).val();

            if (title === '') {
                return;
            }
            $.ajax({
                url: '{{  route("listings.modify-listing-title") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id.id,
                    title: title,
                    table: table,
                    type: type
                },
                success: function (data) {
                    $('#rename_' + id.id).val('');
                    $('#title_' + id.id).text(title);
                    $('#save_success_' + id.id).text(data.message);
                    $('#save_success_' + id.id).removeClass('d-none');
                    setTimeout(function () {
                        $('#save_success_' + id.id).addClass('d-none');
                    }, 2000)

                },
                error: function (error) {

                },
            })
        }

        function togglePlanWatermark(input, table) {
            var id = input.id
            var sliced_id = id.slice(10);
            var plan_id = $('#' + sliced_id + ' .plan-id').val();


            $.ajax({
                url: '{{  route("listings.update-listing-temporary-active") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: plan_id,
                    type: 'plan',
                    table: table

                },
                success: function (data) {

                    $('#' + sliced_id + ' .plan-with-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .plan-no-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .plan-with-enlarg-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .plan-no-enlarg-watermark').toggleClass('d-none')


                },
                error: function (error) {

                },
            })


        }

        function toggleWatermark(input, table) {

            var id = input.id
            var sliced_id = id.slice(10);
            var photo_id = $('#' + sliced_id + ' .photo-id').val();


            $.ajax({
                url: '{{  route("listings.update-listing-temporary-active") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: photo_id,
                    type: 'photo',
                    table: table

                },
                success: function (data) {

                    $('#' + sliced_id + ' .with-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .no-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .with-enlarg-watermark').toggleClass('d-none')
                    $('#' + sliced_id + ' .no-enlarg-watermark').toggleClass('d-none')


                },
                error: function (error) {

                },
            })

        }


        function updateMain(input, table, listing_id) {

            // checked-main-uploaderFile89ljjtz9nx check box
            // 89ljjtz9nx  select

            var id = input.id
            var sliced_id = id.slice(13);

            var slicedForListingCategory = sliced_id.slice(12);

            if ($('#listing-category-' + slicedForListingCategory).val() == '') {
                toast("Please Select a Category First", 'error')
                $('#' + input.id).prop('checked', false);
                return false;
            }
            if ($('#listing-category-' + slicedForListingCategory).find(':selected').data('allowed') == 'no') {
                toast("This Category Not Allowed To be Main Photo", 'error')
                $('#' + input.id).prop('checked', false);
                return false;
            }


            $(' .checked_main').prop('checked', false);

            $('.checked_main_hidden').val('no');

            $('#' + input.id).prop('checked', true);

            $('#' + input.id + '-hidden').val('yes');
            var photo_id = $('#' + sliced_id + ' .photo-id').val();
            if (table == 'main') {


                $.ajax({
                    url: '{{  route("listings.update-listing-main-photo") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: photo_id,
                        listing_id: listing_id


                    },
                    success: function (data) {

                    },
                    error: function (error) {

                    },
                })
            }

        }


        function updateListingCategory(input, table) {

            var id = input.id
            var sliced_id = id.slice(17);
            var photo_id = $('#uploaderFile' + sliced_id + ' .photo-id').val();


            var category_id = $('#' + input.id).val()


            $.ajax({
                url: '{{  route("listings.update-listing-temporary-category") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: photo_id,
                    category_id: category_id,
                    table: table

                },
                success: function (data) {

                    toast(data.message, 'success')
                },
                error: function (error) {

                },
            })


        }

        function handleCloseModal(listing) {


            let isAllSelected = ![...document.querySelectorAll('.listing-category-' + listing)].some(el => el.value == '');

            if (isAllSelected) {
                $('#photos-modal_' + listing).modal('toggle');
            } else {
                toast('please select all categories', 'error');
            }

        }

    </script>
@endpush

