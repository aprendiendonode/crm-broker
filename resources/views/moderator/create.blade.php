    <form id="add-staff-form" action="{{ url('manage_moderator') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf

            @if($agency)
            <input type="hidden" name="agency_id" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="business_id" value="{{ $business }}">
            @endif
        <div class="col-md-6">


        
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control"  name="name_en" id="name_en" value="{{ old('name_en') }}" placeholder="@lang('agency.english_name')" required>
                </div>

                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name_ar')</label>
                    <input type="text" class="form-control"  name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('agency.arabic_name')">
                </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.email')</label>
                    <input type="email" class="form-control"  name="email" id="email"  value="{{ old('email') }}" required placeholder="@lang('agency.email')">
                </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.brn')</label>
                    <input type="text" class="form-control"  name="brn" value="{{ old('brn') }}" id="brn" placeholder="@lang('agency.brn')">
                </div>


                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.password')</label>
                    <input type="password" class="form-control" name="password" id="password" required placeholder="@lang('agency.password')">
                </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.confirm')</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="@lang('agency.confirm')">
                </div>


                
    
                    <div class="form-group">
                        <label for="">@lang('agency.team')</label>
                        <select class="form-control select2" name="team_id" data-toggle="select2" data-placeholder="@lang('agency.select_team')">
                            <option value=""></option>
                            @forelse($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->{'name_'.app()->getLocale()} }}</option>
                            @empty
                            @endforelse
            
                        </select>
                
                    </div>

                    <div class="form">
                        

                            <div class="form-group custom-toggle">
                                <div class="d-flex justify-content-between">
                                <label class="mb-1 font-weight-medium text-muted" for="description_en">@lang('agency.about_you')</label>
                                
                                    <input onchange="toggle_desc()" class="description" type="checkbox"
                                    checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                                    data-offstyle="success">
                                
                            </div>
                    
                                <div class="description_en">

                                    <textarea id="description_en" name="description_en" >{{old('description_en')}}</textarea>
                                </div>    
                                <div class="description_ar d-none">


                                    <textarea id="description_ar"  name="description_ar" >{{old('description_ar')}}</textarea>
                                </div>

                            </div>
                        
                    </div>


                    
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted"
                                for="image">@lang('agency.image')</label>
                            <input type="file" name="image" data-plugins="dropify" id="image"
                                data-default-file="" />
                        </div>
            
        </div>

        <div class="col-md-6">
        
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.primary')</label>
                    <div class="d-flex">
                        
             
                        <div class="" style="flex:4">
                            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('agency.phone')" type="text" class="form-control" name="phone"   value="{{ old('phone') }}" placeholder="@lang('agency.phone')" id="phone" required>
                        </div>
                    </div>
                </div>
                




                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.secondary')</label>
                    <div class="d-flex">
                  
                
                        <div class="" style="flex:4">
                            <input data-plugin="tippy" data-tippy-placement="top-start" pattern="/^([0-9\s\-\+\(\)]*)$/" title="@lang('agency.cell')" type="text" class="form-control" name="cell" placeholder="@lang('agency.cell')"  value="{{ old('cell') }}" id="cell">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.fax')</label>
                    <div class="d-flex">
                        


                        <div class="" style="flex:4">
                            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('agency.staff_fax')" type="text" class="form-control" name="staff_fax"   value="{{ old('staff_fax') }}"  placeholder="@lang('agency.staff_fax')"  id="staff_fax">
                        </div>
                    </div>
                </div>




                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('agency.address')</label>
                        <input type="text" class="form-control" value="{{ old('address') }}" name="address"  id="address">
                    </div>

                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('agency.zip')</label>
                        <input type="text" class="form-control" value="{{ old('zip') }}" name="zip" id="zip">
                    </div>


            
                    <div class="form-group">
                        <label for="country">@lang('agency.nationaly')</label>
                        <select required class="form-control select2" name="nationality_id" id="country" data-toggle="select2" data-placeholder="@lang('agency.select_nationality')">
                            <option value=""></option>
                        @foreach($countries as $country)
                            <option @if(old('nationality_id') == $country->id) selected @endif value="{{$country->id}}">{{$country->value ?? ''}}</option>
                        @endforeach

                        </select>
                    </div>



                <div class="form-group">
                    <label>@lang('agency.is_active')</label> <br/>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio1" name="active" value="1" checked class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">@lang('agency.yes')</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadio2" name="active" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2"> @lang('agency.no')</label>
                    </div>
            
                </div>





                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.skype')</label>
                    <input type="email" class="form-control" maxlength="25" value="{{ old('skype') }}" name="skype" id="skype">
                </div>


                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.whats_app')</label>
                    <input type="text" class="form-control" value="{{ old('whatsapp') }}"  name="whatsapp" id="whatsapp">
                </div>



            
        </div>

        
    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn  btn-outline-success waves-effect waves-light">
        @lang('agency.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
        </button>
    </div>

</form>
