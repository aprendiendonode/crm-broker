
<!-- Info Alert Modal -->
<div id="send_mail-alert-modal_{{$agency->id ?? ''}}" class="modal fade" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-success"></i>
                    <h4 class="mt-2">@lang('listing.contact_client')</h4>
                    <p class="mt-3">@lang('listing.send_request_confirmation')</p>
                    <form action="{{route('listings.send_request')}}" method="post">
                        @csrf
                        <input type="hidden" name="agency_id" value="{{$agency->id ?? ''}}">
                        <input type="hidden" name="sender_id" value="{{$sender->id ?? ''}}">
                        <button type="submit"
                                class="btn btn-success my-2">@lang('listing.confirm_send_mail')</button>
                        <button type="button" class="btn btn-light my-2 border-success"
                                data-dismiss="modal">@lang('settings.cancel')</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Info Alert Modal -->
<div id="block_agency-alert-modal_{{$agency->id ?? ''}}" class="modal fade" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-danger"></i>
                    <h4 class="mt-2">@lang('listing.block')</h4>
                    <p class="mt-3">@lang('listing.block_confirmation')</p>
                    <form action="{{route('listings.block')}}" method="post">
                        @csrf
                        <input type="hidden" name="agency_id" value="{{$agency->id ?? ''}}">
                        <input type="hidden" name="sender_id" value="{{$sender->id ?? ''}}">
                        <button type="submit"
                                class="btn btn-danger my-2">@lang('listing.confirm_block')</button>
                        <button type="button" class="btn btn-light my-2 border-success"
                                data-dismiss="modal">@lang('settings.cancel')</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
