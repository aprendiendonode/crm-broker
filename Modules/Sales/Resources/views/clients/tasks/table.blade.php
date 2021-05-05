
     
 <div class="card-box">
            <h4 class="header-title">@lang('sales.task_history')</h4>
       
    
          
      <div class="table-responsive">
       <table class="foo-task  table table-bordered toggle-circle mb-0">
        <thead class="thead-light">
            <th>#</th>
            <th>@lang('sales.type')</th>
            <th>@lang('sales.status')</th>
            <th data-hide="phone">@lang('sales.deadline')</th>
            <th data-hide="phone">@lang('sales.assigned_by')</th>
            <th data-hide="phone">@lang('sales.controlls')</th>
        </thead>
        <tbody>
            @if($client->tasks)
            @forelse($client->tasks->sortByDesc('id') as $task)
            <tr>
            <td>{{ ($loop->index + 1) }}  </td>
            <td>

                @php
                   $task_type = $task_types->where('id',$task->task_type_id)->first();
                   
                @endphp
                
                {{ $task_type ? str_replace("_"," ", $task_type->{'type_'.app()->getLocale()} ) :'' }}
            </td>
            <td>
                
                @php
                   $task_status_single =  $task_status->where('id',$task->task_status_id)->first();                   
                @endphp
                
                {{ $task_status_single ? str_replace("_"," ",$task_status_single->{'status_'.app()->getLocale()} ):'' }}
                
                
                
            
            </td>


            <td>

                @php

                    $task_type_complete = $task_status_single ? $task_status_single->type_complete : '';

                @endphp
                
                {{  Carbon\Carbon::parse($task->deadline.' '.  $task->time)->diffForHumans()   }}


                   @if(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete != 'on' ) <span class="badge badge-soft-danger">@lang('sales.overdue')</span> 
                   @elseif(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'on')  <span class="badge badge-soft-success">@lang('sales.achieved')</span>
                   @elseif(( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'off')  <span class="badge badge-soft-info">@lang('sales.active')</span> @endif  </td>

  

            <td>{{ $task->addBy ? $task->addBy->{'name_'.app()->getLocale()} : '' }}</td>

            <td>
                {{-- @can('delete_client') --}}
                    <i
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.details')"
                        
                        onclick="show_task_row({{ $client->id }},{{ $task->id }})"
                        class="fe-eye cursor-pointer feather-16">
                    </i>
                    <i
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.edit')"
                        
                        onclick="toggle_task_edit({{ $client->id }},{{ $task->id }})"
                        class="fe-edit cursor-pointer feather-16">
                    </i>
                    <i
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.delete_task')"
                        data-toggle="modal" data-target="#delete-task-alert-modal_{{ $task->id }}"
                    
                        class="fe-trash cursor-pointer feather-16">
                    </i>
                {{-- @endcan --}}
            </td>
            </tr>


            <tr  class="d-none task_row_{{ $task->id }}_{{ $client->id }}" >
                <td colspan="6">

                    @include('sales::clients.tasks.task_row')

                </td>
            </tr>

            <tr  class="d-none task_edit_{{ $task->id }}_{{ $client->id }}" >
                <td colspan="6">
                    @include('sales::clients.tasks.edit')
                </td>
            </tr>





            <div id="delete-task-alert-modal_{{ $task->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="dripicons-information h1 text-danger"></i>
                                <h4 class="mt-2">@lang('agency.head_up')</h4>
                                <p class="mt-3">@lang('sales.task_warning') </p>
                                <form action="{{ url('sales/delete-client-tasks') }}" method="post">
                                    @csrf
                                    <input  type="hidden"  name="task_id" value="{{ $task->id }}">
                                    <input  type="hidden"  name="task_client_id" value="{{ $client->id }}">

                                    <button type="submit" formaction="{{ url('sales/delete-client-tasks')}}"class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                    <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            @empty
            <tr>
             <td colspan="6" class="text-center">@lang('sales.no_records')</td>
            </tr>

            @endforelse
            @else   

            @lang('sales.no_records')

            @endif
        </tbody>
      </table>
</div>
</div>