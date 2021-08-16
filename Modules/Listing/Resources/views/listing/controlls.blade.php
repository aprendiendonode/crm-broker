                

<i

  onclick="event.preventDefault();  table_row_show({{ $listing->id }},'task_{{ $listing->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

<i

  onclick="event.preventDefault();  table_row_show({{ $listing->id }},'notes_{{ $listing->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.note')"
  
   class="fas fa-sticky-note cursor-pointer feather-16 px-1">
</i>





@can('edit_listing')

<i
        onclick="event.preventDefault();
        
         load_edit({{ $listing->id }},{{ $listing }})
        "
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="Edit"
        class="load-edit-{{ $listing->id }} fa fa-edit cursor-pointer feather-16">
</i>



{{-- photos modal loading script --}}
@push('js')
<script type="text/html" id="files-template-{{ $listing->id }}">
    <li class="col-3 media">
      <div style="display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 100%;">
    <i class="far fa-times-circle cursor-pointer text-danger fa-2x remove-photo" onclick="return confirm('are you sure ?') ? removePhoto(this,'temporary') : false"></i> 

    <input type="hidden" class="photo-id" >
    <div class="with-watermark">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>
    <div class="no-watermark d-none">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>

    <input type="hidden" name="edit_photos_{{ $listing->id }}[]" class="listing_photos listing-photos-for-submit-{{ $listing->id }}">

        <div class="media-body mb-1">
          <div class="d-flex justify-content-between my-2">
            <div class="with-enlarg-watermark">
                
                <a target="_blank" href="">@lang('listing.enlarg')</a>

            </div>
            <div class="d-none no-enlarg-watermark">
                <a target="_blank" href="">@lang('listing.enlarg')</a>
            </div>

            <div>
                <div class="form-group">
                <label for="">Select a Gategory</label>
                  <select class="form-control listing-category-{{ $listing->id }}" onchange="updateListingCategory(this,'temp')" >
                    <option value="">@lang('listing.select_category')</option>
                    @foreach($listing_categories as $category)
                      <option value="{{ $category->id }}">
                        {{ app()->getLocale() == 'en' ? $category->name  : $category->localized_name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            <div>
              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">@lang('listing.watermark')</label>
                <input type="checkbox" checked name="waterMark" class="watermark" onchange="toggleWatermark(this,'temporary')">
              </div>

              <div class="form-group mb-0">
                <label for="waterMark" class="mb-0">@lang('listing.main')</label>
                <input type="checkbox"  name="checked_main" class="checked_main" onchange="updateMain(this,'temporary')">
                <input type="hidden"  name="edit_checked_main_hidden_{{ $listing->id }}[]" class="checked_main_hidden checked_main_hidden-{{ $listing->id }}" value="no">
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



  
<script type="text/html" id="plan-files-template-{{ $listing->id }}">
    <li class="col-3 media">
    <div style="display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 100%;">
    <input type="hidden" class="plan-id" >
    <i class="far fa-times-circle cursor-pointer text-danger fa-2x remove-plan" onclick="return confirm('are you sure ?') ? removePlan(this,'temporary') : false"></i> 
    <div class="plan-with-watermark">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>
    <div class="plan-no-watermark d-none">
        <img class=" preview-img w-50 m-auto" src="" alt="Generic placeholder image">

    </div>

    <input type="hidden" name="edit_floor_plans_{{ $listing->id }}[]" class="listing_plans">

        <div class="media-body mb-1">


            <div class="d-flex justify-content-between my-2">
    
                <div>
                <div class="form-group mb-0 title">
                    @lang('listing.no_title')
                </div>
                </div>
            </div>



            <div class="d-flex justify-content-between my-2">
                <div class="plan-with-enlarg-watermark">
                    
                    <a target="_blank" href="">enlarg</a>

                </div>
                <div class="d-none plan-no-enlarg-watermark">
                    <a target="_blank" href="">enlarg</a>
                </div>
                <div>
                <div class="form-group mb-0">
                    <label for="waterMark" class="mb-0">WaterMark</label>
                    <input type="checkbox" checked name="waterMark" class="plan-watermark" onchange="togglePlanWatermark(this,'temporary')">
                </div>
                </div>
            </div>

        <div class="mb-2 d-flex justify-content-start">
            <input type="text" class="form-control rename_value"  placeholder="@lang('listing.enter_title')">
            <i 
            class="fa fa-check text-success mt-2 ml-2 cursor-pointer rename" 
            
            onclick="event.preventDefault();modifyName(this,'temporary_plans','plan')"></i>
        </div>

        <div class="text-success save-title-success" > </div>
        

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




<script type="text/html" id="document-files-template-{{ $listing->id }}">
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

    <input type="hidden" name="edit_documents_{{ $listing->id }}[]" class="listing_documents">

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


  @endpush
 




<i
        onclick="event.preventDefault();
        
         close_edit({{ $listing->id }})
        "
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="Close"
        class="close-edit-{{ $listing->id }} fas fa-times-circle cursor-pointer feather-16 d-none">
</i>

@endcan

@if($listing->status == 'archive' && request('status_main') == 'archive')
@can('delete_listing')


       <!-- Info Alert Modal -->
       <div id="delete-alert-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-danger"></i>
                        <h4 class="mt-2">@lang('agency.head_up')</h4>
                        <p class="mt-3">@lang('agency.delete_warning')</p>
                        <form action="{{ route('listings.delete') }}" method="post">
                            @csrf
                            <input  type="hidden" name="listing_id" value="{{ $listing->id }}">
                            <div class="">
                                <button type="submit" class="btn btn-danger m-2">@lang('agency.confirm_delete')</button>
                                <button type="button" class="btn btn-success m-2" data-dismiss="modal">@lang('agency.cancel')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<i
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="@lang('agency.delete_listing')"
        data-toggle="modal" data-target="#delete-alert-modal_{{ $listing->id }}"

        class="fe-trash cursor-pointer feather-16">
</i>
@endcan
@endif

@push('js')
    <script>

     
        function table_row_show(row_id,id){

            if(id == 'edit_listing_'+row_id){
                injectGoogleMapsApiScript({
                    key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries: 'places',
                    language: 'ar',
                    region: 'EG',
                    callback: 'initMap',
                });

                $('#photos-modal_'+row_id).modal({
                    show: false,
                    backdrop: 'static'
                    })
                ClassicEditor
                    .create(document.querySelector('#edit_description_en_' + row_id))
                    .then()
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#edit_description_ar_' + row_id), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });
            }

         
        
        $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');
        if($('.'+id).hasClass('d-none')){
            $('.'+id).removeClass('d-none');
        }else{
            $('.'+id).addClass('d-none');

        }

        }
        function table_row_hide(id){
        
        $('.'+id).addClass('d-none');

        }

    </script>
@endpush


