

                            @can('edit_staff')                   <!-- Center modal content -->
                            <div class="modal fade" id="changePassword_{{ $staff->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">@lang('agency.change_password') @lang('agency.of') {{  $staff->{'name_'.app()->getLocale()} }}   </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form  action="{{ url('agency/changepassword') }}" method="POST" >
                                                @csrf
                                                <input type="hidden" name='user_id' value="{{ $staff->id }}">
                                                <div class="form-group">
                                                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.password')</label>
                                                    <input type="password" class="form-control" name="password" id="edit_password_{{ $staff->id }}"   placeholder="@lang('agency.password')" required min="6">
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.confirm')</label>
                                                    <input type="password"  class="form-control" name="password_confirmation" required min="6"   placeholder="@lang('agency.confirm')">
                                                </div>
    
                                                
                                                <div class="form-group text-center">
                                                    <button class="btn btn-rounded btn-primary" type="submit">@lang('agency.confirm')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            @endcan
                            @can('delete_staff')
                                <!-- Info Alert Modal -->
                                <div id="delete-alert-modal_{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-danger"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('agency.delete_warning')</p>
                                                    <form action="{{ url('agency/deleteuser') }}" method="post">
                                                        @csrf
                                                        <input  type="hidden" name="user_id" value="{{ $staff->id }}">
                                                        <button type="submit" class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                                        <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 



@if(owner())
                                 <!-- Signup modal content -->
        <div id="moderator-modal_{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
           
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myCenterModalLabel">@lang('agency.make_staff_moderator')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
  
                    <form action="{{ url('agency/make-moderator') }}" method="POST" class="px-3" action="#">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $staff->id }}">
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted">@lang('agency.agency')</label>

                        <select class="form-control select2-multiple" name="agencies[]" data-toggle="select2" multiple="multiple" data-placeholder="@lang('agency.choose_agency')">
                            @forelse(auth()->user()->agencies as $agency)
                                <option value="{{ $agency->id }}" @if($staff->agency_id == $agency->id) selected @endif>{{ $agency->{'company_name_'.app()->getLocale()} }}</option>
                            @empty 
                            @endforelse    
                        
                            
                        </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" class="custom-control-input"  name="make_admin" value="no">
                                <input type="checkbox" class="custom-control-input" id="customCheck_{{ $staff->id }}" name="make_admin" value="yes">
                                <label class="custom-control-label" for="customCheck_{{ $staff->id }}">@lang('agency.give_him_admin')</label>
                            </div> 

                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">@lang('agency.approve')</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endif