
                            @can('edit_team')                   <!-- Center modal content -->
                            <div class="modal fade" id="change_team_{{ $staff->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title text-center" id="myCenterModalLabel"> <i class="fas fa-users"></i>  @lang('agency.change_team') @lang('agency.of') {{  $staff->{'name_'.app()->getLocale()} }}</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">


                                            <form  action="{{ url('agency/staff/change-team') }}" method="POST" >

                                                @csrf
                                                @if($business)
                                                    <input type="hidden" name="business_id" value="{{ $business }}">
                                                @endif
                                                @if($agency)
                                                    <input type="hidden" name="agency_id" value="{{ $agency }}">
                                                @endif
                                                <input type="hidden" name="staff_id" value="{{ $staff->id }}">

                                                <select class="form-control select2" name="team_id" data-toggle="select2" data-placeholder="@lang('agency.change_team')">
                                                    <option value=""></option>

                                                    @forelse($teams as $team)
                                                        <option value="{{ $team->id }}" @if($staff->team_id == $team->id) selected  @endif>{{ $team->{'name_'.app()->getLocale()} }}</option>

                                                    @empty

                                                        <option value="" >@lang('agency.no_records')</option>

                                                    @endforelse
                                                </select>
                                                {{--@if($staffs && $staffs->where('team_id','!=' ,$team->id)->count() > 0)--}}
                                                    <div class="form-group text-center pt-3">
                                                        <button class="btn btn-rounded btn-primary" type="submit">@lang('agency.add_member')</button>

                                                        {{--@endif--}}
                                                    </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            @endcan

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
                                                    <form action="{{ url('delete_moderator/'.$staff->id) }}" method="post">
                                                        @csrf

                                                        {{ method_field('DELETE') }}
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
                    <h5 class="modal-title" id="myCenterModalLabel">@lang('moderator.add_moderator_agencies')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
  
                    <form action="{{ url('agency/make-moderator') }}" method="POST" class="px-3" action="#">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $staff->id }}">
                        <input type="hidden" name="moderator" value="yes">
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted">@lang('agency.agency')</label>

                        <select class="form-control select2-multiple" name="agencies[]" data-toggle="select2" multiple="multiple" data-placeholder="@lang('agency.choose_agency')">
                            @forelse(auth()->user()->agencies as $agency)
                                {{--<option value="{{ $agency->id }}" @if($staff->agency_id == $agency->id) selected @endif>{{ $agency->{'company_name_'.app()->getLocale()} }}</option>--}}
                                <option value="{{ $agency->id }}" @if(in_array($agency->id, explode(',',$staff->can_access))) selected @endif>{{ $agency->{'company_name_'.app()->getLocale()} }}</option>
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
