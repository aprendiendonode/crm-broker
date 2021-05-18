
<i
  onclick="event.preventDefault();show_edit_div({{ $country->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('superadmin.countries.edit_country')"

   class="fe-edit cursor-pointer feather-16">
</i>
   

  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('superadmin.countries.delete_country')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $country->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

