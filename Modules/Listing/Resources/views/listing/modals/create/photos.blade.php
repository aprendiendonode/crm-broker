
<div id="photos-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="photos-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header py-2">
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
                <button type="button" onclick="handleCloseModal()" class="btn btn-primary" aria-hidden="true">
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

<i class="far fa-times-circle cursor-pointer text-danger fa-2x remove-photo" onclick="return confirm('are you sure ?') ? removePhoto(this,'temporary') : false"></i> 
   <div class="with-watermark">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">
        <input type="hidden" class="photo-id" >
    </div>
    <div class="no-watermark d-none">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">
    </div>

    <input type="hidden" name="photos[]" class="listing_photos">

        <div class="media-body mb-1">
          <div class="d-flex justify-content-between my-2">

            <div>
            <div class="with-enlarg-watermark">
                
                <a target="_blank" href="">enlarg</a>

            </div>
            <div class="d-none no-enlarg-watermark">
                <a target="_blank" href="">enlarg</a>
            </div>
            <div>
            <div class="form-group">
            <label for="">Select a Gategory</label>
              <select class="form-control listing-category" onchange="updateListingCategory(this,'temp')" >
                <option value="">@lang('listing.select_category')</option>
                @foreach($listing_categories as $category)
                  <option value="{{ $category->id }}">
                    {{ app()->getLocale() == 'en' ? $category->name  : $category->localized_name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>



            <div>
              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">WaterMark</label>
                <input type="checkbox" checked name="waterMark" class="watermark" onchange="toggleWatermark(this,'temporary')">
              </div>
              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">@lang('listing.main')</label>
                <input type="checkbox"  name="checked_main" class="checked_main" onchange="updateMain(this,'temporary')">
                <input type="hidden"  name="checked_main_hidden[]" class="checked_main_hidden" value="no">
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
$('#photos-modal').modal({
  show: false,
  backdrop: 'static'
})

function handleCloseModal() {
  let isAllSelected = ![...document.querySelectorAll('.listing-category')].some(el => el.value == '' );

  if(isAllSelected) {
    $('#photos-modal').modal('toggle');
  }else {
    toast('please select all categories','error');
  }
  
}


$(function(){
  $('#drag-and-drop-zone').dmUploader({ 
    url: '{{ route("listing.temporary-photos") }}',
    extraData: {
   "agency": '{{ $agency }}'
   },
    headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
    maxFileSize: 3000000, 
    allowedTypes: 'image/*',
    extFilter: ["jpg", "jpeg","png","gif"],
    onDragEnter: function(){
      
      this.addClass('active');
    },
    onDragLeave: function(){
      
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
      
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
     
      ui_multi_update_file_status(id, 'success', 'Upload Complete');
      ui_multi_update_file_progress(id, 100, 'success', false);

      var img = $('#uploaderFile' + id+' .with-watermark').find('img');
      var link = $('#uploaderFile' + id+' .with-enlarg-watermark').find('a');
      var path = '{{asset("temporary/listings")}}/'+ data.photo.folder+'/'+ data.photo.watermark
      img.attr('src',path);
      link.attr('href',path);
      $('#uploaderFile' + id).find('.watermark').attr('id','watermark-uploaderFile' + id)
      $('#uploaderFile' + id).find('.checked_main').attr('id','checked-main-uploaderFile' + id)
      $('#uploaderFile' + id).find('.checked_main_hidden').attr('id','checked-main-uploaderFile' + id+'-hidden')


      $('#uploaderFile' + id).find('.listing-category').attr('id','listing-category-' + id)


      $('#uploaderFile' + id).find('.remove-photo').attr('id','remove-uploaderFile' + id)
      $('#uploaderFile' + id).find('.photo-id').val( data.photo.id)

      var img = $('#uploaderFile' + id +' .no-watermark').find('img');
      var link = $('#uploaderFile' + id+' .no-enlarg-watermark').find('a');
      var path = '{{asset("temporary/listings")}}/'+ data.photo.folder+'/'+ data.photo.main

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



</script>

@endpush