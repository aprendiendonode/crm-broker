<div id="videos-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="videos-modalLabel" aria-hidden="true">
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
                            <div class="cursor-pointer"
                                onclick="editRemoveAddedVideo('addedVideo_{{ $listing->id }}_{{ $loop->iteration }}')">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_title')</label>
                            <input required type="text" name="edit_video_title_{{ $listing->id }}[]"
                                value="{{ $video->title }}"
                                class="form-control listing-videotitle-for-submit-{{ $listing->id }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_link')</label>
                            <input required type="text"
                                class="form-control listing-videolink-for-submit-{{ $listing->id }}"
                                value="{{ $video->link }}" name="edit_video_link_{{ $listing->id }}[]">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_host')</label>
                            <select required class="form-control listing-videohost-for-submit-{{ $listing->id }}"
                                name="edit_video_host_{{ $listing->id }}[]" data-placeholder="select">
                                <option value=""></option>
                                <option style="font-size: 18px" value="youtube" @if($video->host == 'youtube') selected
                                    @endif >@lang('listing.youtube')</option>
                                <option style="font-size: 18px" value="vimeo" @if($video->host == 'vimeo') selected
                                    @endif>@lang('listing.vimeo')</option>
                                <option style="font-size: 18px" value="dailymotion" @if($video->host == 'dailymotion')
                                    selected @endif >@lang('listing.dailymotion')</option>
                                <option style="font-size: 18px" value="3dview" @if($video->host == '3dview') selected
                                    @endif>@lang('listing.3d_view')</option>
                            </select>
                        </div>
                    </div>
                    @empty
                    <div id="addedVideo_{{ $listing->id }}_1" class="mb-4">
                        <div class="d-flex justify-content-end">
                            <div class="cursor-pointer"
                                onclick="editRemoveAddedVideo('addedVideo_{{ $listing->id }}_1')">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_title')</label>
                            <input required type="text" name=" edit_video_title_{{ $listing->id }}[]"
                                class="form-control listing-videotitle-for-submit-{{ $listing->id }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_link')</label>
                            <input required type="text"
                                class="form-control listing-videolink-for-submit-{{ $listing->id }}"
                                name="edit_video_link_{{ $listing->id }}[]">
                        </div>
                        <div class="form-group mb-2">
                            <label class="font-weight-medium text-muted">@lang('listing.video_host')</label>
                            <select required class="form-control listing-videohost-for-submit-{{ $listing->id }}"
                                name="edit_video_host_{{ $listing->id }}[]" data-placeholder="select">
                                <option value=""></option>
                                <option style="font-size: 18px" value="youtube">@lang('listing.youtube')</option>
                                <option style="font-size: 18px" value="vimeo">@lang('listing.vimeo')</option>
                                <option style="font-size: 18px" value="dailymotion">@lang('listing.dailymotion')
                                </option>
                                <option style="font-size: 18px" value="3dview">@lang('listing.3d_view')</option>
                            </select>
                        </div>
                    </div>
                    @endforelse
                    @endif
                </div>
                <button class="btn btn-primary" onclick="event.preventDefault();
                     editAddVideo(
                         {{ $listing->id }},
                         '{{ trans('listing.video_title')  }}',
                         '{{ trans('listing.video_host')  }}',
                         '{{ trans('listing.video_link')  }}'
                    )"><i class="fas fa-plus-circle mr-1"></i>
                    @lang('listing.add_more_videos')
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                <button type="button" class="btn btn-success"
                    onclick="updateListingVideos(
                    {{ $listing->id }},'{{ route('listings.update-listing-videos') }}',
                 '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )">@lang('listing.add_video')</button>


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('js')
<script>


</script>


@endpush
