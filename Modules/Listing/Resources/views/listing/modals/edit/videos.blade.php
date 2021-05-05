
<div id="videos-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="videos-modalLabel" aria-hidden="true">
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
                <div id="addedVideos_{{ $listing->id }}">
                    @if($listing->videos)
                    @forelse($listing->videos as $video)
                        <div id="addedVideo_{{ $listing->id }}_{{ $loop->iteration }}" class="mb-4">
                            <div class="d-flex justify-content-end">
                                <div class="cursor-pointer" onclick="editRemoveAddedVideo('addedVideo_{{ $listing->id }}_{{ $loop->iteration }}')">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_title')</label>
                                <input type="text" name="edit_video_title_{{ $listing->id }}[]" value="{{ $video->title }}" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_link')</label>
                                <input type="text" class="form-control" value="{{ $video->link }}" name="edit_video_link_{{ $listing->id }}[]">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_host')</label>
                                <select class="form-control" name="edit_video_host_{{ $listing->id }}[]" data-placeholder="select">
                                    <option value=""></option>
                                    <option style="font-size: 18px" value="youtube" @if($video->host == 'youtube') selected @endif >@lang('listing.youtube')</option>
                                    <option style="font-size: 18px" value="vimeo" @if($video->host == 'vimeo') selected @endif>@lang('listing.vimeo')</option>
                                    <option style="font-size: 18px" value="dailymotion" @if($video->host == 'dailymotion') selected @endif >@lang('listing.dailymotion')</option>
                                    <option style="font-size: 18px" value="3dview" @if($video->host == '3dview') selected @endif>@lang('listing.3d_view')</option>
                                </select>
                            </div>
                        </div>
                    @empty
                        <div id="addedVideo_{{ $listing->id }}_1" class="mb-4">
                            <div class="d-flex justify-content-end">
                                <div class="cursor-pointer" onclick="editRemoveAddedVideo('addedVideo_{{ $listing->id }}_1')">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_title')</label>
                                <input type="text" name="edit_video_title_{{ $listing->id }}[]" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_link')</label>
                                <input type="text" class="form-control" name="edit_video_link_{{ $listing->id }}[]">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">@lang('listing.video_host')</label>
                                <select class="form-control" name="edit_video_host_{{ $listing->id }}[]" data-placeholder="select">
                                    <option value=""></option>
                                    <option style="font-size: 18px" value="youtube">@lang('listing.youtube')</option>
                                    <option style="font-size: 18px" value="vimeo">@lang('listing.vimeo')</option>
                                    <option style="font-size: 18px" value="dailymotion">@lang('listing.dailymotion')</option>
                                    <option style="font-size: 18px" value="3dview">@lang('listing.3d_view')</option>
                                </select>
                            </div>
                        </div>
                    @endforelse
                    @endif
                </div>
                <button class="btn btn-primary" onclick="event.preventDefault();editAddVideo({{ $listing->id }})"><i class="fas fa-plus-circle mr-1"></i>
                    @lang('listing.add_more_videos')
                </button>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('listing.close')</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">@lang('listing.done')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('js')
<script>
    
    function editRemoveAddedVideo(addedVideo) {
        $('#' + addedVideo).remove();
       
    }

    function editAddVideo(id) {
     var count = $('#addedVideos_'+id +' > div').length + 1;
            var video_title = '{{ trans("listing.video_title")  }}';
            var video_host = '{{ trans("listing.video_host")  }}';
            var video_link = '{{ trans("listing.video_link")  }}';
                        $('#addedVideos_'+id).append(`<div id="addedVideo_${id}_${count}" class="mb-4">
                            <div class="d-flex justify-content-end">
                                <div class="cursor-pointer" onclick="editRemoveAddedVideo('addedVideo_${id}_${count}')">
                                        <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_title}</label>
                                <input type="text" name="edit_video_title_${id}[]" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_link}</label>
                                <input type="text" class="form-control" name="edit_video_link_${id}[]">
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted">${video_host}</label>
                                <select class="form-control" name="edit_video_host_${id}[]" data-placeholder="select">
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