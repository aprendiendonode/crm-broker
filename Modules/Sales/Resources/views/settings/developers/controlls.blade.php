
<i
  onclick="event.preventDefault();show_edit_div({{ $developer->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_developer')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $developer->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

