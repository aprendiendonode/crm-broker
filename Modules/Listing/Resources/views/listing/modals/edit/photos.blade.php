<div id="photos-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="photos-modalLabel" aria-hidden="true">
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
        
                      <ul class="list-unstyled p-2 d-flex row mx-0" id="files-{{ $listing->id }}">
                

                        @if($listing->photos)
                            @foreach($listing->photos as $photo)
                            @php 
                            $uniq_id = uniqid();
                            @endphp
                            <li class="col-3 media" id="uploaderFile{{ $uniq_id }}">
                                 <div style="display: flex;
                                    justify-content: space-between;
                                    flex-direction: column;
                                    height: 100%;">


                            <i class="far fa-times-circle cursor-pointer text-danger fa-2x remove-photo" 
                            id="remove-uploaderFile{{  $uniq_id }}" onclick="return confirm('are you sure ?') ? removePhoto(this,'main') : false"></i> 

                                    <input type="hidden" class="photo-id" value={{ $photo->id }}>
                                    <div class="with-watermark">
                                        <img class=" preview-img w-50 m-auto @if($photo->active != 'watermark') d-none @endif" 
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark)  }}"
                                         alt="Generic placeholder image">
                                
                                    </div>
                                    <div class="no-watermark @if($photo->active != 'main') d-none @endif">
                                        <img class=" preview-img w-50 m-auto"
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main)  }}"

                                         alt="Generic placeholder image">

                                    </div>
                                
                                    {{-- <input type="hidden" name="edit_photos_{{ $listing->id }}[]" class="listing_photos"> --}}
                                    <div class="media-body mb-1">
                                            <div class="d-flex justify-content-between my-2">

                                           <div>     
                                            <div class="@if($photo->active != 'watermark') d-none @endif with-enlarg-watermark">
                                                
                                                <a target="_blank" href="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark)  }}">@lang('listing.enlarg')</a>
                                
                                            </div>
                                            <div class="@if($photo->active != 'main') d-none @endif no-enlarg-watermark">
                                                <a target="_blank" href="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main)  }}">@lang('listing.enlarg')</a>
                                            </div>

                                            <div>
                                                <div class="form-group">
                                                <label for="">Select a Gategory</label>
                                                  <select
                                                  id="listing-category-{{ $uniq_id }}"
                                                   class="form-control listing-category-{{ $listing->id }}" onchange="updateListingCategory(this,'main')" >
                                                    <option value="">@lang('listing.select_category')</option>
                                                    @foreach($listing_categories as $category)
                                                      <option
                                                      data-allowed="{{ $category->allowed }}"
                                                       value="{{ $category->id }}"
                                                        @if($photo->listing_category_id == $category->id) selected @endif
                                                        >
                                                       
                                                        {{ app()->getLocale() == 'en' ? $category->name  : $category->localized_name }}
                                                      </option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>

                                            </div>
                                            <div>
                                                <div class="form-group mb-0">
                                                <label for="waterMark" class="mb-0">@lang('listing.watermark')</label>
                                                <input 
                                                type="checkbox" 
                                                 
                                                @if($photo->active == 'watermark') checked @endif
                                                name="waterMark"
                                                 id="watermark-uploaderFile{{ $uniq_id }}"
                                                 class="watermark" onchange="toggleWatermark(this,'main')">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="waterMark" class="mb-0">@lang('listing.main')</label>
                                                <input type="checkbox" 
                                                id="checked-main-uploaderFile{{ $uniq_id }}"
                                                 name="checked_main" class="checked_main" @if($photo->photo_main == 'yes') checked @endif onchange="updateMain(this,'main','{{ $listing->id }}')">


                                                {{-- <input type="hidden"   id="checked-main-uploaderFile{{ $uniq_id }}-hidden" name="edit_checked_main_hidden_{{ $listing->id }}[]" class="checked_main_hidden" value="{{ $photo->photo_main }} "> --}}
                                                 
                                            </div>
                                            </div>
                                            </div>
                                            
                                
                                    
                                            
                                            <hr class="mt-1 mb-1" />
                                        </div>
                                </div>
                          
                              </li>
                            @endforeach
                        @endif





                      </ul>
                    </div>
                  </div>
                </div><!-- /file list -->
          

                <div>
                    <div class="mb-2 d-flex justify-content-start">
                        <div >
                            <div class="dm-uploader" id="drag-and-drop-zone-{{ $listing->id }}" >
                
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
                <button type="button"  class="btn btn-primary" onclick="handleCloseModal('{{ $listing->id }}')" aria-hidden="true">
                    @lang('listing.done')
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="imageBank-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageBank-modalLabel" aria-hidden="true">
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
