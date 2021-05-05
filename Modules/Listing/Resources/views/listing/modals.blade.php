

              
                            @can('delete_listing')
                                <!-- Info Alert Modal -->
                                <div id="delete-alert-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-danger"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('agency.delete_warning')</p>
                                                    <form action="{{ url('agency/deleteuser') }}" method="post">
                                                        @csrf
                                                        <input  type="hidden" name="user_id" value="{{ $listing->id }}">
                                                        <div class="">
                                                            <button type="submit" class="btn btn-danger m-2">@lang('agency.confirm_delete')</button>
                                                            <button type="button" class="btn btn-success m-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 

