<form action="{{ route('setting.maillists.update',$maillist->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @method('PATCH')



        <div class="col-md-12">



            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.name_en')</label>
                <input type="text" class="form-control"  name="edit_name_en_{{ $maillist->id }}"  value="{{ old('edit_name_en_'.$maillist->id,$maillist->name_en) }}" placeholder="@lang('settings.name_en')" required>
            </div>


            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.name_ar')</label>
                <input type="text" class="form-control"  name="edit_name_ar_{{ $maillist->id }}"  value="{{ old('edit_name_ar_'.$maillist->id,$maillist->name_ar) }}" placeholder="@lang('settings.name_ar')" required>
            </div>





            <div class="form-group">
                <label for="" class="font-weight-medium text-muted">@lang('settings.maillist_contacts')</label>
                <select class="form-control select2 " data-toggle="select2" multiple name="edit_mails_{{ $maillist->id }}[]" >
                    <option value="">@lang('settings.select')</option>
                    @foreach(explode(',',$maillist->mails) as $mail)
                        <option value="{{$mail}}" {{in_array($mail,explode(',',$maillist->mails)) ? 'selected' : ''}}>{{$mail}}</option>
                    @endforeach
                </select>
            </div>



        </div>



    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_edit_div({{ $maillist->id }})" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
            @lang('settings.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('settings.modify')
        </button>
    </div>

</form>

