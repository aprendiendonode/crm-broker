<div id="description-modal" class="modal fade description-profile-modal" tabindex="-1" role="dialog" aria-labelledby="extraInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                            <i class="fas fa-info-circle text-primary fa-2x"></i>
                            <h4>
                                @lang('listing.add_description')
                            </h4>
                    </div>
                <div>
                    <div class="d-flex justify-content-between">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.description')
                        </label>

                        <input  data-plugin="tippy" data-tippy-placement="top-start" onchange="toggle_desc()" class="description" type="checkbox"
                        checked data-toggle="toggle" data-on="Ar" data-off="EN"
                        data-onstyle="primary"
                        data-offstyle="success">
        
                    </div>
                    <div class="">
                            <div class="description_en">
                                <textarea 
                                id="description_en"
                                    class="form-control textarea-en"
                                    style="min-height: 334px;"
                                    row="6" col="6" name="description_en">{{old('description_en')}}</textarea>
                            </div>    
                            <div class="description_ar d-none">
                                <textarea 
                                id="description_ar"
                                    class="form-control textarea-ar"
                                    style="min-height: 334px;direction:rtl"
                                    row="6" col="6"  name="description_ar">{{old('description_ar')}}</textarea>
                            </div>
                            <div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 en-button ">
                            <button onclick="event.preventDefault();showCompanyProfile(this,'en')" data-agencyprofile="{{ $agency_data->description_en }}" class="btn p-0 agency-profile-en">@lang('listing.company_profile')</button>
                            <p class="agency-profile-message-en text-danger"></p>

                        </div>
                        <div class="col-3 ar-button d-none ">
                            <button onclick="event.preventDefault();showCompanyProfile(this,'ar')" data-agencyprofile="{{ $agency_data->description_ar }}" class="btn p-0 agency-profile-ar">@lang('listing.company_profile')</button>
                            <p class="agency-profile-message-ar text-danger"></p>

                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0 agent-profile-en">
                                    <select
                                    onchange="event.preventDefault();showAgentProfile(this,'en')"
                                     style="width:100px" class="form-control select2" data-toggle="select2" data-placeholder="@lang('listing.agent_profile')">
                                        <option value=""></option>
                                        @foreach($staffs as $staff )
                                            <option
                                              data-agentprofile="{{ $staff->description_en }}"
                                              value="{{ $staff->id }}">{{ $staff->{'name_'.app()->getLocale()} }}
                                            </option>
                                       @endforeach     
                                    </select>
                                    <p class="agent-profile-message-en text-danger"></p>
                            </div>
                            <div class="form-group mb-0 d-none agent-profile-ar">
                                    <select
                                    onchange="event.preventDefault();showAgentProfile(this,'ar')"
                                     style="width:100px" class="form-control select2" data-toggle="select2" data-placeholder="@lang('listing.agent_profile')">
                                        <option value=""></option>
                                        @foreach($staffs as $staff )
                                            <option 
                                               value="{{ $staff->id }}"
                                               data-agentprofile="{{ $staff->description_ar }}">{{ $staff->{'name_'.app()->getLocale()} }}
                                            </option>
                                       @endforeach     
                                    </select>

                                    <p class="agent-profile-message-ar text-danger"></p>
                            </div>
                        </div>



                        <div class="col-3 features_copy_en">
                            <button onclick="event.preventDefault();loadCheckedFeatures('en')" data-checkedfeatures="" class="btn p-0 listing-checked-filters">@lang('listing.copy_features')</button>
                            <p class="features_copy_message_en text-danger"></p>

                        </div>
                        <div class="col-3 d-none features_copy_ar">
                            <button onclick="event.preventDefault();loadCheckedFeatures('ar')" data-checkedfeatures="" class="btn p-0 listing-checked-filters">@lang('listing.copy_features')</button>
                            <p class="features_copy_message_ar text-danger"></p>

                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0 templates-en">
                                <select 
                                onchange="event.preventDefault();showTemplates('en')"
                                style="width:100px" class="form-control select2 load-templates-en"  data-toggle="select2" data-placeholder="@lang('listing.select_template')">
                                         <option value=""></option>
                                   
                                         <optgroup label="@lang('listing.english')">
                                            @foreach($descriptionTemplates->where('description_en' ,'!=' ,null) as $desc )
                                            <option value="" data-desctemplate="{{ $desc->description_en }}">{{ $desc->title }}</option>
                                           @endforeach
                                         </optgroup>
                                   
                                </select>
                            </div>
                            <div class="form-group mb-0 d-none templates-ar">
                                <select 
                                onchange="event.preventDefault();showTemplates('ar')"
                                style="width:100px" class="form-control select2 load-templates-ar"  data-toggle="select2" data-placeholder="@lang('listing.select_template')">
                                         <option value=""></option>
                                   
                                         <optgroup  label="@lang('listing.arabic')">
                                            @foreach($descriptionTemplates->where('description_ar' ,'!=' ,null) as $desc )
                                            <option value="" data-desctemplate="{{ $desc->description_ar }}">{{ $desc->title }}</option>
                                           @endforeach
                                         </optgroup>
                                   
                                </select>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">@lang('listing.done')</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>

        function showCompanyProfile(inputSelf,type){
          
                if(type == 'ar'){

                    if( $('.agency-profile-ar').data('agencyprofile') === ''){
                    var message = @json(trans('listing.no_arabic_profile_for_agency'));
                    $('.agency-profile-message-ar').text(message)
                    return;
                    }
                 
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_ar .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agency-profile-ar').data('agencyprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);
                }else{
                    if( $('.agency-profile-en').data('agencyprofile') === ''){
                    var message = @json(trans('listing.no_english_profile_for_agency'));
                    $('.agency-profile-message-en').text(message)
                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_en .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agency-profile-en').data('agencyprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition); 
                }

        }

        function showAgentProfile(inputSelf,type){


            if(type == 'ar'){
                if($('.agent-profile-ar').find(':selected').data('agentprofile') == ''){
                    var message = @json(trans('listing.no_arabic_profile_for_agent'));
                    $('.agent-profile-message-ar').text(message)
                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_ar .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agent-profile-ar').find(':selected').data('agentprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);
                }else{
                    // typeof car.color === 'undefined'
                       if($('.agent-profile-en').find(':selected').data('agentprofile') == ''){
                            var message = @json(trans('listing.no_english_profile_for_agent'));
                            $('.agent-profile-message-en').text(message)
                            return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_en .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.agent-profile-en').find(':selected').data('agentprofile'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition); 
                }
        }


    
        function loadCheckedFeatures(type){



            var  checkboxesFeature = $('.choosen-features:checkbox:checked ').map(function() {
                var name = this.name.replace('"',"");
                name = name .replace('features',"");
                name = name .replace("[","");
                name = name .replace("]","");
                name = name .replace(/_/g," ");

                const words = name.split(" ");

                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                }

                  name = words.join(" ");

                return name;
            }).get();
           var  inputsFeature = $('.choosen-features-inputs').map(function() {

                        if(this.value != ''){

                            var name = this.name.replace('"',"");
                            name = name .replace('features',"");
                            name = name .replace("[","");
                            name = name .replace("]","");
                            name = name .replace(/_/g," ");

                            const words = name.split(" ");

                            for (let i = 0; i < words.length; i++) {
                                words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                            }

                            name = words.join(" ");


                            return name+' ( '+ this.value +')';
                        }

                }).get();

           var  selectsFeature = $('.choosen-features-select').map(function() {
            if(this.value != ''){
                var name = this.name.replace('"',"");
                name = name .replace('features',"");
                name = name .replace("[","");
                name = name .replace("]","");
                name = name .replace(/_/g," ");

                const words = name.split(" ");

                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                }

                  name = words.join(" ");

                return name+' ( '+ this.value +')';
            }


              }).get();

             var merged =  inputsFeature.concat(checkboxesFeature);
             var all =  merged.concat(selectsFeature);
              console.log(all)
              if(all.length > 0){

                  var ul_html = '';
                  ul_html+= '<ul>';
                        for (let index = 0; index < all.length; index++) {

                            ul_html += '<li>' + all[index]+'</li>';

                        }

                  ul_html+= '</ul>';

                    const domEditableElement = document.querySelector( '.description-profile-modal .description_'+type+' .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView(ul_html);
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);
              }else {

                            var message = @json(trans('listing.choose_features_to_copy'));
                            $('.features_copy_message_'+type).text(message)
                            return;

              }
        }


        function showTemplates(type){
            if(type == 'ar'){
                if($('.load-templates-ar').find(':selected').data('desctemplate') == ''){
              
                    return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_ar .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.load-templates-ar').find(':selected').data('desctemplate'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition);
                }else{
                    // typeof car.color === 'undefined'
                       if($('.load-templates-en').find(':selected').data('desctemplate') == ''){
                          
                            return;
                    }
                    const domEditableElement = document.querySelector( '.description-profile-modal .description_en .ck-editor__editable' );
                    const editorInstance = domEditableElement.ckeditorInstance;
                    const htmlDP = editorInstance.data.processor;
                    const viewFragment = htmlDP.toView($('.load-templates-en').find(':selected').data('desctemplate'));
                    const modelFragment = editorInstance.data.toModel( viewFragment );
                    const insertPosition = editorInstance.model.document.selection.getFirstPosition();
                    editorInstance.model.insertContent(modelFragment, insertPosition); 
                }


        }

    </script>
@endpush