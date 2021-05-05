<form action="{{ route('setting.task_types.update',$edited_type->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @method('PATCH')

        <div class="col-md-12">

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.type_en')</label>
                <input type="text" class="form-control"  name="type_en_{{ $edited_type->id }}" id="type_setting_en_{{ $edited_type->id }}" value="{{ old('type_en_'. $edited_type->id , $edited_type->type_en ) }}" placeholder="@lang('settings.type_en')" required>
            </div>

            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.type_ar')</label>
                <input type="text" class="form-control"  name="type_ar_{{ $edited_type->id }}" id="type_setting_ar_{{ $edited_type->id }}" value="{{ old('type_ar_'. $edited_type->id , $edited_type->type_ar ) }}" placeholder="@lang('settings.type_ar')" required>
            </div>

            {{--<div class="form-group">--}}
                {{--<label>@lang('settings.address_required')</label> <br/>--}}
                {{--<div class="custom-control custom-radio custom-control-inline">--}}
                    {{--<input  type="radio" id="customRadio_{{ $edited_type->id }}" name="edit_address_required_{{ $edited_type->id }}" value="on"  class="custom-control-input" @if(old('edit_address_required_'.$edited_type->id,$edited_type->type_complete) == 'on') checked @endif  >--}}
                    {{--<label class="custom-control-label" for="customRadio_{{ $edited_type->id }}">@lang('settings.on')</label>--}}
                {{--</div>--}}
                {{--<div class="custom-control custom-radio custom-control-inline">--}}

                    {{--<input  type="radio" id="custom_Radio_{{ $edited_type->id }}" name="edit_address_required_{{ $edited_type->id }}" value="off" class="custom-control-input" @if(old('edit_address_required_'.$edited_type->id,$edited_type->type_complete) == 'off') checked @endif   >--}}
                    {{--<label class="custom-control-label" for="custom_Radio_{{ $edited_type->id }}"> @lang('settings.off')</label>--}}
                {{--</div>--}}

            {{--</div>--}}
        </div>

    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_edit_div({{ $edited_type->id }})" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
            @lang('settings.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('settings.modify')
        </button>
    </div>

</form>

