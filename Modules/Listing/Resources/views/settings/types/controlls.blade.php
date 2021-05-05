
<i
  onclick="event.preventDefault();show_edit_div({{ $type->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('listing.edit_type')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('listing.delete_type')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $type->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

