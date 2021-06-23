
<i
onclick="event.preventDefault();show_edit_div({{ $permission->id }})"
 data-plugin="tippy" 
 data-tippy-placement="top-start" 
 title="@lang('superadmin.permissions.edit')"

 class="fe-edit cursor-pointer feather-16">
</i>
 

<i
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('superadmin.permissions.delete')"
    data-toggle="modal" data-target="#delete-alert-modal_{{ $permission->id }}"

    class="fe-trash cursor-pointer feather-16">
</i>

