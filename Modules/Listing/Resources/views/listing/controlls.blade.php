                                        <div id="download-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="documents-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center mb-3">
                                                            <i class="fas cursor-pointer fa-cloud-download-alt fa-2x"></i>
                                                            <h4>Brochure Options (122-VI-R-1160)</h4>
                                                       </div>
                                                        <div class="form-group">
                                                            <label class="mb-1 font-weight-medium text-muted" style="flex:1;">Staff</label>
                                                            <div style="flex:2;">
                                                                <select class="form-control select2" name="listing" data-toggle="select2" data-placeholder="select">
                                                                    <option value="">1</option>
                                                                    <option value="1">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div style="display:flex; flex:2">
                                                            <div class="radio mr-3">
                                                                <input type="radio" name="choosePage" id="multiplePage" value="multiplePage">
                                                                <label for="multiplePage">
                                                                    Multiple Page
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <input type="radio" name="choosePage" id="singlePage" value="singlePage">
                                                                <label for="singlePage">
                                                                    Single Page
                                                                </label>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-primary">Email</button>
                                                      <a href="{{ url('listing/download-brochure-pdf/single/1') }}" class="btn btn-primary">Create single</a>
                                                      <a href="{{ url('listing/download-brochure-pdf/multi/1') }}" class="btn btn-primary">Create multi</a>
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
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
    title="Download"
    data-target="#download-modal" data-toggle="modal"
    class="fas cursor-pointer fa-cloud-download-alt">
  </i>
 

{{-- <i
  data-plugin="tippy" 
  data-tippy-placement="top-start" 
  title="@lang('agency.change_team')"
  class="fas fa-share-square cursor-pointer feather-16">
</i> --}}


<i
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="Tenancy"
    data-toggle="modal" data-target="#tenancyContract-modal"
    class="far fa-file-pdf cursor-pointer feather-16">
</i>


<!-- @can('delete_listing')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('agency.delete_listing')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $listing->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan


@if(auth()->user()->type == 'owner')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('agency.moderator')"
      data-toggle="modal" data-target="#moderator-modal_{{ $listing->id }}"
  
      class="fe-star cursor-pointer feather-16">
  </i>
@endif -->
