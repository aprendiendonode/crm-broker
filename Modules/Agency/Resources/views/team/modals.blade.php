 

    @can('edit_team')                   <!-- Center modal content -->
    <div class="modal fade" id="add_member_{{ $team->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title text-center" id="myCenterModalLabel"> <i class="fas fa-users"></i>  @lang('agency.add_members')</h5>
                  
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">


                    <form  action="{{ url('agency/teams/add-member') }}" method="POST" >

                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                        @csrf
                        <div class="row pr-5 mb-2" >
                            <div class="col-md-4"></div>
                            <div class="col-md-4">@lang('agency.name')</div>
                            <div class="col-md-4">@lang('agency.email')</div>
                        </div>

                        @forelse($staffs->where('team_id','!=' ,$team->id) as $staff)
                        @if($staff->team_id != $team->id)
                        <div class="row pr-5 mb-2" >
                            <div class="col-md-4" style="padding:10px;"><input type="checkbox" name="members[]" value="{{ $staff->id }}"></div>
                            <div class="col-md-4" style="padding:10px;">{{ $staff->{'name_'.app()->getLocale()} }}</div>
                            <div class="col-md-4" style="padding:10px;">{{ $staff->email }}</div>
                                          
                        </div>
                        @endif
                        @empty

                        <div class="d-flex justify-content-center p-2 mb-2">
                            @lang('agency.no_records')
                        </div>
                        @endforelse
                        @if($staffs && $staffs->where('team_id','!=' ,$team->id)->count() > 0)
                        <div class="form-group text-center">
                            <button class="btn btn-rounded btn-primary" type="submit">@lang('agency.add_member')</button>

                        @endif    
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endcan




     

    @can('edit_team')                   <!-- Center modal content -->
    <div class="modal fade" id="view_member_{{ $team->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title text-center" id="myCenterModalLabel"> <i class="fas fa-users"></i>  @lang('agency.view_members')</h5>
                  
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">


                    <form  action="{{ url('agency/teams/add-member') }}" method="POST" >

                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                        @csrf
                        <div class="row pr-5 mb-2" >
                            <div class="col-md-6">@lang('agency.name')</div>
                            <div class="col-md-6">@lang('agency.controlls')</div>
                        </div>
                        @if($team->members )
                        @forelse($team->members as $staff)
                        <div class="row pr-5 mb-2" >
                            <div class="col-md-6" style="padding:10px;">{{ $staff->{'name_'.app()->getLocale()} }}</div>
                            <div class="col-md-6" style="padding:10px;"><a
                                                target="_blank"
                                                data-plugin="tippy" 
                                                data-tippy-placement="top-start" 
                                                title="@lang('agency.view_staff')" href="{{ url('agency/staff/'.request('agency').'?staff='.$staff->id) }}"><i class="fas fa-eye"></i></a></div>
                                          
                        </div>
                        @empty
                        <div class="d-flex justify-content-center p-2 mb-2">
                            @lang('agency.no_records')
                        </div>
                        @endforelse
                        @else
                        <div class="d-flex justify-content-center p-2 mb-2">
                            @lang('agency.no_records')
                        </div>
                        @endif
                
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endcan
    @can('delete_team')
        <!-- Info Alert Modal -->
        <div id="delete-alert-modal_{{ $team->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-danger"></i>
                            <h4 class="mt-2">@lang('agency.head_up')</h4>
                            <p class="mt-3">@lang('agency.delete_warning')</p>
                            <form action="{{ url('agency/deleteteam') }}" method="post">
                                @csrf
                                <input  type="hidden" name="team_id" value="{{ $team->id }}">
                                <button type="submit" class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endcan 

