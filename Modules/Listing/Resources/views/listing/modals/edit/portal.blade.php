

<div id="portals-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="portals-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-poll fa-2x"></i>
                    <h4>Marketing Portals</h4>
               </div>
               <div class="row">

                @foreach($portals as $portal)
                   <div class="col-4">
                        <div class="checkbox checkbox-primary mb-2">
                        <input id="portal_{{ $portal->id }}_{{ $listing->id }}"
                                @if($listing->portals &&  in_array($portal->id,$listing->portals)  )
                                    checked
                                @endif
                             name="edit_portals_{{ $listing->id }}[]" 
                             type="checkbox" value="{{ $portal->id }}">
                            <label for="portal_{{ $portal->id }}_{{ $listing->id }}">
                                {{ $portal->name }}
                            </label>
                        </div>
                   </div>
                @endforeach   
              
          
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-hidden="true">@lang('listing.done')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->