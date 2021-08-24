
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








<!-- Center landlord modal content -->
<div class="modal fade" id="add_tenant" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_tenant')   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
    
            <div class="d-flex justify-content-center">
    
                <p class="error-message font-weight-medium text-danger"></p>
            </div>
            <div class="modal-body">
                <form  action="{{ url('listing/manage_tenant') }}" method="POST" >
                    @csrf
    
                    @if($agency)
                    <input type="hidden" name="agency_id" value="{{ $agency }}">
                    @endif
                    @if($business)
                    <input type="hidden" name="business_id" value="{{ $business }}">
                    @endif

     
                    <div class="form-group">
                        <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>

                        <select name="salutation" class="form-control tenant_salutation" id="salutation">
                            <option value="Mr">@lang('sales.Mr')</option>
                            <option value="Mrs">@lang('sales.Mrs')</option>
                            <option value="Miss">@lang('sales.Miss')</option>
                            <option value="Ms">@lang('sales.Ms')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                        <input type="text" class="form-control tenant_name" name="name"     placeholder="@lang('sales.name')" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.email')</label>
                        <input type="text" class="form-control tenant_email" name="email"     placeholder="@lang('sales.email')" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.phone')</label>
                        <input type="text" class="form-control tenant_phone" name="phone"     placeholder="@lang('sales.phone')" required>
                    </div>

                    <div class="form-group ">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.sources')
                        </label>
            
                        <div class="input-group">
                        <div class="input-group-prepend w-100">
                            @can('manage_listing_setting')
                            <div 
                            class="input-group-text cursor-pointer"
                            data-toggle="modal"
                            data-target="#add_source" 
                              onclick="event.preventDefault()" id="basic-addon1">
                                <i 
                                data-plugin="tippy" title="@lang('sales.tenant_source')"
                                data-tippy-placement="top-start" 
            
                              
                                
                                class="fas fa-plus-circle"
                                ></i>
                            </div>
                            @endcan
                
                                <select  style="" class="form-control select_souce_id tenant_source_id select2"  data-toggle="select2" data-placeholder="@lang('listing.sources')" required>
                                        <option value="" class="font-weight-medium text-muted"></option>
                                        @forelse($lead_sources as $source)
                                            <option @if(old("source_id") == $source->id) selected @endif  value="{{ $source->id}}">
                                                {{ $source->{'name_'.app()->getLocale()} }}
                                            </option>
                                        @empty
                                        @endforelse
                                </select>
                        
                         
                       
                           
                   </div>
                </div>
                </div>
            
                    
                    <div class="form-group text-center">
                        <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_tenant(
                            {{ $listing->agency_id }},{{ $listing->business_id}}, '{{ app()->getLocale() }}',
                            '{{ route('listing.tenant-store')  }}','{{ csrf_token() }}'
                        )" >@lang('sales.confirm')</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    










<!-- Center landlord modal content -->
<div class="modal fade" id="add_landlord" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_landlord')   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
    
            <div class="d-flex justify-content-center">
    
                <p class="error-message font-weight-medium text-danger"></p>
            </div>
            <div class="modal-body">
                <form  action="{{ url('listing/manage_landlord') }}" method="POST" >
                    @csrf
    
                    @if($agency)
                    <input type="hidden" name="agency_id" value="{{ $agency }}">
                    @endif
                    @if($business)
                    <input type="hidden" name="business_id" value="{{ $business }}">
                    @endif

     
                    <div class="form-group">
                        <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>

                        <select name="salutation" class="form-control landlord_salutation" id="salutation">
                            <option value="Mr">@lang('sales.Mr')</option>
                            <option value="Mrs">@lang('sales.Mrs')</option>
                            <option value="Miss">@lang('sales.Miss')</option>
                            <option value="Ms">@lang('sales.Ms')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.name')</label>
                        <input type="text" class="form-control landlord_name" name="name"     placeholder="@lang('sales.name')" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.email')</label>
                        <input type="text" class="form-control landlord_email" name="email"     placeholder="@lang('sales.email')" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.phone')</label>
                        <input type="text" class="form-control landlord_phone" name="phone"     placeholder="@lang('sales.phone')" required>
                    </div>

                    <div class="form-group ">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.sources')
                        </label>
            
                        <div class="input-group">
                        <div class="input-group-prepend w-100">
                            @can('manage_listing_setting')
                            <div 
                            class="input-group-text cursor-pointer"
                            data-toggle="modal"
                            data-target="#add_source" 
                              onclick="event.preventDefault()" id="basic-addon1">
                                <i 
                                data-plugin="tippy" title="@lang('sales.landlord_source')"
                                data-tippy-placement="top-start" 
            
                              
                                
                                class="fas fa-plus-circle"
                                ></i>
                            </div>
                            @endcan
                
                                <select  style="" class="form-control select_souce_id landlord_source_id select2"  data-toggle="select2" data-placeholder="@lang('listing.sources')" >
                                        <option value="" class="font-weight-medium text-muted"></option>
                                        @forelse($lead_sources as $source)
                                            <option @if(old("source_id") == $source->id) selected @endif  value="{{ $source->id}}">
                                                {{ $source->{'name_'.app()->getLocale()} }}
                                            </option>
                                        @empty
                                        @endforelse
                                </select>
                        
                         
                       
                           
                   </div>
                </div>
                </div>
            
                    
                    <div class="form-group text-center">
                        <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_landlord()" >@lang('sales.confirm')</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    




<!-- Center developer modal content -->
<div class="modal fade" id="add_developer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myCenterModalLabel">@lang('sales.new_developer')   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
    
            <div class="d-flex justify-content-center">
    
                <p class="error-message font-weight-medium text-danger"></p>
            </div>
            <div class="modal-body">
                <form  action="{{ url('listing/manage_developer') }}" method="POST" >
                    @csrf
    
                    @if($agency)
                    <input type="hidden" name="agency_id" value="{{ $agency }}">
                    @endif
                    @if($business)
                    <input type="hidden" name="business_id" value="{{ $business }}">
                    @endif

     
            
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_en')</label>
                        <input type="text" class="form-control developer_name_en" name="name_en"     placeholder="@lang('sales.name_en')" >
                    </div>
              
            
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('sales.name_ar')</label>
                        <input type="text" class="form-control developer_name_ar" name="name_ar"     placeholder="@lang('sales.name_ar')" >
                    </div>
              
              

     
            
                    
                    <div class="form-group text-center">
                        <button class="btn btn-rounded btn-primary" onclick="event.preventDefault();add_developer()" >@lang('sales.confirm')</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    



@push('js')
<script>
    function show_status_modal(id){
               
                new_status = $('#modify_listing_status_'+id).val();
                        if(new_status == '' || id == '' ){
                    return false
                }

                $.ajax({
            url : "{{ url('listing/listing-update-status') }}",
            type : "POST",
            data : {
                _token    : '{{ csrf_token() }}',
                id        : id,
                status : new_status,
            },
            success : function (data) {

                $('#status-alert-modal_'+id).modal('hide');
                
                $('#modify_listing_status_'+id +' option')
                        .removeAttr('selected')
                        .filter('[value='+data.listing.status+']')
                        .attr('selected', true)

                        $('#modify_listing_type_'+id).val(data.listing.status).change();

                toast(data.message,'success');
            },
            error:function (error) {

                toast(error.responseJSON.message,'error');

            }
            });

        }
function change_listing_qualification(id){

new_status = $('#modify_listing_status_'+id).val();

if(new_status == '' || id == '' ){
    return false
}





}

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
    
 

    function add_landlord(){
        var name  =  $('.landlord_name').val();
        var email  =  $('.landlord_email').val();
        var phone  =  $('.landlord_phone').val();
        var salutation  =  $('.landlord_salutation').val();
        var source_id  =  $('.landlord_source_id').val();
      
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name == ''){
            $('.error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ route('listing.landlord-store')  }}",
            type:'POST',
            data:{
                name : name,
                email : email,
                phone : phone,
                salutation : salutation,
                source_id : source_id,
                agency  : agency,
                business: business,
                _token  :'{{ csrf_token() }}'
            },
            success: function(data){
                $('.error-message').text('');
                name = data.data.name
                html = '<option value='+data.data.id+' >'+name+'</option>'
                $('.select_landlord_id').append(html)
                   $('.landlord_name').val('');
                $('#add_landlord').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
    
                toast(error.responseJSON.message,'error')
               
            }
        })
    }
    



    function add_developer(){
        var name_en  =  $('.developer_name_en').val();
        var name_ar  =  $('.developer_name_ar').val();
      
        var agency   =  @json($agency);
        var business =  @json($business);

        var locale = @json(app()->getLocale());
    
        if(name_en == ''){
            $('.error-message').text('invalid data');
            return false;
        }
        
        $.ajax({
            url:"{{ route('listing.developer-store')  }}",
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
                $('.select_developer_id').append(html)
                   $('.developer_name').val('');
                $('#add_developer').modal('hide');

                toast(data.message, 'success')

            },
            error: function (error) {
                $('.error-message').text(error.responseJSON.message);
            }
        })
    }
</script>

@endpush