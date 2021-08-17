
<div id="documents-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="documents-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="far fa-file-pdf fa-2x"></i>
                    <h4>
                        @lang('listing.documents_private_folder')
                    </h4>
                    {{-- <p><span style="color:red;">Please Do Not Upload TrueCheck Documents in this section</span></p> --}}
                </div>



                <div class="row">
         
        
                    <div class="col-sm-12">
                      <div class="card h-100">
                 
                            <ul class="list-unstyled p-2 d-flex row mx-0" id="document-files-{{ $listing->id }}">
                                @if($listing->documents)
                                @foreach($listing->documents as $document)
                                @php 
                                $uniq_id = uniqid();
                                @endphp
                                <li class="col-4 media" id="documentUploaderFile{{ $uniq_id }}">
                                    <div style="display: flex;
                                    justify-content: space-between;
                                    flex-direction: column;
                                    height: 100%;">
                                <input type="hidden" class="document-id" value="{{ $document->id }}" >
                                <i
                                id="remove-documentUploaderFile{{ $uniq_id }}"

                                 class="far fa-times-circle cursor-pointer text-danger fa-2x remove-document" onclick="return confirm('are you sure ?') ? removeDocument(this,'main') : false"></i> 
                                    <div class="document">
                                        <i class="fa fa-file-contract fa-4x "></i>
                                    </div>
                                
                                    <input type="hidden" name="edit_documents_{{ $listing->id }}[]"  class="listing_documents">
                                
                                        <div class="media-body mb-1">
                                        <div class="d-flex justify-content-between my-2">
                                    
                                            <div>
                                            <div class="form-group mb-0 title" id="title_{{ $document->id }}">
                                                {{ $document->title ? Str::ucfirst( $document->title) : trans('listing.no_title') }}
                                            
                                            </div>
                                            </div>
                                        </div>
                                        
                                
                                   
                                        <div class="mb-2 d-flex justify-content-start">
                                            <input type="text" 
                                            class="form-control document_rename_value" 
                                            id="rename_{{ $document->id }}"
                                             placeholder="@lang('listing.enter_title')">
                                            <i 
                                            class="fa fa-check text-success mt-2 ml-2 cursor-pointer document_rename" 
                                            id="{{ $document->id }}"
                                            onclick="event.preventDefault();modifyName(this,'listing_documents','document')"></i>
                                        </div>
                                        <div class="text-success save-title-success" id="save_success_{{ $document->id }}" > </div>
                                        
                                        <hr class="mt-1 mb-1" />
                                        </div>
                                    </div>
                                
                                    </li>

                                    @endforeach
                                    @endif
                            </ul>
                      </div>
                    </div>
                  </div>
            




                <div>

                <div class="mb-3 ">
                    <div >
                        <div class="dm-uploader" id="document-drag-and-drop-zone-{{ $listing->id }}" >
            
                                <div role="button" class="btn btn-primary mr-2">
                                     <i class="fas fa-plus-circle"></i> 
                                    @lang('listing.add_documents') 
                                    <input type="file"   title='Click to add Files' />
                                </div>
        
                        </div>
                    </div>
           

                </div>
          
                <p>
                    @lang('listing.press_ctrl_key_while_selecting_files_to_upload_multiple_at_once')

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                <button type="button" class="btn btn-success"
                    onclick="updateListingDocuments(
                    {{ $listing->id }},'{{ route('listings.update-listing-documents') }}',
                 '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )">@lang('listing.upload')</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

