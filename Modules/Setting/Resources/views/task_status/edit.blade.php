<form action="{{ route('setting.task_status.update',$edited_status->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @method('PATCH')

        <div class="col-md-12">

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.status_en')</label>
                <input type="text" class="form-control"  name="status_en_{{ $edited_status->id }}" id="status_setting_en_{{ $edited_status->id }}" value="{{ old('status_en_'. $edited_status->id , $edited_status->status_en ) }}" placeholder="@lang('settings.status_en')" required>
            </div>

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.status_ar')</label>
                <input type="text" class="form-control"  name="status_ar_{{ $edited_status->id }}" id="status_setting_ar_{{ $edited_status->id }}" value="{{ old('status_ar_'. $edited_status->id , $edited_status->status_ar ) }}" placeholder="@lang('settings.status_ar')" required>
            </div>

            <div class="form-group">
                <label>@lang('settings.type_complete')</label> <br/>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="customRadio_{{ $edited_status->id }}" name="edit_type_{{ $edited_status->id }}" value="on"  class="custom-control-input" @if(old('edit_type_'.$edited_status->id,$edited_status->type_complete) == 'on') checked @endif  >
                    <label class="custom-control-label" for="customRadio_{{ $edited_status->id }}">@lang('settings.on')</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">

                    <input  type="radio" id="custom_Radio_{{ $edited_status->id }}" name="edit_type_{{ $edited_status->id }}" value="off" class="custom-control-input" @if(old('edit_type_'.$edited_status->id,$edited_status->type_complete) == 'off') checked @endif   >
                    <label class="custom-control-label" for="custom_Radio_{{ $edited_status->id }}"> @lang('settings.off')</label>
                </div>

            </div>
        </div>

    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_edit_div({{ $edited_status->id }})" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
            @lang('settings.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('settings.modify')
        </button>
    </div>

</form>

