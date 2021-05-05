
<i
  onclick="event.preventDefault();show_edit_div({{ $cheque->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('listing.edit_cheque')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('listing.delete_cheque')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $cheque->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

