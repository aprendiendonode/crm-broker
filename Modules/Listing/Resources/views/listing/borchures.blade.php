
    <div class="row">
        <div class="col-md-12">
                        
           
                <div class="text-center mb-3">
                    <i class="fas cursor-pointer fa-cloud-download-alt fa-2x"></i>
                    <h4> @lang('listing.borchure_options',['attribute' => $listing->listing_ref])</h4>
               </div>
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted" style="flex:1;">Staff</label>
                    <div style="flex:2;">
                        <select class="form-control select2" name="listing" data-toggle="select2" data-placeholder="select">
                            @forelse($staffs as $agent)
                              <option value="{{ $agent->id }}">{{ $agent->{'name_'.app()->getLocale()} }}</option>

                            @empty
                                
                            @endforelse
                            
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
           
           
              <button type="button" class="btn btn-primary">Email</button>
              <a href="{{ url('listing/download-brochure-pdf/single/'.$listing->id.'/'.$listing->agency_id) }}" class="btn btn-primary">Create single</a>
              <a href="{{ url('listing/download-brochure-pdf/multi/'.$listing->id.'/'.$listing->agency_id) }}" class="btn btn-primary">Create multi</a>
              <button onclick="event.preventDefault();table_row_hide('borchures_{{ $listing->id }}')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
        
               
                
        </div>
     </div>
        
           
  
        
        
        @push('js')
        
        <script>
        
            
            

        

        </script>
            
        @endpush