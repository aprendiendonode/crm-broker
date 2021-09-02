@can('edit_staff')
<i
  onclick="event.preventDefault();show_edit_div({{ $staff->id }})"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('moderator.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan    

@can('manage_all_staff_privileges')

<a href="{{ url('agency/staff/'.request('agency').'/privileges/'.$staff->id.'?page='.(request('page') ? request('page') : 1)) }}">
    
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('moderator.privileges')"
  
      class="mdi mdi-account-supervisor-circle cursor-pointer feather-16">
  </i>
</a> 
@endcan

@if(owner())

    <a href="{{ url('moderator/change_activation/'.$staff->id) }}">

        <i
            data-plugin="tippy"
            data-tippy-placement="top-start"
            title="{{ $staff->active == 1 ? __('moderator.in_active') : __('moderator.active')}} "

            class="fas {{ $staff->active == 1 ? 'fa-user-alt-slash' : 'fa-user-check' }} cursor-pointer feather-16">
        </i>
    </a>
@endcan

@can('manage_team_staff')
<i
  data-plugin="tippy" 
  data-tippy-placement="top-start" 
  title="@lang('moderator.change_team')"
  data-toggle="modal" data-target="#change_team_{{ $staff->id }}"
  class="fe-users cursor-pointer feather-16">
</i>
@endcan
@can('edit_staff')
<i
data-plugin="tippy" 
data-tippy-placement="top-start" 
title="@lang('moderator.change_password')"
data-toggle="modal" data-target="#changePassword_{{ $staff->id }}"
class="fe-unlock cursor-pointer feather-16">
</i>
@endcan

@if(owner())
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('moderator.delete_moderator')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $staff->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan


@if(auth()->user()->type == 'owner')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('moderator.update_moderator_agencies')"
      data-toggle="modal" data-target="#moderator-modal_{{ $staff->id }}"
  
      class="fe-star cursor-pointer feather-16">
  </i>
@endif
