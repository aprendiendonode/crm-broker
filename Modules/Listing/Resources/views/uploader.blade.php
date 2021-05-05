<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Restricted to Multiple Countries</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/src/css/jquery.dm-uploader.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">

  </head>
  <body>
  
 
    <main role="main" class="container">

        <h1>jQuery Ajax File Uploader Widget</h1>
        <p class="lead mb-4">
          A very lightweight Plugin for file uploading using ajax(async) and includes support for queues, progress tracking and drag and drop.
          This page demostrates the default basic setup/config.
        </p>
  
        <div class="row">
            <div class="col-sm-12">
                <div class="dm-uploader" id="drag-and-drop-zone" style="border:unset ! important">
    
                        <div role="button" class="btn btn-primary mr-2">
                            <i class="fa fa-folder-o fa-fw"></i> Browse Files
                            <input type="file" title='Click to add Files' />
                        </div>

                </div>
            </div>

          <div class="col-sm-12">
            <div class="card h-100">
            {{--   <div class="card-header">
                File List
              </div>
   --}}
              <ul class="list-unstyled p-2 d-flex row mx-0" id="files">
                <!-- <div class="row" id="files"> -->
                  {{-- <li class="text-muted text-center empty">No files uploaded.</li> --}}
                <!-- </div> -->
              </ul>
            </div>
          </div>
        </div><!-- /file list -->
  
     

    
  
      </main> <!-- /container -->
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

{{-- <script src="{{ asset('assets/libs/uploader-master/src/js/jquery.dm-uploader.js') }}"></script> --}}
<script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
<script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>

  <script type="text/html" id="files-template">
    <li class="col-3 media">
      <div style="display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 100%;">
        <img class=" preview-img w-25 m-auto" src="https://danielmg.org/assets/image/noimage.jpg?v=v10" alt="Generic placeholder image">
      
        <div class="media-body mb-1">
          <div class="d-flex justify-content-between my-2">
            <div>enlarge</div>
            <div>
              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">WaterMark</label>
                <input type="checkbox" name="waterMark" id="waterMark">
              </div>
            </div>
          </div>
          <p class="mb-2">
            <strong style="word-break: break-all">%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
          </p>
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
    url: '{{ url("listing/upload-image") }}',
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
    onInit: function(){
      // Plugin is ready to use
      ui_add_log('Penguin initialized :)', 'info');
    },
    onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('All pending tranfers finished');
    },
    onNewFile: function(id, file){
      // When a new file is added using the file selector or the DnD area
      ui_add_log('New file added #' + id);
      ui_multi_add_file(id, file);

      if (typeof FileReader !== "undefined"){
        var reader = new FileReader();
        var img = $('#uploaderFile' + id).find('img');
        
        reader.onload = function (e) {
          img.attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
      }
    },
    onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('Starting the upload of #' + id);
      ui_multi_update_file_progress(id, 0, '', true);
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // A file was successfully uploaded
      ui_add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
      ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
      ui_multi_update_file_status(id, 'success', 'Upload Complete');
      ui_multi_update_file_progress(id, 100, 'success', false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    },
    onFileTypeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
    },
    onFileExtError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
    }
  });
});

</script>
  </body>
</html>