



   
   
        <!-- Info Alert Modal -->
        <div id="delete-alert-modal_{{ $developer->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-danger"></i>
                            <h4 class="mt-2">@lang('sales.head_up')</h4>
                            <p class="mt-3">@lang('agency.delete_warning')</p>
                            <form action="{{ url('sales/delete-developer') }}" method="post">
                                @csrf
                                <input  type="hidden" name="developer_id" value="{{ $developer->id }}">
                                <button type="submit" class="btn btn-danger my-2">@lang('sales.confirm_delete')</button>
                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('sales.cancel')</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    

