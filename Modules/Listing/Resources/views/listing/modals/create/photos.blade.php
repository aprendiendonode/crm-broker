
<div id="photos-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="photos-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-images fa-2x"></i>
                    <h4>@lang('listing.photos')</h4>
                </div> 



                <div class="row">
         
        
                  <div class="col-sm-12">
                    <div class="card h-100">
                 {{--      <div class="card-header">
                        File List
                      </div> --}}
          
                      <ul class="list-unstyled p-2 d-flex row mx-0" id="files">
                        <!-- <div class="row" id="files"> -->
                          {{-- <li class="text-muted text-center empty">No files uploaded.</li> --}}
                        <!-- </div> -->
                      </ul>
                    </div>
                  </div>
                </div><!-- /file list -->
          

                <div>
                    <div class="mb-2 d-flex justify-content-start">
                        <div >
                            <div class="dm-uploader" id="drag-and-drop-zone" >
                
                                    <div role="button" class="btn btn-primary mr-2">
                                        <i class="fa fa-folder-o fa-fw"></i> Browse Files
                                        <input type="file"   title='Click to add Files' />
                                    </div>
            
                            </div>
                        </div>
                        <div >
                            <button data-toggle="modal" data-target="#imageBank-modal" data-dismiss="modal" type="button" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i>
                                @lang('listing.image_bank')
                            </button>
                        </div>

                    </div>
                    <p class="mb-0">
                        @lang('listing.press_ctrl_key_while_selecting_images_to_upload_multiple_images_at_once_jpeg_png_min_800x700')
                    <p class="mb-0">
                        @lang('listing.the_image_highlighted_with')
                         <span class="text-warning">@lang('listing.yellow')</span>
                         @lang('listing.border_are_low_quality_images')
                          </p>
                </div>
            </div>
            
            <div class="modal-footer">  
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('listing.close')</button>
                <button type="button" class="btn btn-primary">
                    @lang('listing.done')
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="imageBank-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageBank-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="far fa-file-pdf fa-2x"></i>
                    <h4>
                        Ahmed Amin Amin Ayad's
                        @lang('listing.image_bank')
                        </h4>
                </div>
                <div>
                    <p>main/</p>
                </div>
                <h5>
                    @lang('listing.your_image_bank_is')
                <a href="">
                    @lang('listing.empty_go_to_image_bank')
                
                    </a>
                    @lang('listing.to_choose_images')
                    </h5>
            </div>
            <div class="modal-footer">
                <button data-toggle="modal" data-target="#photos-modal" data-dismiss="modal" type="button" class="btn btn-primary">
                    @lang('listing.done')
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('js')
<script type="text/html" id="files-template">
    <li class="col-3 media">
      <div style="display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 100%;">
    <div class="with-watermark">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>
    <div class="no-watermark d-none">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>

    <input type="hidden" name="photos[]" class="listing_photos">

        <div class="media-body mb-1">
          <div class="d-flex justify-content-between my-2">
            <div class="with-enlarg-watermark">
                
                <a target="_blank" href="">enlarg</a>

            </div>
            <div class="d-none no-enlarg-watermark">
                <a target="_blank" href="">enlarg</a>
            </div>
            <div>
              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">WaterMark</label>
                <input type="checkbox" checked name="waterMark" class="watermark" onchange="toggleWatermark(this)">
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
          
          <hr class="mt-1 mb-1" />
        </div>
      </div>

    </li>
  </script>
  
<script>
$(function(){
 
  $('#drag-and-drop-zone').dmUploader({ //
    url: '{{ route("listing.temporary-photos") }}',
    headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
    maxFileSize: 3000000, // 3 Megs 
    allowedTypes: 'image/*',
    extFilter: ["jpg", "jpeg","png","gif"],
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
    },
    onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
    },

    onNewFile: function(id, file){
   
      ui_multi_add_file(id, file);

      if (typeof FileReader !== "undefined"){
        var reader = new FileReader();
        var img = $('#uploaderFile' + id+' .with-watermark').find('img');
        
        reader.onload = function (e) {
          img.attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
      }
    },
    onBeforeUpload: function(id){
   
      ui_multi_update_file_progress(id, 0, '', true);
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
     
      ui_multi_update_file_status(id, 'success', 'Upload Complete');
      ui_multi_update_file_progress(id, 100, 'success', false);

      var img = $('#uploaderFile' + id+' .with-watermark').find('img');
      var link = $('#uploaderFile' + id+' .with-enlarg-watermark').find('a');
      var path = '{{asset("temporary/listings")}}/'+ data.photo.watermark
      img.attr('src',path);
      link.attr('href',path);
      $('#uploaderFile' + id).find('.watermark').attr('id','watermark-uploaderFile' + id)
      var img = $('#uploaderFile' + id +' .no-watermark').find('img');
      var link = $('#uploaderFile' + id+' .no-enlarg-watermark').find('a');
      var path = '{{asset("temporary/listings")}}/'+ data.photo.main

      link.attr('href',path);
      img.attr('src',path);
      $('#uploaderFile' + id + ' .listing_photos').val(data.photo.folder);


    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },

  });
});


function toggleWatermark(input){
 var id         = input.id
 var sliced_id  = id.slice(10);
 
 //TODO request ajax to change which one of the should be on to use later
 $('#'+sliced_id+' .with-watermark').toggleClass('d-none')
 $('#'+sliced_id+' .no-watermark').toggleClass('d-none')
 $('#'+sliced_id+' .with-enlarg-watermark').toggleClass('d-none')
 $('#'+sliced_id+' .no-enlarg-watermark').toggleClass('d-none')
}
</script>

@endpush