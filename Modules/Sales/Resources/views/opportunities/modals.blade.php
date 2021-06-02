
<div id="map-modal-{{ $opportunity->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cheque-modalLabel" aria-hidden="true">
    <div style="overflow:auto;" class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">



                <div id="map_{{ $opportunity->id }}" style="width:490px;height:500px;"></div>

            </div>
       
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@can('delete_opportunity')
    <!-- Info Alert Modal -->
    <div id="delete-alert-modal_{{ $opportunity->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-danger"></i>
                        <h4 class="mt-2">@lang('agency.head_up')</h4>
                        <p class="mt-3">@lang('agency.delete_warning') </p>
                        <form action="{{ url('sales/delete-opportunities') }}" method="post">
                            @csrf
                            <input  type="hidden" name="opportunity_id" value="{{ $opportunity->id }}">
                            <button type="submit" class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                            <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endcan 

@can('edit_opportunity')
    <!-- Info Alert Modal -->
    <div id="qualification-alert-modal_{{ $opportunity->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-success"></i>
                        <h4 class="mt-2">@lang('agency.head_up')</h4>
                        <p class="mt-3">@lang('sales.qualification_warning') </p>
                            <p>   {{ $opportunity->full_name }} / {{ $phone_number }}</p>
                        <button  onclick="event.preventDefault();change_opportunity_qualification({{ $opportunity->id }})" class="btn btn-success my-2">@lang('agency.confirm_delete')</button>
                        <button type="button" class="btn btn-info my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endcan 

@push('js')
<script>

function show_qualification_modal(id){
$('#qualification-alert-modal_'+id).modal('show');
}
function change_opportunity_qualification(id){

    new_qualification = $('#modify_opportunity_qualification_'+id).val();

    if(new_qualification == '' || id == '' ){
        return false
    }

    $.ajax({
        url : "{{ url('sales/opportunities-update-qualification') }}",
        type : "POST",
        data : {
            _token    : '{{ csrf_token() }}',
            id        : id,
            qualification_id : new_qualification,
        },
        success : function (data) {

            $('#qualification-alert-modal_'+id).modal('hide');
            
            $('#modify_opportunity_qualification_'+id +' option')
                    .removeAttr('selected')
                    .filter('[value='+data.opportunity.qualification_id+']')
                    .attr('selected', true)

                    $('#modify_opportunity_type_'+id).val(data.opportunity.qualification_id).change();

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