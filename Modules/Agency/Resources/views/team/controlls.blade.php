@can('edit_team')
<i
  onclick="event.preventDefault();show_edit_div({{ $team->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan    


@can('delete_team')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('agency.delete_team')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $team->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan
