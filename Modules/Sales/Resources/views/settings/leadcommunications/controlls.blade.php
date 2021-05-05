
<i
  onclick="event.preventDefault();show_edit_div({{ $communication->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_communication')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $communication->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

