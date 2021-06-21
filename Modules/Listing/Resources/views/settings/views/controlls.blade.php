@can('edit_listing')
<i
  onclick="event.preventDefault();show_edit_div({{ $view->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('listing.edit_view')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan 

@can('delete_listing')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('listing.delete_view')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $view->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan