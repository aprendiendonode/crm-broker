@cand('edit_lead')
<i
  onclick="event.preventDefault();show_edit_div({{ $qualification->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
  @endcan

  @can('delete_lead')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_qualification')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $qualification->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>

@endcan