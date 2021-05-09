

    <div class="row">
        <div class="col-md-12">
                        
        
                <div class="text-center mb-3">
                    <i class="fas fa-poll fa-2x"></i>
                    <h4>Marketing Portals</h4>
               </div>

              
          
               
          
                
                <form   action="{{ route('listings.portals',$listing->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">   
                    <div class="row">
                        @csrf
                          
                    
                      @method('PATCH')
                        @if($business)
                        <input type="hidden" name="portal_business_id_{{ $listing->id }}" value="{{ $business }}">
                        @endif
            
                
                        @forelse($portals as $portal)
                        <div class="col-4">
                             <div class="checkbox checkbox-primary mb-2">
                             <input id="feed_portal_{{ $portal->id }}_{{ $listing->id }}"
                                     @if($listing->portals &&  in_array($portal->id,$listing->portals)  )
                                         checked
                                     @endif
                                  name="portals_{{ $listing->id }}[]" 
                                  type="checkbox" value="{{ $portal->id }}">
                                 <label for="feed_portal_{{ $portal->id }}_{{ $listing->id }}">
                                     {{ $portal->name }}
                                 </label>
                             </div>
                        </div>
                      @empty  
                 
                
                      @endforelse  
                
         
                    
             
                
                </div>
                
               
                
                </div>
     </div>
     <div class="row">
        <div class="d-flex justify-content-end">
                    
            <button onclick="event.preventDefault();table_row_hide('portals_{{ $listing->id }}')" type="button" class="btn  btn-outline-success waves-effect waves-light">
               @lang('sales.cancel')
            </button>
            <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('listing.modify')
            </button>
        </div>
    
     </div>
            
           
    </form> 
        
        
        @push('js')
        
        <script>
        
            
            

        

        </script>
            
        @endpush