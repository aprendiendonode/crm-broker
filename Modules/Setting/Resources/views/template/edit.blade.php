<form action="{{ route('setting.templates.update',$template->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @method('PATCH')



        <div class="col-md-12">



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.template_title')</label>
                <input type="text" class="form-control"  name="edit_title_{{ $template->id }}"  value="{{ old('edit_title_'.$template->id,$template->title) }}" placeholder="@lang('settings.template_title')" required>
            </div>


            <div class="form-group">
                <label>@lang('settings.template_type')</label> <br/>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="customRadio_{{ $template->id }}" name="edit_type_{{ $template->id }}" value="description"  class="custom-control-input" @if(old('edit_type_'.$template->id,$template->type) == 'description') checked @endif  >
                    <label class="custom-control-label" for="customRadio_{{ $template->id }}">@lang('settings.description')</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">

                    <input  type="radio" id="custom_Radio_{{ $template->id }}" name="edit_type_{{ $template->id }}" value="email" class="custom-control-input" @if(old('edit_type_'.$template->id,$template->type) == 'email') checked @endif   >
                    <label class="custom-control-label" for="custom_Radio_{{ $template->id }}"> @lang('settings.email')</label>
                </div>

            </div>


            <div class="form" >


                <div class="form-group custom-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="mb-1 font-weight-medium text-muted" for="description_en">@lang('settings.content')</label>

                        <input onchange="toggle_edit_desc({{ $template->id }})" class="description_edit_{{ $template->id }}" type="checkbox"
                               checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                               data-offstyle="success">

                    </div>

                    <div class="description_edit_en_{{ $template->id }}">

                        <textarea id="description_edit_en_{{ $template->id }}" name="edit_description_en_{{ $template->id }}" >{{old('edit_description_en_'.$template->id,$template->description_en)}}</textarea>
                    </div>
                    <div class="description_edit_ar_{{ $template->id }} d-none">

                        <textarea id="description_edit_ar_{{ $template->id }}"  name="edit_description_ar_{{ $template->id }}" >{{old('edit_description_ar_'.$template->id,$template->description_ar)}}</textarea>
                    </div>

                </div>

            </div>




        </div>



    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_edit_div({{ $template->id }})" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
            @lang('settings.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('settings.modify')
        </button>
    </div>

</form>

