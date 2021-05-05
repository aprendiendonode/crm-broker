







                            @can('delete_lead')
                                <!-- Info Alert Modal -->
                                <div id="delete-alert-modal_{{ $lead->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-danger"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('agency.delete_warning') </p>
                                                    <form action="{{ url('sales/delete-manage_leads') }}" method="post">
                                                        @csrf
                                                        <input  type="hidden" name="lead_id" value="{{ $lead->id }}">
                                                        <button type="submit" class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                                        <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 



                            
                            @can('edit_lead')
                                <!-- Info Alert Modal -->
                                <div id="source-alert-modal_{{ $lead->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-success"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('sales.source_warning') </p>
                                                      <p>   {{ $lead->full_name }} / {{ $phone_number }}</p>
                                                    <button  onclick="event.preventDefault();change_lead_source({{ $lead->id }})" class="btn btn-success my-2">@lang('agency.confirm_delete')</button>
                                                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 



                                     
                            @can('edit_lead')
                                <!-- Info Alert Modal -->
                                <div id="type-alert-modal_{{ $lead->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-success"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('sales.type_warning') </p>
                                                      <p>   {{ $lead->full_name }} / {{ $phone_number }}</p>
                                                    <button  onclick="event.preventDefault();change_lead_type({{ $lead->id }})" class="btn btn-success my-2">@lang('agency.confirm_delete')</button>
                                                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 



                                              
                            @can('edit_lead')
                                <!-- Info Alert Modal -->
                                <div id="qualification-alert-modal_{{ $lead->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-success"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('sales.qualification_warning') </p>
                                                      <p>   {{ $lead->full_name }} / {{ $phone_number }}</p>
                                                    <button  onclick="event.preventDefault();change_lead_qualification({{ $lead->id }})" class="btn btn-success my-2">@lang('agency.confirm_delete')</button>
                                                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endcan 





@push('js')
<script>


    
// Start Lead Source Update
    function show_source_modal(id){

    $('#source-alert-modal_'+id).modal('show');

    }


    function change_lead_source(id){

        new_source = $('#modify_lead_source_'+id).val();

        if(new_source == '' || id == '' ){
            return false
        }

        $.ajax({
            url : "{{ url('sales/leads-update-source') }}",
            type : "POST",
            data : {
                _token    : '{{ csrf_token() }}',
                id        : id,
                source_id : new_source,
            },
            success : function (data) {

                $('#source-alert-modal_'+id).modal('hide');
                
                $('#modify_lead_source_'+id +' option')
                        .removeAttr('selected')
                        .filter('[value='+data.lead.source_id+']')
                        .attr('selected', true)

                        $('#modify_lead_source_'+id).val(data.lead.source_id).change();

                toast(data.message,'success');
            },
            error:function (error) {

                toast(error.responseJSON.message,'error');


            }
        });
        


   

    }

//End Lead Source update



    
// Start Lead Type Update
function show_type_modal(id){

$('#type-alert-modal_'+id).modal('show');

}


function change_lead_type(id){

    new_type = $('#modify_lead_type_'+id).val();

    if(new_type == '' || id == '' ){
        return false
    }

    $.ajax({
        url : "{{ url('sales/leads-update-type') }}",
        type : "POST",
        data : {
            _token    : '{{ csrf_token() }}',
            id        : id,
            type_id : new_type,
        },
        success : function (data) {

            $('#type-alert-modal_'+id).modal('hide');
            
            $('#modify_lead_type_'+id +' option')
                    .removeAttr('selected')
                    .filter('[value='+data.lead.type_id+']')
                    .attr('selected', true)

                    $('#modify_lead_type_'+id).val(data.lead.type_id).change();

            toast(data.message,'success');
        },
        error:function (error) {

            toast(error.responseJSON.message,'error');

        }
    });
    




}

//End Lead Type update




// Start Lead Type Update
function show_qualification_modal(id){

$('#qualification-alert-modal_'+id).modal('show');

}


function change_lead_qualification(id){

    new_qualification = $('#modify_lead_qualification_'+id).val();

    if(new_qualification == '' || id == '' ){
        return false
    }

    $.ajax({
        url : "{{ url('sales/update-qualification-leads') }}",
        type : "POST",
        data : {
            _token    : '{{ csrf_token() }}',
            id        : id,
            qualification_id : new_qualification,
        },
        success : function (data) {

            $('#qualification-alert-modal_'+id).modal('hide');
            
            $('#modify_lead_qualification_'+id +' option')
                    .removeAttr('selected')
                    .filter('[value='+data.lead.qualification_id+']')
                    .attr('selected', true)

                    $('#modify_lead_qualification_'+id).val(data.lead.qualification_id).change();

            toast(data.message,'success');
        },
        error:function (error) {

            toast(error.responseJSON.message,'error');

        }
    });
    




}

//End Lead Type update


</script>

@endpush