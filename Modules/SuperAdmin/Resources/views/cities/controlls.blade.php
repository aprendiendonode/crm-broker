
<i
  onclick="event.preventDefault();show_edit_div({{ $city->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('superadmin.cities.edit_city')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('superadmin.cities.delete_city')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $city->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

