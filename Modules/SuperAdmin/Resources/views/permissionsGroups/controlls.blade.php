
<i
onclick="event.preventDefault();show_edit_div({{ $group->id }})"
 data-plugin="tippy" 
 data-tippy-placement="top-start" 
 title="@lang('superadmin.permissionsGroup.edit')"

 class="fe-edit cursor-pointer feather-16">
</i>
 

<i
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('superadmin.permissionsGroup.delete')"
    data-toggle="modal" data-target="#delete-alert-modal_{{ $group->id }}"

    class="fe-trash cursor-pointer feather-16">
</i>

