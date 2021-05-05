@can('edit_lead')
<i
  onclick="event.preventDefault();show_edit_div({{ $lead->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan  

@can('assign_task_on_lead')
{{-- @can('assign_task_on_lead') --}}


<i

  onclick="event.preventDefault();show_task_div({{ $lead->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

@endcan  


{{-- 
@can('assign_lead_to_staff')


<i

  onclick="event.preventDefault();show_assign_div({{ $lead->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.assign')"

   class="fe-plus cursor-pointer feather-16 px-1">
</i>

@endcan --}}

@can('edit_lead')
  <i

    onclick="event.preventDefault();show_call_div({{ $lead->id }})"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.call')"

    class="fe-phone cursor-pointer feather-16 px-1">
  </i>
@endcan   




@can('edit_lead')
  <i

    onclick="event.preventDefault();show_opportunity_div({{ $lead->id }})"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.convert_to_opportunity')"

    class="fe-award cursor-pointer feather-16">
  </i>
@endcan  



@can('delete_lead')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_lead')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $lead->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan


