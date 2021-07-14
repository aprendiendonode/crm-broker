



   
   
        <!-- Info Alert Modal -->
        <div id="delete-alert-modal_{{ $permission->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-danger"></i>
                            <h4 class="mt-2">@lang('listing.head_up')</h4>
                            <p class="mt-3">@lang('agency.delete_warning')</p>
                            <form action="{{ route('permissions.destroy',$permission->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input  type="hidden" name="permission_id" value="{{ $permission->id }}">
                                <button type="submit" class="btn btn-danger my-2">@lang('superadmin.permissions.confirm_delete')</button>
                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('superadmin.permissions.cancel')</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    

