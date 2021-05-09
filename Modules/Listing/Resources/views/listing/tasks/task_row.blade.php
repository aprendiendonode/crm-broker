<div class="row">

<div class="col-md-4">

<div>
    <label class="font-weight-medium text-muted"> @lang('sales.status') : </label>
    <p>{{ $task_status ? str_replace("_"," ",$task_status->first()->{'status_'.app()->getLocale()} ):'' }}</p>
</div>

<div>
    <label class="font-weight-medium text-muted"> @lang('sales.type') : </label>
    <p>{{ $task_type ? str_replace("_"," ",$task_type->first()->{'type_'.app()->getLocale()} ) :'' }}</p>
</div>


<div>
    <label class="font-weight-medium text-muted"> @lang('sales.assigned_by') : </label>
    <p>{{ $task->addBy ? $task->addBy->{'name_'.app()->getLocale()} : '' }}</p>
</div>

</div>
<div class="col-md-4">
<div>
    <label class="font-weight-medium text-muted"> @lang('sales.assigned_at') : </label>
    <p>{{ $task->created_at->toFormattedDateString() }}</p>
</div>


<div>
    <label class="font-weight-medium text-muted"> @lang('sales.deadline') : </label>
    <p>{{ \Carbon\Carbon::parse($task->deadline)->toFormattedDateString() }}</p>
    <p>{{ $task->time }}</p>
    <p> {{ Carbon\Carbon::parse($task->deadline.' '.  $task->time)->diffForHumans() }} 
        
        @if(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete != 'on' ) <span class="badge badge-soft-danger">@lang('sales.overdue')</span> 
        @elseif(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'on')  <span class="badge badge-soft-success">@lang('sales.achieved')</span>
        @elseif(( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'off')  <span class="badge badge-soft-info">@lang('sales.active')</span> @endif 
     </p>
</div>

</div>

<div class="col-md-4">

    <div>
        <label class="font-weight-medium text-muted"> @lang('sales.assigned_to') : </label>
        <p>{{ $task->staff ? $task->staff->count() : '' }} @lang('listing.agents')</p>
  
    </div>
    @if($task->staff)
    @forelse($task->staff as $user)

    {{-- <img src="" alt="image" class="img-fluid avatar-sm rounded mt-2"> --}}

      
    
            <div class="checkbox checkbox-primary mb-2">
                <input  checked  id="task_{{ $listing->id}}_{{ $task->id }}_{{ $user->id }}" value="" disabled type="checkbox">
                <label class="font-weight-medium text-muted" for="task_{{ $listing->id}}_{{ $task->id }}_{{ $user->id }}">
                    {{ $user->{'name_'.app()->getLocale()} }}
                </label>
            </div>
        



    @empty
    @endforelse
    @endif
</div>
</div>

<div class="row">

    <div class="col-md-12">
        <label class="font-weight-medium text-muted"> @lang('sales.note') : </label>

        <p>{!! $task->notes->last() ? $task->notes->last()->{'notes_'.app()->getLocale()} :'' !!}</p>



    </div>
</div>
