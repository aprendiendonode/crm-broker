@extends('layouts.master')
@section('title',trans('settings.change_password'))
@section('content')
    <div class="content p-3">
        <h3>@lang('settings.change_password')</h3>

        <form action="{{route('setting.profiles.change_password_process')}}" method="post" >
            @csrf

            <div class="mb-2">

                <div class="row">

                    <div class="col-sm-6">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="current_password">@lang('settings.current_password')</label>
                                <input type="password" name="current_password" class="form-control" id="current_password" required >
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="new_password">@lang('settings.new_password')</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="new_password_confirmed">@lang('settings.new_password_confirmed')</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmed" required>
                            </div>

                        </div>




                    </div>


                </div>
                <div class="ml-2">
                    <button class="btn btn-primary " type="submit">@lang('settings.submit')</button>
                </div>
            </div>

        </form>
    </div>
@endsection









