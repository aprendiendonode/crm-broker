
<i
  onclick="event.preventDefault();show_edit_div({{ $community->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('superadmin.communities.edit_community')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('superadmin.communities.delete_community')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $community->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

