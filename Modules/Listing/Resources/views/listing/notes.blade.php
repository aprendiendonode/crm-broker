
    <div class="row">
        <div class="col-md-12">
                        
            <div class="text-center mb-4">
                <i class="far fa-file-pdf fa-2x"></i>
                <h4>@lang('listing.notes_for',['attribute' => $listing->listing_ref])</h4>
            </div>
              
   
                        <h5 class="border-bottom pb-1">@lang('listing.add_new_note')</h5>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.note')<span class="text-danger">*</span></label>
                            <textarea class="form-control note-to-save-{{ $listing->id }}" name="note"  cols="3" rows="3"></textarea>
                            <p class="text-danger note-to-save-message-{{ $listing->id }}"></p>
                        </div>
                        <div class="mt-3 form-group mb-2">
                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();save_note({{ $listing->id }})">@lang('listing.submit')</button>
                        </div>
                    

        </div>
     </div>

            
           

    <div class="row">
     <div class="col-md-12">
        <h5 class="mb-2">NOTES LIST</h5>
        <table class="table table-striped note-list-{{ $listing->id }}" style="table-layout: fixed">
            <thead>
            <tr>
                <th scope="col">@lang('listing.added_by')</th>
                <th scope="col">@lang('listing.date_added')</th>
                <th scope="col">@lang('listing.note')</th>
            </tr>
            </thead>
            <tbody>

                @forelse($listing->notes as $note )
                <tr>
                    <td>{{ $note->addBy->{'name_'.app()->getLocale()} }}</td>
                    <td>{{ $note->created_at->toFormattedDateString() }}</td>
                    <td>{{ $note->notes_en}}</td>
                </tr>
                @empty
                @endforelse
      
            </tbody>
        </table>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                        
                <button onclick="event.preventDefault();table_row_hide('portals_{{ $listing->id }}')" type="button" class="btn  btn-outline-success waves-effect waves-light">
                @lang('sales.cancel')
                </button>
        
            </div>
        </div>
    
     </div>
        
        @push('js')
        
        <script>
        
            
            

        

        </script>
            
        @endpush