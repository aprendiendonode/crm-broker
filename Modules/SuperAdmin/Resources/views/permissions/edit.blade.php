<form action="{{ url('superadmin/permissions/'.$permission->id) }}" data-parsley-validate="" method="POST" >
    <div class="row">
            @csrf
            @method('PATCH')
      
            <div class="row col-md-8">
          
                <div class="col-md-4 form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissions.name')</label>
                    <input type="text" class="form-control"  name="name" id="name" value="{{ $permission->name }}" placeholder="@lang('superadmin.permissions.name')" required>
                </div>

                <div class="col-md-4 form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissions.group_name')</label>
                    <select name="permission_group_id" class="form-control" id="">
                        @foreach ($permissions_groups as $group)
                            <option value="{{ $group->id }}" {{$permission->permission_group_id === $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
    
    
        </div>
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $permission->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('superadmin.permissionsGroup.cancel')
        </button>
        <button type="submit" class="btn btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.permissionsGroup.modify')
        </button>
    </div>
    
    </form>

