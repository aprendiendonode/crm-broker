



   
   
        <!-- Info Alert Modal -->
        <div id="delete-alert-modal_{{ $community->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-danger"></i>
                            <h4 class="mt-2">@lang('listing.head_up')</h4>
                            <p class="mt-3">@lang('agency.delete_warning')</p>
                            <form action="{{ route('sub-communities.destroy',$community->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger my-2">@lang('listing.confirm_delete')</button>
                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('listing.cancel')</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    

