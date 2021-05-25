
<i
  onclick="event.preventDefault();show_edit_div({{ $community->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('superadmin.sub_communities.edit_sub')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('superadmin.sub_communities.delete_sub')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $community->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

