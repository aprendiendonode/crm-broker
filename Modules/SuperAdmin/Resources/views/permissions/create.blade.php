<form id="add-team-form" action="{{ url('superadmin/permissions') }}" data-parsley-validate="" method="POST" >
    <div class="row">
            @csrf
    
        <div class="row col-md-8">
          
                <div class="col-md-4 form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissions.name')</label>
                    <input type="text" class="form-control"  name="name" id="name" value="{{ old('name') }}" placeholder="@lang('superadmin.permissions.name')" required>
                </div>

                <div class="col-md-4 form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissions.guard_name')</label>
                    <input type="text" class="form-control"  name="guard_name" id="name" value="{{ old('guard_name') }}" placeholder="@lang('superadmin.permissions.guard_name')">
                </div>

                <div class="col-md-4 form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissions.group_name')</label>
                    <select name="permission_group_id" class="form-control" id="">
                        @foreach ($permissions_groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
    
    
        </div>
        
        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-outline-success waves-effect waves-light">
           @lang('superadmin.permissions.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.permissions.submit')
        </button>
    </div>
    
    </form>
    