<form id="edit-staff-form-{{ $listing->id }}" action="{{ route('listing.update',$listing->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    {{-- <div class="d-flex justify-content-start mb-2">

        <button onclick="event.preventDefault();close_edit({{ $listing->id }})" type="button"
            class="btn  btn-outline-success waves-effect waves-light">
            @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div> --}}
    <div class="row">





        <div class="col-lg-6">
            <div class="card">
                @include('listing::listing.edit.tabs.photos')
            </div>
            <!-- END carousel-->
        </div>


        <div class="col-xl-6">

            <div class="row">
                <div class="col-xl-12">
                    @include('listing::listing.edit.tabs.agent')

                </div>
                <div class="col-xl-12">

                    @include('listing::listing.edit.tabs.pricing')


                </div>


            </div>

        </div> <!-- end col -->
        <div class="col-xl-6">
            @include('listing::listing.edit.tabs.details_modals')
        </div> <!-- end col -->


        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12">
                    @include('listing::listing.edit.tabs.locations')
                </div>
                <div class="col-xl-12">
                    @include('listing::listing.edit.tabs.documents_plans_extra')
                </div>
            </div>


        </div>


    </div>

    {{-- <div class="d-flex justify-content-start">

        <button onclick="event.preventDefault();close_edit({{ $listing->id }})" type="button"
            class="btn  btn-outline-success waves-effect waves-light">
            @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div> --}}

    @include('listing::listing.modals.edit_modals')


</form>
