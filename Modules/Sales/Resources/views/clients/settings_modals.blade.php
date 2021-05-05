



                            

                                              <!-- Center modal content -->
                            <div class="modal fade" id="add_source" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_lead_source')   </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>

                                        <div class="d-flex justify-content-center">

                                            <p class="error-message font-weight-medium text-danger"></p>
                                        </div>
                                        <div class="modal-body">
                                            <form  action="{{ url('sales/manage_lead_source') }}" method="POST" >
                                                @csrf

                                                @if($agency)
                                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                                @endif
                                                @if($business)
                                                <input type="hidden" name="business_id" value="{{ $business }}">
                                                @endif
                                                <div class="form-group">
                                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                                    <input type="text" class="form-control source_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                                    <input type="text" class="form-control source_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                                                </div>
    
                                                
                                                <div class="form-group text-center">
                                                    <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_lead_source()" >@lang('sales.confirm')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                            





            <!-- Center modal content -->
            <div class="modal fade" id="add_type" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_lead_type')   </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="d-flex justify-content-center">

                        <p class="type-error-message font-weight-medium text-danger"></p>
                    </div>
                    <div class="modal-body">
                        <form  action="{{ url('sales/manage_lead_type') }}" method="POST" >
                            @csrf

                            @if($agency)
                            <input type="hidden" name="agency_id" value="{{ $agency }}">
                            @endif
                            @if($business)
                            <input type="hidden" name="business_id" value="{{ $business }}">
                            @endif
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                <input type="text" class="form-control type_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                <input type="text" class="form-control type_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                            </div>

                            
                            <div class="form-group text-center">
                                <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_lead_type()" >@lang('sales.confirm')</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


            <!-- Center modal content -->
            <div class="modal fade" id="add_callstatus" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_callstatus')   </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
    
                        <div class="d-flex justify-content-center">
    
                            <p class="callstatus-error-message font-weight-medium text-danger"></p>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ url('sales/manage_callstatus') }}" method="POST" >
                                @csrf
    
                                @if($agency)
                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                @endif
                                @if($business)
                                <input type="hidden" name="business_id" value="{{ $business }}">
                                @endif
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                    <input type="text" class="form-control callstatus_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                    <input type="text" class="form-control callstatus_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                                </div>
    
                                
                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_call_status()" >@lang('sales.confirm')</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



            
        
            <!-- Center modal content -->
            <div class="modal fade" id="add_priority" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_lead_priority')   </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
    
                        <div class="d-flex justify-content-center">
    
                            <p class="priority-error-message font-weight-medium text-danger"></p>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ url('sales/manage_lead_priority') }}" method="POST" >
                                @csrf
    
                                @if($agency)
                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                @endif
                                @if($business)
                                <input type="hidden" name="business_id" value="{{ $business }}">
                                @endif
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                    <input type="text" class="form-control priority_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                    <input type="text" class="form-control priority_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                                </div>
    
                                
                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_lead_priority()" >@lang('sales.confirm')</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->





                   
        
            <!-- Center modal content -->
            <div class="modal fade" id="add_communication" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_lead_communication')   </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
    
                        <div class="d-flex justify-content-center">
    
                            <p class="communication-error-message font-weight-medium text-danger"></p>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ url('sales/manage_lead_communication') }}" method="POST" >
                                @csrf
    
                                @if($agency)
                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                @endif
                                @if($business)
                                <input type="hidden" name="business_id" value="{{ $business }}">
                                @endif
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                    <input type="text" class="form-control communication_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                    <input type="text" class="form-control communication_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                                </div>
    
                                
                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_lead_communication()" >@lang('sales.confirm')</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        




            


                   
        
            <!-- Center modal content -->
            <div class="modal fade" id="add_property" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_lead_property')   </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
    
                        <div class="d-flex justify-content-center">
    
                            <p class="property-error-message font-weight-medium text-danger"></p>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ url('sales/manage_lead_property') }}" method="POST" >
                                @csrf
    
                                @if($agency)
                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                @endif
                                @if($business)
                                <input type="hidden" name="business_id" value="{{ $business }}">
                                @endif
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                                    <input type="text" class="form-control property_name_en" name="name_en"     placeholder="@lang('sales.name')" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                                    <input type="text" class="form-control property_name_ar"  name="name_ar"    placeholder="@lang('sales.name_ar')" required>
                                </div>
    
                                
                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_lead_property()" >@lang('sales.confirm')</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


                
        
                         
@push('js')


<script>
  
    function add_lead_source(){
        var name_en  =  $('.source_name_en').val();
        var name_ar  =  $('.source_name_ar').val();
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ url('sales/lead_source_from_leads')  }}",
            type:'POST',
            data:{
                name_en : name_en,
                name_ar : name_ar,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.error-message').text('');
                name = '';
                if(locale == 'en'){
                    name = data.data.name_en
                } else {
                    name = data.data.name_ar
                  
                }

                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_souce_id').append(html)
                   $('.source_name_en').val('');
                   $('.source_name_ar').val('');
                $('#add_source').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.error-message').text(error.responseJSON.message);
            }
        })
    }
    



    function add_lead_type(){
        var name_en  =  $('.type_name_en').val();
        var name_ar  =  $('.type_name_ar').val();
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ url('sales/lead_type_from_leads')  }}",
            type:'POST',
            data:{
                name_en : name_en,
                name_ar : name_ar,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.type-error-message').text('');
                name = '';
                if(locale == 'en'){
                    name = data.data.name_en
                } else {
                    name = data.data.name_ar
                  
                }

                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_type_id').append(html)
                   $('.type_name_en').val('');
                   $('.type_name_ar').val('');
                $('#add_type').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.type-error-message').text(error.responseJSON.message);
            }
        })
    }

    
    function add_lead_priority(){
        var name_en  =  $('.priority_name_en').val();
        var name_ar  =  $('.priority_name_ar').val();
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.priority-error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ url('sales/lead_priority_from_leads')  }}",
            type:'POST',
            data:{
                name_en : name_en,
                name_ar : name_ar,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.priority-error-message').text('');
                name = '';
                if(locale == 'en'){
                    name = data.data.name_en
                } else {
                    name = data.data.name_ar
                  
                }

                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_priority_id').append(html)
                   $('.priority_name_en').val('');
                   $('.priority_name_ar').val('');
                $('#add_priority').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.priority-error-message').text(error.responseJSON.message);
            }
        })
    }


    

    
    function add_lead_communication(){
        var name_en  =  $('.communication_name_en').val();
        var name_ar  =  $('.communication_name_ar').val();
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.communication-error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ url('sales/lead_communication_from_leads')  }}",
            type:'POST',
            data:{
                name_en : name_en,
                name_ar : name_ar,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.communication-error-message').text('');
                name = '';
                if(locale == 'en'){
                    name = data.data.name_en
                } else {
                    name = data.data.name_ar
                  
                }

                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_communication_id').append(html)
                   $('.communication_name_en').val('');
                   $('.communication_name_ar').val('');
                $('#add_communication').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.communication-error-message').text(error.responseJSON.message);
            }
        })
    }





    
    
    function add_lead_property(){
        var name_en  =  $('.property_name_en').val();
        var name_ar  =  $('.property_name_ar').val();
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.property-error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ url('sales/lead_property_from_leads')  }}",
            type:'POST',
            data:{
                name_en : name_en,
                name_ar : name_ar,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.property-error-message').text('');
                name = '';
                if(locale == 'en'){
                    name = data.data.name_en
                } else {
                    name = data.data.name_ar
                  
                }

                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_property_id').append(html)
                   $('.property_name_en').val('');
                   $('.property_name_ar').val('');
                $('#add_property').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.property-error-message').text(error.responseJSON.message);
            }
        })
    }



    </script>
@endpush