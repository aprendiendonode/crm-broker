
<div id="floorPlans-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="floorPlans-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-puzzle-piece fa-2x"></i>
                    <h4>@lang('listing.floor_plans')</h4>
                    <p> <span style="color:red;">
                        @lang('listing.floor_plans_uploaded_in_this_section_will_not_be_displayed_on_bayut.com')
                    </span>
                    @lang('listing.to_add_floor_plans_for_your_listings_on_bayut.com_please_login_to_your')

                     <a href="https://www.bayut.com/profolio">@lang('listing.portfolio')</a> @lang('listing.account')</p>
                </div> 


                <div class="row">
         
        
                    <div class="col-sm-12">
                      <div class="card h-100">
                        
                        <ul class="list-unstyled p-2 d-flex row mx-0" id="plan-files-{{ $listing->id }}">
                            @if($listing->plans)
                                @foreach($listing->plans as $plan)
                                    @php 
                                    $uniq_id = uniqid();
                                    @endphp
                                        <li class="col-3 media" id="planUploaderFile{{ $uniq_id }}">
                                            <div style="display: flex;
                                            justify-content: space-between;
                                            flex-direction: column;
                                            height: 100%;">
                                                <input type="hidden" class="plan-id" value="{{ $plan->id }}" >
                                                <i 
                                                id="remove-planUploaderFile{{ $uniq_id }}"
                                                class="far fa-times-circle cursor-pointer text-danger fa-2x remove-plan"
                                                 onclick="return confirm('are you sure ?') ? removePlan(this,'main') : false;"></i> 
                                            <div class="plan-with-watermark @if($plan->active != 'watermark') d-none @endif">
                                                <img class=" preview-img w-50 m-auto"
                                               
                                                 src="{{ asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$plan->id.'/'.$plan->watermark)  }}"

                                                 alt="Generic placeholder image">

                                            </div>
                                            <div class="plan-no-watermark @if($plan->active == 'watermark') d-none @endif">
                                                <img class=" preview-img w-50 m-auto" 
                                                src="{{ asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$plan->id.'/'.$plan->main)  }}"

                                                alt="Generic placeholder image">

                                            </div>

                                            <input type="hidden" name="edit_floor_plans_{{ $listing->id }}[]" class="listing_plans">

                                                <div class="media-body mb-1">
                                                    <div class="d-flex justify-content-between my-2">
    
                                                        <div>
                                                        <div class="form-group mb-0 title"
                                                        id="title_{{ $plan->id }}"
                                                        >
                                                        {{ $plan->title ? Str::ucfirst( $plan->title) : trans('listing.no_title') }}
                                                    </div>
                                                        </div>
                                                    </div>


                                                <div class="d-flex justify-content-between my-2">
                                                    <div class="plan-with-enlarg-watermark @if($plan->active != 'watermark') d-none @endif">
                                                        
                                                        <a target="_blank" href="{{ asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$plan->id.'/'.$plan->watermark)  }}">enlarg</a>

                                                    </div>
                                                    <div class="@if($plan->active == 'watermark') d-none @endif  plan-no-enlarg-watermark">
                                                        <a target="_blank" href="{{ asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$plan->id.'/'.$plan->main)  }}">enlarg</a>
                                                    </div>
                                                    <div>
                                                    <div class="form-group mb-0">
                                                        <label for="waterMark" class="mb-0">WaterMark</label>
                                                        <input type="checkbox"
                                                        @if($plan->active == 'watermark') checked @endif 
                                                          name="waterMark"
                                                         class="plan-watermark" 
                                                         id="watermark-planUploaderFile{{ $uniq_id }}"
                                                         onchange="togglePlanWatermark(this,'main')">
                                                    </div>
                                                    </div>
                                                </div>


                                                
                                              
                                                <div class="mb-2 d-flex justify-content-start">
                                                    <input
                                                    id="rename_{{ $plan->id }}"
                                                     type="text"
                                                     class="form-control rename_value"
                                                     placeholder="@lang('listing.enter_title')">
                                                    <i 
                                                    id="{{ $plan->id }}"
                                                    class="fa fa-check text-success mt-2 ml-2 cursor-pointer rename" 
                                                    
                                                    onclick="event.preventDefault();modifyName(this,'listing_plans','plan')"></i>
                                                </div>
                                                <div class="text-success save-title-success"  id="save_success_{{ $plan->id }}" > </div>
                                                

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
                    <div class="mb-2">


                        <div class="mb-2 d-flex justify-content-start">
                            <div >
                                <div class="dm-uploader" id="plan-drag-and-drop-zone-{{ $listing->id }}" >
                    
                                        <div role="button" class="btn btn-primary mr-2">
                                            <i class="fa fa-folder-o fa-fw"></i> Browse Files
                                            <input type="file"   title='Click to add Files' />
                                        </div>
                
                                </div>
                            </div>
                            <div >
                                <button data-toggle="modal" data-target="#floorPlanBank-modal" data-dismiss="modal" type="button" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    @lang('listing.floor_plan_bank')
                                </button>
                            </div>
    
                        </div>




                    
                     
                    </div>
                    <p class="mb-0">
                        @lang('listing.press_ctrl_key_while_selecting_files_to_upload_multiple_at_once')
                    </p>
                </div>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('listing.close')</button>
                <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-hidden="true">@lang('listing.done')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('js')
    

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


<script>

    

$(function(){
        var listing_id = @json($listing->id);
        $('#plan-drag-and-drop-zone-'+listing_id).dmUploader({ //
        url: '{{ route("listing.temporary-plans") }}',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFileSize: 3000000, // 3 Megs 
        allowedTypes: 'image/*',
        extFilter: ["jpg", "jpeg","png","gif",'pdf','txt'],
        onNewFile: function(id, file){
            edit_plan_ui_multi_add_file(id, file,listing_id);

            if (typeof FileReader !== "undefined"){
                var reader = new FileReader();
                var img = $('#planUploaderFile' + id+' .plan-with-watermark').find('img');
                
                reader.onload = function (e) {
                img.attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        },
        onBeforeUpload: function(id){
        // about tho start uploading a file
            edit_plan_ui_multi_update_file_progress(id, 0, '', true,listing_id);
            edit_plan_ui_multi_update_file_status(id, 'uploading', 'Uploading...',listing_id);
        },

        onUploadSuccess: function(id, data){

            edit_plan_ui_multi_update_file_status(id, 'success', 'Upload Complete',listing_id);
            edit_plan_ui_multi_update_file_progress(id, 100, 'success', false,listing_id);


            $('#planUploaderFile' + id).find('.rename').attr('id',data.plan.id)
            $('#planUploaderFile' + id).find('.rename_value').attr('id','rename_'+data.plan.id)
            $('#planUploaderFile' + id).find('.save-title-success').attr('id','save_success_'+data.plan.id)
            $('#planUploaderFile' + id).find('.title').attr('id','title_'+data.plan.id)

            var img = $('#planUploaderFile' + id+' .plan-with-watermark').find('img');
            var link = $('#planUploaderFile' + id+' .plan-with-enlarg-watermark').find('a');
            var path = '{{asset("temporary/plans")}}/'+data.plan.folder +'/'+data.plan.watermark
            img.attr('src',path);
            link.attr('href',path);
            $('#planUploaderFile' + id).find('.plan-watermark').attr('id','watermark-planUploaderFile' + id)
            var img = $('#planUploaderFile' + id +' .plan-no-watermark').find('img');
            var link = $('#planUploaderFile' + id+' .plan-no-enlarg-watermark').find('a');
            var path = '{{asset("temporary/plans")}}/'+data.plan.folder +'/'+ data.plan.main

            link.attr('href',path);
            img.attr('src',path);
            $('#planUploaderFile' + id + ' .listing_plans').val(data.plan.folder);


            $('#planUploaderFile' + id).find('.remove-plan').attr('id','remove-planUploaderFile' + id)
            $('#planUploaderFile' + id).find('.plan-id').val( data.plan.id)

        },
        onUploadError: function(id, xhr, status, message){
            edit_plan_ui_multi_update_file_status(id, 'danger', message,listing_id);
            edit_plan_ui_multi_update_file_progress(id, 0, 'danger', false,listing_id);  
        }




        });
    });





</script>
@endpush