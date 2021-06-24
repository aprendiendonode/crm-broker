                

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
         table_row_show({{ $listing->id }},'edit_listing_{{ $listing->id }}')
        "
        data-plugin="tippy"
        data-tippy-placement="top-start"
        title="Edit"
        class="fa fa-edit cursor-pointer feather-16">
</i>
@endcan

@if($listing->status == 'archive')
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


