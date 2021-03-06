@can('edit_client')
<i
  onclick="event.preventDefault();  table_row_show({{ $client->id }},{{ $client }},'edit_client_{{ $client->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('agency.edit')"

   class="fe-edit cursor-pointer feather-16">
</i>
@endcan  

@can('assign_task_on_client')

<i

  onclick="event.preventDefault();  table_row_show({{ $client->id }},'client_task_{{ $client->id }}')"
   data-plugin="tippy" 
   data-tippy-placement="top-start" 
   title="@lang('sales.task')"

   class="fe-clipboard cursor-pointer feather-16 px-1">
</i>

@endcan  

@can('edit_client')
  <i

    onclick="event.preventDefault();table_row_show({{ $client->id }},'client_call_{{ $client->id }}')"
    data-plugin="tippy" 
    data-tippy-placement="top-start" 
    title="@lang('sales.call')"

    class="fe-phone cursor-pointer feather-16 px-1">
  </i>
@endcan   


{{-- @can('delete_client')
  <i
      data-plugin="tippy" 
      data-tippy-placement="top-start" 
      title="@lang('sales.delete_client')"
      data-toggle="modal" data-target="#delete-alert-modal_{{ $client->id }}"
  
      class="fe-trash cursor-pointer feather-16">
  </i>
@endcan --}}

{{--@can('edit_client')--}}
  {{--<i--}}

    {{--onclick="event.preventDefault();table_row_show({{ $client->id }},'question_{{ $client->id }}')"--}}
    {{--data-plugin="tippy" --}}
    {{--data-tippy-placement="top-start" --}}
    {{--title="@lang('sales.question')"--}}

    {{--class="fas fa-question cursor-pointer feather-16 px-1">--}}
  {{--</i>--}}
{{--@endcan  --}}

{{--@can('edit_client')--}}
{{--<i--}}

  {{--onclick="event.preventDefault();table_row_show({{ $client->id }},'contract_{{ $client->id }}')"--}}
  {{--data-plugin="tippy" --}}
  {{--data-tippy-placement="top-start" --}}
  {{--title="@lang('sales.contract')"--}}

  {{--class="fas fa-file-contract cursor-pointer feather-16 px-1">--}}
{{--</i>--}}
{{--@endcan   --}}


@push('js')
<script>
 

function  hide_edit_div(id){

    $('.edit_client_'+id).addClass('d-none');


}




function  hide_call_div(id){
    $('.call_'+id).addClass('d-none');

}

function  hide_assign_div(id){

    $('.assign_'+id).addClass('d-none');

}


    function  hide_task_div(id){

        $('.task_'+id).addClass('d-none');



    }


    function  hide_client_div(id){
        $('.client_'+id).addClass('d-none');


    }
 

function  hide_approve_div(id){
    $('.approve_'+id).addClass('d-none');


}


function  hide_hold_div(id){
    $('.hold_'+id).addClass('d-none');

}


function  hide_result_div(id){
    $('.result_'+id).addClass('d-none');

}

function  hide_question_div(id){
    $('.question_'+id).addClass('d-none');


}
</script>


@endpush


