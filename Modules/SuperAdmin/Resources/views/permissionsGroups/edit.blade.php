<form action="{{ url('superadmin/permissions-group/'.$group->id) }}" data-parsley-validate="" method="POST" >
    <div class="row">
            @csrf
            @method('PATCH')
      
        <div class="col-md-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('superadmin.permissionsGroup.name')</label>
                <input type="text" class="form-control"  name="name"  value="{{ $group->name }}" placeholder="@lang('superadmin.permissionsGroup.name')" required>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $group->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('superadmin.permissionsGroup.cancel')
        </button>
        <button type="submit" class="btn btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('superadmin.permissionsGroup.modify')
        </button>
    </div>
    
    </form>

