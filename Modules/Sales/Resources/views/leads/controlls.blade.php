@can('edit_lead')

<i
onclick="event.preventDefault();  table_row_show({{ $lead->id }},'edit_lead_{{ $lead->id }}',{{ $lead }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan  

@can('assign_task_on_lead')

<i
onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_task_{{ $lead->id }}')"

   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

@endcan  

@can('edit_lead')
  <i
  onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_call_{{ $lead->id }}')"

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.call')"

    class="fe-phone cursor-pointer feather-16 px-1">
  </i>

  <i
  onclick="event.preventDefault();  table_row_show({{ $lead->id }},'lead_opportunity_{{ $lead->id }}')"

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.convert_to_opportunity')"

    class="fe-award cursor-pointer feather-16">
  </i>



{{-- 
@can('delete_lead')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_lead')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $lead->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan --}}
@if($lead->status == 'active')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.archive_lead')"
      data-toggle="modal" data-target="#archive-alert-modal_{{ $lead->id }}"
  
      class="fas fa-archive cursor-pointer feather-16">
  </i>
  @else
  
    <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.active_lead')"
      data-toggle="modal" data-target="#active-alert-modal_{{ $lead->id }}"
      class="fab fa-autoprefixer cursor-pointer feather-16"
    >
  @endif
@endcan


@push('js')
   
@endpush


