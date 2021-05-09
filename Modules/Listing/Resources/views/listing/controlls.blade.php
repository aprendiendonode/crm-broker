                                   
                            @can('delete_listing')
                            <!-- Info Alert Modal -->
                            <div id="delete-alert-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-4">
                                            <div class="text-center">
                                                <i class="dripicons-information h1 text-danger"></i>
                                                <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                <p class="mt-3">@lang('agency.delete_warning')</p>
                                                <form action="{{ route('listings.delete') }}" method="post">
                                                    @csrf
                                                    <input  type="hidden" name="listing_id" value="{{ $listing->id }}">
                                                    <div class="">
                                                        <button type="submit" class="btn btn-danger m-2">@lang('agency.confirm_delete')</button>
                                                        <button type="button" class="btn btn-success m-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        @endcan 


                                        <div id="tenancyContract-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="documents-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-full-width">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <h4 class="mb-3">Tenancy Contact for Dubai</h4>
                                                      <div class="row">
                                                        <div class="col-12">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted" style="flex:1">Purpose:*</label>
                                                              <div style="display:flex">
                                                                  <div class="radio mr-3">
                                                                      <input type="radio" name="choosePurpose" id="purposeIndustrial" value="option3">
                                                                      <label for="purposeIndustrial">
                                                                        Industrial
                                                                      </label>
                                                                  </div>
                                                                  <div class="radio mr-3">
                                                                      <input type="radio" name="choosePurpose" id="purposeCommercial" value="option3">
                                                                      <label for="purposeCommercial">
                                                                        Commercial
                                                                      </label>
                                                                  </div>
                                                                  <div class="radio">
                                                                      <input type="radio" name="choosePurpose" id="purposeResidential" value="option3">
                                                                      <label for="purposeResidential">
                                                                        Residential
                                                                      </label>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Owner Name</label>
                                                              <input type="text" class="form-control" name="ownerName" id="ownerName">
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Landlord Name</label>
                                                              <input type="text" class="form-control" name="landLordName" id="landLordName">
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Tenant Name</label>
                                                              <input type="text" class="form-control" name="tenantName" id="transaction">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Tenant Email</label>
                                                              <input type="text" class="form-control" name="tenantEmail" id="tenantEmail">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Landlord Email</label>
                                                              <input type="text" class="form-control" name="LandlordEmail" id="LandlordEmail">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Tenant Phone</label>
                                                              <input type="text" class="form-control" name="TenantPhone" id="TenantPhone">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted"> Landlord Phone</label>
                                                              <input type="text" class="form-control" name="LandlordPhone" id="LandlordPhone">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Building Name</label>
                                                              <input type="text" class="form-control" name="BuildingName" id="BuildingName">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted"> Location</label>
                                                              <input type="text" class="form-control" name="Location" id="Location">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Property Size(S.M)</label>
                                                              <input type="text" class="form-control" name="PropertySize" id="PropertySize">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Property Type</label>
                                                              <input type="text" class="form-control" name="PropertyType" id="PropertyType">
                                                          </div>
                                                        </div>
                                                        <div class="col-12">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Property No</label>
                                                              <input type="text" class="form-control" name="PropertyNo" id="PropertyNo">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Premises No(DEWA)</label>
                                                              <input type="text" class="form-control" name="PremisesNo" id="PremisesNo">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted"> Plot No</label>
                                                              <input type="text" class="form-control" name="PlotNo" id="PlotNo">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted"> Contract Period From</label>
                                                              <input type="text" class="form-control" name="ContractPeriodFrom" id="ContractPeriodFrom">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">To</label>
                                                              <input type="text" class="form-control" name="ContractPeriodTo" id="ContractPeriodTo">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Annual Rent</label>
                                                              <input type="text" class="form-control" name="annualRent" id="annualRent">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Contract Value</label>
                                                              <input type="text" class="form-control" name="contractValue" id="contractValue">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Security Deposit Amount</label>
                                                              <input type="text" class="form-control" name="securityDepositAmount" id="securityDepositAmount">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                          <div class="form-group">
                                                              <label class="font-weight-medium text-muted">Mode Of Payment</label>
                                                              <input type="text" class="form-control" name="modeOfPayment" id="modeOfPayment">
                                                          </div>
                                                        </div>
                                                        <div class="col-12">
                                                          <h4 class="text-center mt-3">ADDITIONAL TERMS</h4>
                                                          <div id="addedTerms">
                                                            <div class="form-group" id="addedTerm1">
                                                              <label class="font-weight-medium text-muted">1</label>
                                                              <input type="text" class="form-control" name="term1" id="term1">
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <div>
                                                          <button onclick="addTerm()" class="btn btn-primary"><i class="fas fa-minus"></i> Additional Terms</button>
                                                        </div>
                                                        <div>
                                                          <button type="button" class="btn btn-primary">Email</button>
                                                          <button type="button" class="btn btn-primary">Create</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                 
    <script>
        var termsAddedCount = 1;
        function addTerm() {
        termsAddedCount++;
        console.log('clicked');
        $('#addedTerms').append(`<div class="form-group" id="addedTerm${termsAddedCount}">
                            <label class="font-weight-medium text-muted">${termsAddedCount}</label>
                            <input type="text" class="form-control" name="term1" id="term${termsAddedCount}">
                        </div>`)
        }
    </script>

  



<i
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('listing.download_borchure')"
    onclick="event.preventDefault();table_row_show({{ $listing->id }},'borchures_{{ $listing->id }}')"
    class="fas cursor-pointer fa-cloud-download-alt">
</i>


<i

  onclick="event.preventDefault();  table_row_show({{ $listing->id }},'task_{{ $listing->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>


<i
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="Tenancy"
    data-toggle="modal" data-target="#tenancyContract-modal"
    class="far fa-file-pdf cursor-pointer feather-16">
</i>



@can('edit_listing')
<i
onclick="event.preventDefault();table_row_show({{ $listing->id }},'portals_{{ $listing->id }}')"
data-plugin="tippy"
        data-tippy-placement="top-start"
        title="Edit"
        class="fas fa-rss cursor-pointer feather-16">
</i>

<i
        onclick="event.preventDefault();show_edit_div({{ $listing->id }})"
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="Edit"
        class="fa fa-edit cursor-pointer feather-16">
</i>
@endcan


@can('delete_listing')
<i
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="@lang('agency.delete_listing')"
        data-toggle="modal" data-target="#delete-alert-modal_{{ $listing->id }}"

        class="fe-trash cursor-pointer feather-16">
</i>
@endcan


@push('js')
    <script>

        function table_row_show(row_id,id){
        
        $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');
        if($('.'+id).hasClass('d-none')){
            $('.'+id).removeClass('d-none');
        }else{
            $('.'+id).addClass('d-none');

        }

        }
        function table_row_hide(id){
        
        $('.'+id).addClass('d-none');

        }

    </script>
@endpush


