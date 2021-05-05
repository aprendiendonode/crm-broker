<div id="cheque-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cheque-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content ">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-calculator fa-2x"></i>
                    <h4>
                        @lang('listing.cheque_calculator')
                    </h4>
                </div>
                <div>
                    <div class="cheques-{{ $listing->id }}">

                        @if($listing->cheques)
                        @forelse($listing->cheques as $cheque)
                        <div class="single-cheque" id="single-cheque-{{ $listing->id }}-{{ $loop->iteration }}">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <div class="d-flex">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input
                                                 type="text"
                                                 value="{{ $cheque->date }}"
                                                 name="edit_cheque_date_{{ $listing->id }}[]"                                                 
                                                 class="form-control p-1 flatpicker " 
                                                   >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input 
                                        name="edit_cheque_amount_{{ $listing->id }}[]"
                                        value="{{ $cheque->value }}"
                                        type="text"
                                            class="form-control">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">AED</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input
                                        name="edit_cheque_percentage_{{ $listing->id }}[]"
                                            type="text"
                                            value="{{ $cheque->percent }}"
                                            class="form-control" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <i class="far fa-window-close cursor-pointer" onclick="event.preventDefault();editRemoveCheque({{ $listing->id }},{{ $loop->iteration }})" style="color: red; font-size: 20px;"></i>
                                </div>
                            </div>
                        </div>
                        @empty

                        <div class="single-cheque" id="single-cheque-{{ $listing->id }}-1">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <div class="d-flex">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input
                                                 type="text"
                                                 name="edit_cheque_date_{{ $listing->id }}[]"                                                 
                                                 class="form-control p-1 flatpicker flatpicker-range flatpickr-input" 
                                                   >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input 
                                        name="edit_cheque_amount_{{ $listing->id }}[]"
                                        type="text"
                                            class="form-control">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">AED</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input
                                        name="edit_cheque_percentage_{{ $listing->id }}[]"
                                            type="text"
                                            class="form-control" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <i class="far fa-window-close cursor-pointer" onclick="event.preventDefault();editRemoveCheque({{ $listing->id }},1)" style="color: red; font-size: 20px;"></i>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="editAddCheque({{ $listing->id }})"><i class="fas fa-plus-circle"></i>
                    @lang('listing.add_more_cheques')

                    </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Done</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('js')
<script>
    function editRemoveCheque(id,count) {
        console.log(id,count)
        $('.cheques-'+id+ ' #single-cheque-' +id +'-'+ count).remove();

    }
    


    function editAddCheque(id) {
        var count = $('.cheques-'+id+' > div').length + 1;

        $('.cheques-'+id).append(`<div class="single-cheque" id="single-cheque-${id}-${count}">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="form-group mb-0">
                                                                            <div class="d-flex">
                                                                                <div class="input-group mb-2 mr-sm-2">
                                                                                    <input type="text"
                                                                                    name="edit_cheque_date_${id}[]" 
                                                                                    id="datepicker-cheque-${id}-${count}" class="form-control p-1 flatpicker flatpicker-range flatpickr-input" placeholder="Date" readonly="readonly">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>          
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="input-group">
                                                                            <input type="text"
                                                                            name="edit_cheque_amount_${id}[]"
                                                                            class="form-control" data-tippy-placement="top-start" title="">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">AED</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="input-group">
                                                                            <input type="text" 
                                                                            name="edit_cheque_percentage_${id}[]"
                                                                            class="form-control" data-tippy-placement="top-start" title="">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">%</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3 text-center">
                                                                        <i class="far fa-window-close cursor-pointer" onclick="editRemoveCheque(${id},${count})" style="color: red; font-size: 20px;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>`);
                                                            flatpickr(`#datepicker-cheque-${id}-${count}`);
    }
</script>
@endpush