
<!-- Info Alert Modal -->
<div id="email_content_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    {{--<div class="modal-dialog modal-full-width ">--}}
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body p-4">
                <div class="text-center">
                    <i data-feather="mail" class="icon-dual"></i>
                    <h4 class="mt-2">@lang('activity.emails_list.email_content')</h4>
                        <div class="form">

                            <div class="form-group custom-toggle">

                                <div class="email_content_modal">

                                    <textarea id="email_content_modal_textarea"  >{!! old('email_content') !!}</textarea>
                                </div>

                            </div>
                            <div class="d-flex align-items-center">

                                <div class=""  style="flex:1">
                                    <a href="#" onclick="get_contact_first_name()"><i class="fe-plus-circle"></i> Contact First Name</a>
                                </div>

                                <div class=""  style="flex:1">
                                    <a href="#" onclick="get_company_profile()"><i class="fe-plus-circle"></i> Company Profile</a>
                                </div>

                                <div class="" style="flex:1">
                                    <a href="#" onclick="get_my_profile()" ><i class="fe-plus-circle"></i> My Profile</a>
                                </div>

                                <div class="" style="flex:1">
                                    <input type="hidden" id="templates" value="{{$templates}}"/>
                                    <select class="selectpicker mb-0 show-tick  {{ $errors->has('template') ? 'is-invalid' : '' }}"   name="template" class="d-none " id="template" onchange="get_template()">

                                        <option value disabled {{ old('template', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>

                                        @foreach($templates as  $template)
                                            <option value="{{ $template->id }}" {{ old('template') == $template->id  ? 'selected' : '' }}>
                                                {{  $template->title ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">

                            <button type="button" id="btn_email_content_modal_textarea" class="btn btn-lg btn-success waves-effect waves-light m-1">@lang('agency.submit')</button>
                            <button type="button" class="btn btn-lg btn-outline-danger waves-effect waves-light m-1" data-dismiss="modal">@lang('agency.cancel')</button>
                        </div>
                </div>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@push('js')
    <script>

        function get_template ()
        {

            var template = document.getElementById('template').value;

            var  templates = @json($templates);

            templates.filter(function(value,key){
                if (value.id == template) {


                    var description = value.description_en;

                    if(getLocale == 'ar'){

                        var description = value.description_ar;
                    }
                    // var curPos = document.getElementById("email_content_modal_textarea").selectionStart;

                    var editorGetData = editor.getData();
                    editorGetData += description;
                    let email_content_modal_textarea_value = editor.setData(editorGetData);
                    var editorGetData2 = editor.getData();
                    // let email_content_modal_textarea_value = $('#email_content_modal_textarea').val(); // will get the value of the text area
                    // let email_content_modal_textarea_value =  ClassicEditor.instances['email_content_modal_textarea'].setData(description); // will get the value of the text area

                    // let description=$(‘#insert’).val(); // will get the value of the input box
                    // $('#email_content_modal_textarea').val(description) ;
                    // $('#email_content_modal_textarea').val(email_content_modal_textarea_value.slice(0, curPos)+description+email_content_modal_textarea_value.slice(curPos));// setting the updated value in the text area
                    console.log(description,editorGetData,editorGetData2);
                    // innerHtmlcontacts += `<option value='${name}' selected >   ${name}  </option>`;
                }
            });
        }

        function get_contact_first_name()
        {
            var x = '@get_contact_first_name';
            var editorGetData = editor.getData();
            editorGetData += x;
            let email_content_modal_textarea_value = editor.setData(editorGetData);

        }

        function get_company_profile()
        {
            var x = '@get_company_profile';
            var editorGetData = editor.getData();
            editorGetData += x;
            let email_content_modal_textarea_value = editor.setData(editorGetData);

        }

        function get_my_profile()
        {
            var x = '@get_my_profile';
            var editorGetData = editor.getData();
            editorGetData += x;
            let email_content_modal_textarea_value = editor.setData(editorGetData);

        }
    </script>

    @endpush