<div class="card-box">
{{-- <ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#agent" data-toggle="tab" aria-expanded="false" class="nav-link active">
            @lang('listing.agent')
        </a>
    </li>

   
</ul> --}}


{{-- <div class="tab-content"> --}}
    {{-- <div class="tab-pane active" id="agent"> --}}
        <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal" data-target="#agent-modal-{{ $listing->id }}">@lang('listing.edit')</button>

        <div class=" mb-4">
            <div>
                <img class="w-75 mb-2" style="background: #000; ; max-width: 100px;"
                 src="{{ $listing->agent && $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' }}" alt="">
            </div>
            <table class="table table-striped table-info-summary">
                                
                <tbody>
                    <tr>
                      
                        <td width="200">
                            @lang('listing.agent')
                        </td>
                        <td>
                            {{ $listing->agent ? $listing->agent->{'name_'.app()->getLocale()} : '' }}
                            <!-- ko foreach: externalListings --><!-- /ko -->
                        </td>
                    </tr>
                    <tr>
                      
                        <td width="200">
                            @lang('listing.email')
                        </td>
                        <td>
                            {{ $listing->agent ? $listing->agent->email : '' }}
                            <!-- ko foreach: externalListings --><!-- /ko -->
                        </td>
                    </tr>
             
                    <tr>
                      
                        <td width="200">
                            @lang('listing.primary')
                        </td>
                        <td>
                            {{ $listing->agent ? $listing->agent->phone : '' }}
                            <!-- ko foreach: externalListings --><!-- /ko -->
                        </td>
                    </tr>
             
         
              
                </tbody>
                
                
             </table>
   
        </div>
    
    {{-- </div> --}}

{{-- </div> --}}


<div id="agent-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                  
                   
                        <label for="assignTo" class="font-weight-medium text-muted">
                            @lang('listing.assign_to')
                        </label>
                        <select 
                        required
                        class="form-control select2" name="edit_assigned_to_{{ $listing->id }}"
                        data-toggle="select2" data-placeholder="select" 
                        >
                                <option value=""></option>
                            @foreach($staffs as $staff)
                                <option
                                    @if(old('edit_assigned_to_'.$listing->id,$listing->assigned_to) == $staff->id) selected @endif
                                    value="{{ $staff->id }}"
                                    >
                                    {{ $staff->{'name_'.app()->getLocale()} }}
                                
                                </option>
                            @endforeach
                        </select>
                 

                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> <!-- end card-box-->