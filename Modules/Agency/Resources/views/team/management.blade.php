@can('edit_team')
<i
data-plugin="tippy" 
data-tippy-placement="top-start" 
title="@lang('agency.add_team_member')"
data-toggle="modal" data-target="#add_member_{{ $team->id }}"
class="fe-plus-square cursor-pointer feather-16">
</i>
@endcan


@can('edit_team')
<i
data-plugin="tippy" 
data-tippy-placement="top-start" 
title="@lang('agency.view_team_member')"
data-toggle="modal" data-target="#view_member_{{ $team->id }}"
class="fe-user cursor-pointer feather-16">
</i>
@endcan