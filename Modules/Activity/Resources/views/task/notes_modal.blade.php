<!-- Info Alert Modal -->
<div id="show_notes_modal_{{ $task->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body p-4">
                <div class="text-center">
                    <i data-feather="file-text" class="icon-dual"></i>
                    <h4 class="mt-2">@lang('activity.tasks.task_note') ({{$task->id}})</h4>
                    <div class="form-group custom-toggle">
                        <div class="d-flex justify-content-between">
                            <h4 class="mt-3">@lang('activity.notes_list.add_new_note')</h4>
                        </div>
                    </div>
                    <form action="{{ route('activity.tasks.add_note') }}" method="post">

                        @csrf
                        <input type="hidden" name="task_id" value="{{$task->id}}"/>
                        <div class="form">

                            <div class="form-group custom-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="mb-1 font-weight-medium text-muted" for="add_new_note_en">@lang('activity.tasks.note')</label>

                                    <input onchange="toggle_add_new_note('{{ $task->id }}')" class="add_new_note_{{$task->id}}" type="checkbox"
                                           checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                                           data-offstyle="success">

                                </div>

                                <div class="add_new_note_en_{{$task->id}}">

                                    <textarea id="add_new_note_en_{{$task->id}}" name="add_new_note_en_{{$task->id}}" >{{old('add_new_note_en_'.$task->id)}}</textarea>
                                </div>
                                <div class="add_new_note_ar_{{$task->id}} d-none">


                                    <textarea id="add_new_note_ar_{{$task->id}}"  name="add_new_note_ar_{{$task->id}}" >{{old('add_new_note_ar_'.$task->id)}}</textarea>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-end">

                            <button type="submit" class="btn btn-lg btn-success waves-effect waves-light m-1">@lang('agency.submit')</button>
                            <button type="button" class="btn btn-lg btn-outline-danger waves-effect waves-light m-1" data-dismiss="modal">@lang('agency.cancel')</button>
                        </div>
                    </form>
                </div>


                <h4 class="pt-3">
                    @lang('activity.notes_list.list')
                </h4>
                <hr>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h4 >#</h4>
                        </div>

                        <div class="col-3">
                            <h4 >@lang('activity.tasks.add_by')</h4>
                        </div>

                        <div class="col-3">
                            <h4 >@lang('activity.tasks.date_add')</h4>
                        </div>
                        <div class="col-3">
                            <h4 >@lang('activity.tasks.note')</h4>
                        </div>
                    </div>

                    @forelse($task->notes()->orderBy('id','desc')->get() as $note)
                        <div class="row">
                            <div class="col-3">
                                <h5 > {{$note->id ?? ''}}</h5>
                            </div>

                            <div class="col-3">
                                <h5 > {{$note->addBy && $note->addBy->{'name_'.app()->getLocale()} ? $note->addBy->{'name_'.app()->getLocale()} : ''}}</h5>
                            </div>

                            <div class="col-3">
                                <h5 >{{$note->created_at ? date('d-m-Y',strtotime($note->created_at)) :''}}</h5>
                            </div>
                            <div class="col-3">
                                <h5 >{!! $note->{'notes_'.app()->getLocale()} ? $note->{'notes_'.app()->getLocale()} :'' !!} </h5>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-12">

                                <h5 > @lang('global.messages.no_data_in_table')</h5>
                            </div>
                        </div>
                    @endforelse
                </div>


            </div>




        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->