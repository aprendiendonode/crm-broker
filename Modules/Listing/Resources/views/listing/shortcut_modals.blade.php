<nav id="floatBar" class="bg-light">
    <div class="container-fluid my-2">
       <div class="row justify-content-center">
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('markHot')">
                Mark Hot
             </button>
             <div id="markHot">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">
                      Make it a hot listing
                   </h6>
                   <p>
                      Are you sure you want to make your listing(s) as Hot listing
                   </p>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('markHot')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1" onclick="event.preventDefault();markHotChange('hot','{{ route('listings.mark') }}','{{ csrf_token() }}');">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('markSignture')">
                Mark as Signture
             </button>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('unMarkHot')">
                Unmark as Hot
             </button>
             <div id="unMarkHot">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">
                      Make it a Basic Listing
                   </h6>
                   <p>
                      Are you sure you want to make your listing(s) as Basic listing
                   </p>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('unMarkHot')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1" onclick="event.preventDefault();
                      markHotChange('basic','{{ route('listings.mark') }}','{{ csrf_token() }}');">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('unMarkSignture')">
                Unmark as Signture
             </button>
             <div id="unMarkSignture">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">
                      Make it a Basic Listing
                   </h6>
                   <p>
                      Are you sure you want to make your listing(s) as Basic listing
                   </p>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('unMarkSignture')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1"
                      onclick="event.preventDefault();
                      markHotChange('basic','{{ route('listings.mark') }}','{{ csrf_token() }}');"
                      >Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('emailBrochure')">
                Email Brochure
             </button>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('listingSharing')">
                Listing Sharing Manager
             </button>
            
             <div id="listingSharing">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">
                      listing Sharing Manager
                   </h6>

                   <form id="myform">
                   <div class="form-check">
                      <input class="form-check-input lsm-change" id="shared" type="radio" name="lsmChangeRadio" value="shared"  />
                      <label class="form-check-label" for="shared">
                         Share With other againts
                      </label>
                   </div>
                   <div class="form-check">
                      <input class="form-check-input lsm-change" type="radio" name="lsmChangeRadio"  id="private" value="private"  />
                      <label class="form-check-label" for="private">
                         Keep as private
                      </label>
                   </div>


                  </form>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('listingSharing')" class="btn btn-sm btn-outline-success mx-1" >
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1" onclick="event.preventDefault();lsmChange('{{ route('listings.lsm-change') }}','{{ csrf_token() }}')">Yes</button>
                   </div>
                </div>
             </div>

            
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('changeStaff')">
                Change Staff
             </button>
             <div id="changeStaff">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">Change Staff</h6>
                   <select 
                        class="form-control select2 staff-from-shortcut" 
                           data-toggle="select2" data-placeholder="select" 
                           >
                              <option value=""></option>
                              @foreach($staffs as $staff)
                              <option
                              @if(old('assigned_to') == $staff->id) selected @endif
                              value="{{ $staff->id }}">{{ $staff->{'name_'.app()->getLocale()} }}</option>
                              @endforeach
                        </select>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('changeStaff')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1" onclick="event.preventDefault();staffChange('{{ route('listings.staff-change-shortcut') }}','{{ csrf_token() }}','{{ $agency }}');">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('changeStatus')">
                Change Status
             </button>
             <div id="changeStatus">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">Change Status</h6>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="Draft" value="Draft"
                         checked />
                      <label class="form-check-label" for="Draft"> Draft </label>
                   </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="Live" value="Live"
                         checked />
                      <label class="form-check-label" for="Live"> Live </label>
                   </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="Archive" value="Archive"
                         checked />
                      <label class="form-check-label" for="Archive">
                         Archive
                      </label>
                   </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="Review" value="Review"
                         checked />
                      <label class="form-check-label" for="Review"> Review </label>
                   </div>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('changeStatus')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('uploadPortals')">
                Upload Portals
             </button>
             <div id="uploadPortals">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">Change Status</h6>
                   <div class="d-flex justify-content-between">
                      <div class="col-6 py-1 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Draft" value="Draft"
                            checked />
                         <label class="form-check-label" for="Draft"> Bayut </label>
                      </div>
                      <div class="col-6 py-1 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Live" value="Live"
                            checked />
                         <label class="form-check-label" for="Live">
                            Company Website
                         </label>
                      </div>
                   </div>
                   <div class="d-flex justify-content-between">
                      <div class="col-6 py-1 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Draft" value="Draft"
                            checked />
                         <label class="form-check-label" for="Draft">
                            Dubbizzle
                         </label>
                      </div>
                      <div class="col-6 py-1 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Live" value="Live"
                            checked />
                         <label class="form-check-label" for="Live"> Generic </label>
                      </div>
                   </div>
                   <div class="row justify-content-between">
                      <div class="col-12 py-1 px-4 form-check">
                         <input class="form-check-input" type="radio" name="exampleRadios" id="Draft" value="Draft"
                            checked />
                         <label class="form-check-label" for="Draft">
                            Add above to exist portals
                         </label>
                      </div>
                      <div class="col-12 py-1 px-4 form-check">
                         <input class="form-check-input" type="radio" name="exampleRadios" id="Live" value="Live"
                            checked />
                         <label class="form-check-label" for="Live">
                            Replace exist portals with above
                         </label>
                      </div>
                   </div>
                   <div class="row justify-content-between">
                      <div class="col-12 py-1 px-4 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Draft" value="Draft"
                            checked />
                         <label class="form-check-label" for="Draft">
                            Sellect all live settings
                         </label>
                      </div>
                      <div class="col-12 py-1 px-4 form-check">
                         <input class="form-check-input" type="checkbox" name="exampleRadios" id="Live" value="Live"
                            checked />
                         <label class="form-check-label" for="Live">
                            Sellect my live settings
                         </label>
                      </div>
                   </div>
                   <div class="d-flex mt-2 justify-content-end">
                      <button onclick="closeModal('uploadPortals')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="viewModal('moveToArchive')">
                Move to archive
             </button>
             <div id="moveToArchive">
                <div class="modal-content shadow px-3 py-2">
                   <h6 class="text-center text-uppercase">Archive</h6>
                   <p>
                      Are you sure you want to make your listing(s) as Basic listing
                   </p>
                   <div class="d-flex justify-content-end">
                      <button onclick="closeModal('moveToArchive')" class="btn btn-sm btn-outline-success mx-1">
                         No
                      </button>
                      <button class="btn btn-sm btn-success mx-1">Yes</button>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-auto my-1 position-relative">
             <button class="btn btn-sm btn-outline-dark" onclick="closeModal('floatBar')">
                Cancel
             </button>
          </div>
       </div>
    </div>
 </nav>


 <div id="markSignture">
    <div class="modal-content d-block position-relative shadow px-3 py-2">
       <button type="button" class="close" onclick="closeModal('markSignture')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
       <h6 class="text-center text-uppercase">Mark As Signature</h6>
       <p class="text-center">
          This Following dedctions will be made fromyour available quots upon
          submitting
       </p>
       <div class="d-flex justify-content-end">
          <button onclick="closeModal('markSignture')" class="btn btn-sm btn-outline-success mx-1">
             Cancel
          </button>
          <button class="btn btn-sm btn-success mx-1" onclick="event.preventDefault();
          markHotChange('signature','{{ route('listings.mark') }}','{{ csrf_token() }}');">Apply Now</button>
       </div>
    </div>
 </div>


 <div id="emailBrochure">
    <div class="modal-content d-block position-relative shadow px-3 py-2">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
       <h6 class="text-center text-uppercase">Email Brochure</h6>
       <p class="text-center">text text text</p>
       <div class="d-flex justify-content-end">
          <button onclick="closeModal('emailBrochure')" class="btn btn-sm btn-outline-success mx-1">
             Cancel
          </button>
          <button class="btn btn-sm btn-success mx-1">Send</button>
       </div>
    </div>
 </div>