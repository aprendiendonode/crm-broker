@can('edit_lead')

<i
onclick="event.preventDefault();  table_row_show({{ $lead->id }},'edit_lead_{{ $lead->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan  

@can('assign_task_on_lead')

<i
onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_task_{{ $lead->id }}')"

   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

@endcan  

@can('edit_lead')
  <i
  onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_call_{{ $lead->id }}')"

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.call')"

    class="fe-phone cursor-pointer feather-16 px-1">
  </i>
@endcan   




@can('edit_lead')
  <i
  onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_opportunity_{{ $lead->id }}')"

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.convert_to_opportunity')"

    class="fe-award cursor-pointer feather-16">
  </i>
@endcan  



@can('delete_lead')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_lead')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $lead->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan


@push('js')
    <script>
        function table_row_show(row_id,id){
 
            $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');


            if(id == 'edit_lead_'+row_id){
                    injectGoogleMapsApiScript({
                        key: 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                        libraries: 'places',
                        language: 'ar',
                        region: 'EG',
                        callback: 'initMap',
                    });
                }

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


