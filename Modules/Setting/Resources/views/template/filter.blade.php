<button type="button" id="advanced-btn" class="btn btn-outline-primary waves-effect waves-light"

        onclick="advanced_search()">@lang('settings.advanced_search')</button>

<form  autocomplete="off" method="GET" class="m-2" id="advanced_filter_form" style="display: none;opacity:0;transition:0.7s">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('settings.template_title')</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ request()->has('title') ? request()->get('title') : '' }}"
                       placeholder="@lang('settings.template_title')" >
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">@lang('settings.filter_submit')</button>
        <a class="btn btn-outline-primary" href="{{ route('setting.templates.index',request('agency')) }}">@lang('settings.reset')</a>
    </div>

</form>
