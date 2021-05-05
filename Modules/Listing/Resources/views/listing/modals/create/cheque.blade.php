<div id="cheque-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cheque-modalLabel" aria-hidden="true">
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
                    <div class="cheques">
                        <div class="single-cheque" id="single-cheque-1">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <div class="d-flex">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input
                                                 type="text"
                                                 name="cheque_date[]"                                                 
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
                                        name="cheque_amount[]"
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
                                        name="cheque_percentage[]"
                                            type="text"
                                            class="form-control" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <i class="far fa-window-close cursor-pointer" onclick="event.preventDefault();removeCheque(1)" style="color: red; font-size: 20px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addCheque()"><i class="fas fa-plus-circle"></i>
                    @lang('listing.add_more_cheques')

                    </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Done</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('js')
<script>
    var chequesCount = 1;
    function removeCheque(chequeId) {
        $('#single-cheque-' + chequeId).remove();
        chequesCount--;

    }
    


    function addCheque() {
        chequesCount++;
        $('.cheques').append(`<div class="single-cheque" id="single-cheque-${chequesCount}">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="form-group mb-0">
                                                                            <div class="d-flex">
                                                                                <div class="input-group mb-2 mr-sm-2">
                                                                                    <input type="text"
                                                                                    name="cheque_date[]" 
                                                                                    id="datepicker-cheque-${chequesCount}" class="form-control p-1 flatpicker flatpicker-range flatpickr-input" placeholder="Date" readonly="readonly">
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
                                                                            name="cheque_amount[]"
                                                                            class="form-control" data-tippy-placement="top-start" title="">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">AED</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="input-group">
                                                                            <input type="text" 
                                                                            name="cheque_percentage[]"
                                                                            class="form-control" data-tippy-placement="top-start" title="">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">%</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3 text-center">
                                                                        <i class="far fa-window-close cursor-pointer" onclick="removeCheque(${chequesCount})" style="color: red; font-size: 20px;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>`);
                                                            flatpickr(`#datepicker-cheque-${chequesCount}`);
    }
</script>
@endpush