<div class="mb-2">

    <form method="GET" autocomplete="off">
        <div class="row">



            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.reference')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_reference"
                           value="{{ request()->has('filter_reference') ? request()->get('filter_reference') : '' }}"
                           id="defaultconfig">
                </div>
            </div>







        </div>
        <div>
            <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary "
               href="{{ url('sales/failed_leads/'.request('agency')) }}">@lang('sales.reset_filters')</a>
        </div>


    </form>
</div>
