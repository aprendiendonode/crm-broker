@can('edit_opportunity')
<i
  onclick="event.preventDefault();  table_row_show({{ $opportunity->id }},{{ $opportunity }},'edit_opportunity_{{ $opportunity->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan  

@can('assign_task_on_opportunity')
{{-- @can('assign_task_on_opportunity') --}}


<i

  onclick="event.preventDefault();  table_row_show({{ $opportunity->id }},null,'task_{{ $opportunity->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

@endcan  



@can('assign_opportunity_to_staff')

<i

  onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'assign_{{ $opportunity->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.assign')"

   class="fe-plus cursor-pointer feather-16 px-1">
</i>

@endcan

@can('edit_opportunity')
  <i

    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'call_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.call')"

    class="fe-phone cursor-pointer feather-16 px-1">
  </i>
@endcan   


{{-- @can('delete_opportunity')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_opportunity')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $opportunity->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan --}}

@can('edit_opportunity')
  <i

    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'question_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.question')"

    class="fas fa-question cursor-pointer feather-16 px-1">
  </i>
@endcan  




@can('edit_opportunity')
  <i

    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'result_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.update_result')"

    class="fas fa-poll cursor-pointer feather-16 px-1">
  </i>
@endcan   

@if($opportunity->converting_approval == 'waiting_for_approve')
@can('convert_opportunity_to_client')

    <i
    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'approve_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.waiting_for_approve')"

    class="fa fa-check cursor-pointer feather-16 text-success px-2">


    </i>

    <i

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.approval_request_by') {{ $opportunity->submitForApproveBy ? $opportunity->submitForApproveBy->{'name_'.app()->getLocale()} : '' }} , @lang('sales.at') {{  $opportunity->submit_for_approve_date }} "

    class="fas fa-book cursor-pointer feather-16 text-success">


    </i>
@endcan  
@elseif($opportunity->converting_approval == 'hold')
    <i


    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'hold_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.on_hold')"

    class="mdi mdi-car-brake-hold cursor-pointer feather-16 text-warning px-2">
    </i>


    <i

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.on_hold_by') {{ $opportunity->holdBy ? $opportunity->holdBy->{'name_'.app()->getLocale()} : '' }} , @lang('sales.at') {{  $opportunity->hold_date }} "

    class="fas fa-book cursor-pointer feather-16 text-warning">


    </i>
@elseif($opportunity->converting_approval == 'rejected')

    <i

    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'client_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.convert_reject_opportunity_to_client')"


    class="mdi mdi-close-thick cursor-pointer feather-16 text-danger px-2">
    </i>


    <i

    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.rejected_by') {{ $opportunity->rejectedBy ? $opportunity->rejectedBy->{'name_'.app()->getLocale()} : '' }} , @lang('sales.at') {{  $opportunity->reject_date }} "

    class="fas fa-book cursor-pointer feather-16 text-danger ">


    </i>
@else
    <i

    onclick="event.preventDefault();table_row_show({{ $opportunity->id }},{{ $opportunity }},'client_{{ $opportunity->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.convert_to_client')"

    class="fe-award cursor-pointer feather-16 text-primary">
    </i>

@endif


@can('edit_opportunity')
    <i

        onclick="event.preventDefault();table_row_show({{ $opportunity->id }},null,'total_result_{{ $opportunity->id }}')"
        data-plugin="tippy" 
        data-tippy-placement="top-start" 
        title="@lang('sales.total_result')"
        class="fas fa-poll cursor-pointer feather-16 px-1">
    </i>
    @endcan   



