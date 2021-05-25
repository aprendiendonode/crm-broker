<!-- Info Alert Modal -->
<div id="show_email-modal_{{$email->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body p-2 ">
                <div class="text-center">
                    <i class="fas fa-plus-square"></i>
                    <h4 class="mt-1 mb-3">@lang('activity.emails_list.email_content')</h4>
                    <hr>

                    <div class="row">

                        <div class="col-2 {{ app()->getLocale() == 'ar' ? 'text-md-right' : 'text-md-left' }} " >
                            {{__('activity.emails_list.recipient')}} :
                        </div>
                        <div class="col-9">
                            <input class="form-control" type="text" readonly value="{{$email->contacts ?? ''}}"/>

                        </div>

                        <div class="col-2 {{ app()->getLocale() == 'ar' ? 'text-md-right' : 'text-md-left' }} " >
                            {{__('activity.emails_list.bcc')}} :
                        </div>
                        <div class="col-9">
                            <input class="form-control" type="text" readonly value="{{$email->BCC ?? ''}}"/>
                        </div>

                        <div class="col-2 {{ app()->getLocale() == 'ar' ? 'text-md-right' : 'text-md-left' }} " >
                            {{__('activity.emails_list.subject')}} :
                        </div>
                        <div class="col-9">
                            <input class="form-control" type="text" readonly value="{{$email->subject ?? ''}}"/>

                        </div>

                        <div class="col-2 {{ app()->getLocale() == 'ar' ? 'text-md-right' : 'text-md-left' }} " >
                            {{__('activity.emails_list.email_content')}} :
                        </div>
                        <div class="col-9">
                            <div class="form">

                                <div class="form-group custom-toggle">

                                    <div class="email_content_modal">

                                        <textarea readonly id="show_email_content_modal_textarea_{{$email->id}}"  >{!! $email->email_content !!}</textarea>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
