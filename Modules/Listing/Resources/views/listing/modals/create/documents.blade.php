<div id="documents-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="documents-modalLabel" aria-hidden="true">
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
                   {{--      <div class="card-header">
                          File List
                        </div> --}}
            
                        <ul class="list-unstyled p-2 d-flex row mx-0" id="document-files">
                          <!-- <div class="row" id="files"> -->
                            {{-- <li class="text-muted text-center empty">No files uploaded.</li> --}}
                        </ul>
                    </div> 
                      </div>
                    </div>
                
            








                <div>

                <div class="mb-3 ">
                    <div >
                        <div class="dm-uploader" id="document-drag-and-drop-zone" >
            
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
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">@lang('listing.done')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('js')

<script type="text/html" id="document-files-template">
    <li class="col-4 media">
    <div style="display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 100%;">
 <input type="hidden" class="document-id" >
 <i class="far fa-times-circle cursor-pointer text-danger fa-2x remove-document" onclick="return confirm('are you sure ?') ? removeDocument(this,'temporary') : false"></i>
    <div class="document">
            <i class="fa fa-file-contract fa-4x "></i>
    </div>

    <input type="hidden" name="documents[]" class="listing_documents">

        <div class="media-body mb-1">
        <div class="d-flex justify-content-between my-2">

            <div>
            <div class="form-group mb-0 title">
            @lang('listing.no_title')
            </div>
            </div>
        </div>


        <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
            role="progressbar"
            style="width: 0%"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-start">
            <input type="text" class="form-control document_rename_value"  placeholder="@lang('listing.enter_title')">
            <i
            class="fa fa-check text-success mt-2 ml-2 cursor-pointer document_rename"

            onclick="event.preventDefault();modifyName(this,'temporary_documents','document')"></i>
        </div>
        <div class="text-success save-title-success" > </div>

        <hr class="mt-1 mb-1" />
        </div>
    </div>

    </li>
</script>

  <script>
    $(function(){

    $('#document-drag-and-drop-zone').dmUploader({
    url: '{{ route("listing.temporary-documents") }}',
    extraData: {
   "agency": '{{ $agency }}'
   },
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    maxFileSize: 3000000,
    allowedTypes: 'image/*',
    extFilter: ["jpg", "jpeg","png","gif",'pdf','txt'],
    onDragEnter: function(){

    this.addClass('active');
    },
    onDragLeave: function(){
    this.removeClass('active');
    },

    onNewFile: function(id, file){
    document_ui_multi_add_file(id, file);

    if (typeof FileReader !== "undefined"){
        var reader = new FileReader();

        reader.readAsDataURL(file);
    }
    },
    onBeforeUpload: function(id){
    document_ui_multi_update_file_progress(id, 0, '', true);
    document_ui_multi_update_file_status(id, 'uploading', 'Uploading...');
    },
    onUploadProgress: function(id, percent){
    document_ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){

    document_ui_multi_update_file_status(id, 'success', 'Upload Complete');
    document_ui_multi_update_file_progress(id, 100, 'success', false);


    var path = '{{asset("temporary/documents")}}/'+ data.document.document

    $('#documentUploaderFile' + id + ' .listing_documents').val(data.document.folder);
    $('#documentUploaderFile' + id).find('.document_rename').attr('id',data.document.id)
    $('#documentUploaderFile' + id).find('.document_rename_value').attr('id','rename_'+data.document.id)
    $('#documentUploaderFile' + id).find('.save-title-success').attr('id','save_success_'+data.document.id)
    $('#documentUploaderFile' + id).find('.title').attr('id','title_'+data.document.id)

    $('#documentUploaderFile' + id).find('.remove-document').attr('id','remove-documentUploaderFile' + id);
      $('#documentUploaderFile' + id).find('.document-id').val( data.document.id)

    },
    onUploadError: function(id, xhr, status, message){
        document_ui_multi_update_file_status(id, 'danger', message);
        document_ui_multi_update_file_progress(id, 0, 'danger', false);
    }

    });
    });





 </script>

@endpush