@extends('layouts.master')

@section('title',trans('activity.tasks.title'))
@section('css')


<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
{{--<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">--}}


<style>
    .toggle.android { border-radius: 0px;}
    .toggle.android .toggle-handle { border-radius: 0px; }

    .custom-toggle .btn {
        padding:0 !important;
    }
    .custom-toggle .toggle.btn {
        min-height: 26px;
        min-width: 46px;
    }
</style>


<!-- icons -->
@endsection
@section('content')

<div class="content p-3">


            @php
                if (!owner()){
                        $agency_id = auth()->user()->agency_id;
                }else{

                        $agency_id = auth()->user()->agencies->first()->id;
                }

            @endphp

            <div class="d-flex justify-content-between mb-3">

                <div class="">
                    <a href="{{url('activity/tasks/'.$agency_id.'?action=up_coming')}}" class="btn btn-success waves-effect waves-light">
                        <span class="btn-label"><i class="fe-plus-circle"></i></span> @lang('activity.tasks.up_coming')
                    </a>

                    <a href="{{url('activity/tasks/'.$agency_id.'?action=completed')}}" class="btn btn-outline-blue waves-effect waves-light">
                        <span class="m-1" ><i class="fe-shopping-cart"></i></span>@lang('activity.tasks.completed')
                    </a>

                    <a href="{{ url('activity/tasks/'.$agency_id) }}" class="btn btn-outline-blue waves-effect waves-light">
                        <span class=" m-1"><i class="fe-menu"></i></span>@lang('activity.tasks.all')
                    </a>

                </div>

                <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                    <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('activity.tasks.add_task')
                </button>
            </div>


            <div class="mb-2 add_task "  @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
                @include('activity::task.create')
            </div>


            @include('activity::task.filter')

            <h4 class="pt-3">
                @lang('activity.tasks.list')
            </h4>

            <div>
                <table class="table table-bordered toggle-circle mb-0">
                    <thead>
                        <tr >
                            <th > # </th>
                            <th > @lang('activity.tasks.task_type') </th>
                            <th > @lang('activity.tasks.contact') </th>
                            <th > @lang('activity.tasks.staff') </th>
                            <th > @lang('activity.tasks.add_by') </th>
                            <th > @lang('activity.tasks.date_add') </th>
                            <th > @lang('activity.tasks.deadline') </th>
                            <th > @lang('activity.tasks.status') </th>
                            <th > @lang('activity.tasks.last_note') </th>
                            <th > @lang('global.controls') </th>
                        </tr>
                    </thead>
                    <tbody >
                        @forelse($tasks as $task)
                            <tr >
                                    <td>
                                        {{$task->id ?? ''}}
                                    </td>
                                    <td>
                                         {{--type dynamic--}}
                                        {{$task->task_type && $task->task_type->{'type_'.app()->getLocale()} ? $task->task_type->{'type_'.app()->getLocale()} : ''}}
                                         {{--type static--}}
{{--                                        {{$task->type ? ucwords(str_replace('_',' ',$task->type))  : '' }}--}}
                                    </td>
                                    <td>
{{--                                        @dd($task->module,$task->lead)--}}
                                        @if($task->module == 'lead')
                                            {{$task->lead && $task->lead->full_name ? $task->lead->full_name : ''}}
                                        @elseif($task->module == 'opportunity')
                                            {{$task->opportunity && $task->opportunity->lead && $task->opportunity->lead->full_name ? $task->opportunity->lead->full_name : ''}}

                                        {{--@if($task->module == 'lead')--}}
                                            {{--{{$task->getlead && $task->getlead->full_name ? $task->getlead->full_name : ''}} ,{{$task->module}} ,{{$task->module_id}}--}}
                                        {{--@elseif($task->module == 'opportunity')--}}
                                            {{--{{$task->getopportunity && $task->getopportunity->lead && $task->getopportunity->lead->full_name ? $task->getopportunity->lead->full_name : ''}} ,,{{$task->module_id}}--}}

                                        {{--@elseif($task->module == 'client')--}}
                                            {{--{{$task->getclient && $task->getclient->name ? $task->getclient->name : ''}}--}}
                                        {{--@elseif($task->module == 'listing')--}}
                                            {{--{{$task->getclient && $task->getclient->name ? $task->getclient->name : ''}}--}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @forelse($task->staff as $staff)

                                            @php
                                                $current_users = $staffs->where('id', $staff->id)->first();
                                            @endphp

                                            <img
                                                    class="avatar-sm rounded-circle"
                                                    data-plugin="tippy"
                                                    data-tippy-placement="top-start"
                                                    title="{{ $current_users ? $current_users->{'name_'.app()->getLocale()} :'' }}"

                                                    src="{{  $current_users->image != null ? asset('profile_images/'.$current_users->image) :
                                                    asset('images/user-placeholder.jpg')  }}"
                                                    alt="{{  $current_users->{'name_'.app()->getLocale()}  }}" >
                                        @empty

                                        @endforelse
                                    </td>
                                    <td>
                                        {{$task->addBy && $task->addBy->{'name_'.app()->getLocale()} ? $task->addBy->{'name_'.app()->getLocale()} : ''}}
                                    </td>
                                    <td>
                                        {{$task->created_at ? date('d-m-Y',strtotime($task->created_at)) :''}}
                                    </td>
                                    <td>
                                        {{$task->deadline ? date('d-m-Y',strtotime($task->deadline)) : ''}}
                                    </td>
                                    <td>
                                        <select class="selectpicker mb-0 show-tick  {{ $errors->has('status') ? 'is-invalid' : '' }}"   name="status" class="d-none select_status code_status_{{ $task->id }}" id="task_status_{{ $task->id }}" onchange="status_update('{{ $task->id }}')">
                                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>

                                            {{--<optgroup label="Open">--}}
                                                {{--<option value="not_started"             {{ old('status', $task->status ) == 'not_started' ? 'selected' : ''}} > Not Started</option>--}}
                                                {{--<option value="in_progress"             {{ old('status', $task->status ) == 'in_progress' ? 'selected' : ''}} > In Progress</option>--}}
                                                {{--<option value="waiting_client"          {{ old('status', $task->status ) == 'waiting_client' ? 'selected' : ''}} > Waiting for client</option>--}}
                                                {{--<option value="waiting_documents"       {{ old('status', $task->status ) == 'waiting_documents' ? 'selected' : ''}} > Waiting for Documents</option>--}}
                                                {{--<option value="waiting_approval"        {{ old('status', $task->status ) == 'waiting_approval' ? 'selected' : ''}} > Waiting for Approval</option>--}}
                                            {{--</optgroup>--}}

                                            {{--<optgroup label="Archive">--}}
                                                {{--<option value="completed_successful"    {{ old('status', $task->status ) == 'completed_successful' ? 'selected' : ''}} > Completed-Successful</option>--}}
                                                {{--<option value="completed_unsuccessful"  {{ old('status', $task->status ) == 'completed_unsuccessful' ? 'selected' : ''}} > Completed-Unsuccessful</option>--}}
                                                {{--<option value="escalated_manager"       {{ old('status', $task->status ) == 'escalated_manager' ? 'selected' : ''}} > Escalated to Manager</option>--}}
                                            {{--</optgroup>--}}

                                            @foreach($task_status as  $status)
                                                <option value="{{ $status->id }}" {{ old('status', (($task->task_status && $task->task_status->id) ? $task->task_status->id : '')) == $status->id  ? 'selected' : '' }}>
                                                        {{$status && $status->{'status_'.app()->getLocale()} ? $status->{'status_'.app()->getLocale()} : ''}}
                                                </option>
                                            @endforeach
                                        </select>

                                        <small id="message_status_{{ $task->id }}" ></small>
                                    </td>
                                    <td>

                                        {!! $task->notes && $task->notes->last() && $task->notes->last()->{'notes_'.app()->getLocale()}  ? $task->notes->last()->{'notes_'.app()->getLocale()} : '' !!}
                                    </td>
                                    <td>
                                        <i
                                                onclick="event.preventDefault();show_edit_div('{{ $task->id }}','{{$task->module}}')"
                                                data-plugin="tippy"
                                                data-tippy-placement="top-start"
                                                title="@lang('agency.edit')"

                                                class="fe-edit cursor-pointer feather-16" >
                                        </i>

                                        <i
                                                data-plugin="tippy"
                                                data-tippy-placement="top-start"
                                                title="@lang('activity.notes')"
                                                data-toggle="modal" data-target="#show_notes_modal_{{ $task->id }}"

                                                class="fe-file-text cursor-pointer feather-16">
                                        </i>

                                        <i
                                                data-plugin="tippy"
                                                data-tippy-placement="top-start"
                                                title="@lang('activity.tasks.delete_task')"
                                                data-toggle="modal" data-target="#delete-alert-modal_{{ $task->id }}"

                                                class="fe-trash cursor-pointer feather-16">
                                        </i>

                                    </td>

                                @include('activity::task.notes_modal')

                                <!-- Info Alert Modal -->
                                <div id="delete-alert-modal_{{ $task->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-danger"></i>
                                                    <h4 class="mt-2">@lang('agency.head_up')</h4>
                                                    <p class="mt-3">@lang('agency.delete_warning')</p>
                                                    <form action="{{ route('activity.tasks.delete',$task->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                                        <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </tr>

                            <tr  class="edit_task_{{ $task->id }}"  @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $task->id ))  @else style="display: none !important;opacity: 0;transition: all 0.7s ease 0s;"  @endif  >
                                <td colspan="10">

                                    @include('activity::task.edit',['edited_task' => $task])

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        @lang('global.messages.no_data_in_table')
                                    </td>
                                </tr>
                            @endforelse

                    </tbody>
                </table>
                <div class="d-flex justify-content-between">

                    <div class="mt-2">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>

</div>
@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!-- Footable js -->
<script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

{{-- tooltip --}}
<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<!-- Init js -->
<script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>



<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{asset('assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- Init js-->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2();
        $(".basic-datepicker").flatpickr();

        // max and min date in input deadline
        $("#deadline_add").flatpickr({minDate:"{{date('Y-m-d')}}",maxDate:""});

        var  tasks = @json($tasks);

        for(var i = 0; i < tasks.data.length; i++){
        // tasks.filter(function(value,key){

            {{--@if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $task->id ))--}}
                    {{--console.log(tasks.data[i].module, tasks.data[i].id);--}}
                {{--show_module_div_edit(tasks.data[i].module, tasks.data[i].id);--}}
            {{--@endif--}}
            {{--@if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $task->id ))--}}

            {{--@else--}}
                {{--// var  edit_task_tr = document.querySelector('.edit_task_'+tasks.data[i].id);--}}
                {{--var  edit_task_tr = document.querySelector('.edit_task_'+value.id);--}}
                {{--edit_task_tr.style.display = 'none';--}}

            {{--@endif--}}

            //edit note en
            ClassicEditor
                .create(document.querySelector('#notes_edit_en_'+tasks.data[i].id))
                // .create(document.querySelector('#notes_edit_en_'+value.id))
                .then( newEditor => {
                    // newEditor.ui.view.editable.element.style.height = '150px';
                } )
                .catch(error => {

                });

            //edit note ar
            ClassicEditor
                .create( document.querySelector( '#notes_edit_ar_'+tasks.data[i].id),{
                // .create( document.querySelector( '#notes_edit_ar_'+value.id),{
                    language: 'ar'
                } )
                .then( newEditor => {
                    // newEditor.ui.view.editable.element.style.height = '150px';
                } )
                .catch( error => {

                } );

            //add new note en modal
            ClassicEditor
                .create(document.querySelector('#add_new_note_en_'+tasks.data[i].id))
                // .create(document.querySelector('#add_new_note_en_'+value.id))
                .then( newEditor => {
                    // newEditor.ui.view.editable.element.style.height = '150px';
                } )
                .catch(error => {

                });

            //add new note ar modal
            ClassicEditor
                .create( document.querySelector( '#add_new_note_ar_'+tasks.data[i].id),{
                // .create( document.querySelector( '#add_new_note_ar_'+value.id),{
                    language: 'ar'
                } )
                .then( newEditor => {
                    // newEditor.ui.view.editable.element.style.height = '150px';
                } )
                .catch( error => {

                } );
        // });
        }
    })
</script>

<script>
  function  show_add_div(){

     var  div = document.querySelector('.add_task');
        if(div.style.display === 'none'){
            div.style.display = 'block';

            setTimeout(function(){

                div.style.opacity = 1;

            },10);
            // div.classList.remove('d-none')
        } else {
            div.style.display = 'none';
            setTimeout(function(){

            div.style.opacity = 0;


            },10);

        }

    }


  function  show_edit_div(id,module){
      var  div = document.querySelector('.edit_task_'+id);
      if(div.style.display === 'none'){




          div.style.display = '';
          console.log(id,module);
          show_module_div_edit(module,id);
          setTimeout(function(){

              div.style.opacity = 1;

          },10);
      } else {
          div.style.display = 'none';
          setTimeout(function(){

              div.style.opacity = 0;


          },10);

      }

  }


  function  hide_edit_div(id){
      var  div = document.querySelector('.edit_task_'+id);

      div.style.display = 'none';
      setTimeout(function(){

          div.style.opacity = 0;


      },10);



  }

</script>

<script>

    function toggle_note(){
        type = $('.note').prop('checked');
        if(type == true){
            //english
            $('.note_en').removeClass('d-none');
            $('.note_ar').addClass('d-none');
        } else {
            $('.note_en').addClass('d-none');
            $('.note_ar').removeClass('d-none');


        }
    }

    ClassicEditor
        .create(document.querySelector('#note_en'))
        .then( newEditor => {
            newEditor.ui.view.editable.element.style.height = '150px';
        } )
        .catch(error => {

        });

    ClassicEditor
        .create( document.querySelector( '#note_ar' ),{
            language: 'ar'
        } )
        .then( newEditor => {
            newEditor.ui.view.editable.element.style.height = '150px';
        } )
        .catch( error => {

        } );


    function toggle_edit_note(id){
        type = $('.notes_edit_'+id).prop('checked');
        if(type == true){
            //english
            $('.notes_edit_en_'+id).removeClass('d-none');
            $('.notes_edit_ar_'+id).addClass('d-none');
        } else {
            $('.notes_edit_en_'+id).addClass('d-none');
            $('.notes_edit_ar_'+id).removeClass('d-none');


        }
    }

    function toggle_add_new_note(id){
        type = $('.add_new_note_'+id).prop('checked');
        if(type == true){
            //english
            $('.add_new_note_en_'+id).removeClass('d-none');
            $('.add_new_note_ar_'+id).addClass('d-none');
        } else {
            $('.add_new_note_en_'+id).addClass('d-none');
            $('.add_new_note_ar_'+id).removeClass('d-none');


        }
    }

    function status_update(id) {
        var status     = document.getElementById("task_status_"+id).value;
        // console.log(performance);
        $.ajax({
            url: '{{ url("activity/tasks/update_status") }}',
            type: 'POST',
            data: {
                _token:"{{ csrf_token() }}",
                id:id,
                status:status
            },
            success: function(data){

                // data.message

                var message_status    = document.getElementById("message_status_"+id);
                message_status.innerHTML = data.message;
                setTimeout(function () {
                    // $("#message_performance_"+id).remove();
                    message_status.innerHTML = '';
                }, 5000); // 5 secs
            },
            error: function(data){
                console.log(data.responseJSON.message);
                $('.error-message').text(data.responseJSON.message);

            }


        })
    }
</script>
@endpush