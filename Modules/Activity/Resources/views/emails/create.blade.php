
<h4 >@lang('activity.emails_list.new_email') </h4>
<input type="hidden" id="getLocale" value="{{app()->getLocale()}}"/>
<form  action="{{route('activity.emails.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="agency_id" value="{{Request::segment(3)}}"/>

        <div class="col-md-2"></div>
        <div class="col-md-8 ">

            <a href="#" class="p-1" onclick="show_bcc_div()"><u>@lang('activity.emails_list.bcc')</u></a>
            <a href="#" class="p-1" onclick="show_email_address_div()"><u>@lang('activity.emails_list.email_addresses')</u></a>
            {{--<input class="p-1" name="attach_file" id="attach_file" type="file" />@lang('activity.emails_list.attach_file')--}}


            <label for="attach_file">
                <input class="p-1" onchange="get_attach_file()" name="attach_file" id="attach_file" type="file" style="display: none;" />
                <i data-feather="paperclip" class="icon-dual"></i>@lang('activity.emails_list.attach_file')
                <span id="attach_file_name"></span>
            </label>

            {{--<a href="#" class="p-1"><i data-feather="paperclip" class="icon-dual"></i>@lang('activity.emails_list.attach_file')</a>--}}

        </div>

        <div class="col-md-6 col-lg-10">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.contacts')</label>
                <div class="d-flex">
                    <div class="pr-1" style="flex:4">
                        <select class="form-control select2" data-toggle="contacts" id="contacts" name="contacts[]" multiple required>
                            <option  disabled> @lang('global.pleaseSelect')</option>
                            @if($contacts)
                                @foreach($contacts as $contact)
                                    <option value="{{$contact->{'name_'.app()->getLocale()} }}" {{ in_array($contact->{'name_'.app()->getLocale()}, old('contact', [])) ? 'selected' : '' }} >{{$contact->{'name_'.app()->getLocale()} }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="" style="flex:2">
                        <select class="form-control select2" data-toggle="select2" id="mail_list" name="mail_list" onchange="get_contact_form_mail_list()" >
                            <option selected disabled>@lang('activity.emails_list.select_mailing_list')</option>
                            @if($mail_lists)
                                @foreach($mail_lists as $mail_list)
                                    <option value="{{$mail_list->id }}" {{ old('mail_list','') == $mail_list->id ? 'selected' : '' }}>{{$mail_list->{'name_'.app()->getLocale()} }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-10" id="div_bcc" style="display:none">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.bcc')</label>
                <input type="text" class="form-control" id="bcc" name="bcc" value="{{ old('bcc') }}" placeholder="@lang('activity.emails_list.multi_email_placeholder')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.emails_list.bcc')"/>

            </div>
        </div>

        <div class="col-lg-10" id="div_email_address" style="display:none">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.email_addresses')</label>
                <input type="text" class="form-control" id="email_address" name="email_address" value="{{ old('email_address') }}" placeholder="@lang('activity.emails_list.multi_email_placeholder')" class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.emails_list.email_addresses')" />

            </div>
        </div>

        <div class="col-lg-10">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.subject')</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="@lang('activity.emails_list.subject_placeholder')" class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.emails_list.subject')" />

            </div>
        </div>

        <div class="col-lg-10">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.email_content')</label>
                <textarea rows="10" readonly required id="email_content" name="email_content" data-toggle="modal" data-target="#email_content_modal" class="form-control" > {!! old('email_content') !!}  </textarea>

            </div>
        </div>
        @include('activity::emails.email_content_add')



    </div>
    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2" id="submit">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
        </button>
    </div>
</form>



@push('js')

<script>

    let editor;
    $(document).ready(function(){

        var getLocale = document.getElementById('getLocale').value;
        var mail_list = document.getElementById('mail_list').value;

        if (mail_list){
            get_contact_form_mail_list();
        }

        ClassicEditor
            .create( document.querySelector( '#email_content_modal_textarea' ))

            .then( newEditor => {
                // newEditor.ui.view.editable.element.style.height = '500px';
                editor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );

        // ClassicEditor.replace(document.querySelector( '#email_content_modal_textarea' ) , {
        //     width:200,
        //     height:800,
        // });
        // Assuming there is a <button id="submit">Submit</button> in your application.
        document.querySelector( '#btn_email_content_modal_textarea' ).addEventListener( 'click', () => {
            const editorData = editor.getData();

            var email_content = document.getElementById('email_content');
            email_content.value = editorData;

            // email_content.innerHTML = editorData;
            console.log(editorData);
            $('#email_content_modal').modal('toggle')
            // ...
        } );

    });

    function get_contact_form_mail_list()
    {
            // var getLocale = document.getElementById('getLocale').value;
            var mail_lists = @json($mail_lists);
            var mail_list  = document.getElementById('mail_list').value;
            var innerHtmlcontacts = '';

            mail_lists.filter(function(value,key){
                if (value.id == mail_list) {

                    value.contacts.filter(function(contact_value,contact_key){

                        var name = contact_value.name_en;

                        if(getLocale == 'ar'){

                            var name = contact_value.name_ar;
                        }
                        innerHtmlcontacts += `<option value='${name}' selected >   ${name}  </option>`;

                    });
                }
            });

            document.getElementById('contacts').innerHTML += innerHtmlcontacts;

    }

    function show_bcc_div()
    {
        var div_bcc = document.getElementById('div_bcc');

        if (div_bcc.style.display === 'none')
        {

            div_bcc.style.display = 'block';

        }else{

            document.getElementById('bcc').value = '';
            div_bcc.style.display = 'none';

        }

    }

    function show_email_address_div()
    {
        var div_email_address = document.getElementById('div_email_address');

        if (div_email_address.style.display === 'none')
        {

            div_email_address.style.display = 'block';

        }else{

            document.getElementById('email_address').value = '';
            div_email_address.style.display = 'none';

        }

    }

    function get_attach_file()
    {
        var attach_file = document.getElementById('attach_file').value;
        var attach_file_name = document.getElementById('attach_file_name');
        attach_file_name.innerHTML = attach_file;
    }



</script>
@endpush