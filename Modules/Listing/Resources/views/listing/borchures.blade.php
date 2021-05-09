
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




    <div class="row">
        <div class="col-md-12">
                        
           
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
           
           
              <button type="button" class="btn btn-primary">Email</button>
              <a href="{{ url('listing/download-brochure-pdf/single/1') }}" class="btn btn-primary">Create single</a>
              <a href="{{ url('listing/download-brochure-pdf/multi/1') }}" class="btn btn-primary">Create multi</a>
              <button onclick="event.preventDefault();table_row_hide('borchures_{{ $listing->id }}')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
        
               
                
        </div>
     </div>
        
           
  
        
        
        @push('js')
        
        <script>
        
            
            

        

        </script>
            
        @endpush