
<i
  onclick="event.preventDefault();show_edit_div({{ $priority->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_priority')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $priority->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

