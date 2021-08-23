
<div id="videos-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="videos-modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-video fa-2x"></i>
                    <h4>@lang('listing.videos')</h4>
                </div>
                <div id="addedVideos">
                    <div id="addedVideo1" class="mb-4">
                        <div class="d-flex justify-content-end">
                            <div class="cursor-pointer" onclick="removeAddedVideo('addedVideo1')">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_title')</label>
                            <input type="text" name="video_title[]" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_link')</label>
                            <input type="text" class="form-control" name="video_link[]">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_host')</label>
                            <select class="form-control" name="video_host[]" data-placeholder="select">
                                <option value=""></option>
                                <option style="font-size: 18px" value="youtube">@lang('listing.youtube')</option>
                                <option style="font-size: 18px" value="vimeo">@lang('listing.vimeo')</option>
                                <option style="font-size: 18px" value="dailymotion">@lang('listing.dailymotion')</option>
                                <option style="font-size: 18px" value="3dview">@lang('listing.3d_view')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="event.preventDefault();addVideo()"><i class="fas fa-plus-circle mr-1"></i>
                    @lang('listing.add_more_videos')
                </button>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-primary close" data-dismiss="modal">@lang('listing.close')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@push('js')

<script>
    var videosAddedCount = 1;
    function removeAddedVideo(addedVideo) {
        $('#' + addedVideo).remove();
        // alert('clicked')
        console.log(addedVideo);
        videosAddedCount--;
        console.log(videosAddedCount);
    }

    function addVideo() {
        videosAddedCount++;
            var video_title = '{{ trans("listing.video_title")  }}';
            var video_host = '{{ trans("listing.video_host")  }}';
            var video_link = '{{ trans("listing.video_link")  }}';
                        $('#addedVideos').append(`<div id="addedVideo${videosAddedCount}" class="mb-4">
                            <div class="d-flex justify-content-end">
                                <div class="cursor-pointer" onclick="removeAddedVideo('addedVideo${videosAddedCount}')">
                                        <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_title}</label>
                                <input type="text" name="video_title[]" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_link}</label>
                                <input type="text" class="form-control" name="video_link[]">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_host}</label>
                                <select class="form-control" name="video_host[]" data-placeholder="select">
                                    <option style="font-size: 18px" value="youtube">Youtube</option>
                                    <option style="font-size: 18px" value="vimeo">Vimeo</option>
                                    <option style="font-size: 18px" value="dailymotion">Dailymotion</option>
                                    <option style="font-size: 18px" value="3dview">3D View</option>
                                </select>
                            </div>
                        </div>`)


    }
</script>

@endpush