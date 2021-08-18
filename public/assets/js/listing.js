
  function load_edit(agency,temporary_photo,temporary_plans,temporary_document,path_plan,path_photo,path_document,listing,listing_data,agency_region,route,token){

           
    var region = agency_region;
    $('.lds-ring-row-'+listing).removeClass('d-none')
    $('.load_edit_listing_'+listing).removeClass('d-none')
    $('.close-edit-'+listing).removeClass('d-none')
    $('.load-edit-'+listing).addClass('d-none')
    $.ajax({
        url:route,
        method : "POST",
        data : {
            _token : token,
            listing : listing,
        },
   
        success : function(data){
    
            $('.load_edit_listing_show_'+listing).append(data)

            $('.load_edit_listing_show_'+ listing +' .select2').select2();
                $('#photos-modal_'+listing).modal({
                show: false,
                backdrop: 'static'
                })

                edit_autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input_'+listing)), {
                    types: ["establishment"],
                    });
                    edit_autocompletelocation_input.setComponentRestrictions({
                    country: [region],
                });

                google.maps.event.addListener(edit_autocompletelocation_input, 'place_changed', function () {
                        var place = edit_autocompletelocation_input.getPlace();
                                $('#latitude_'+listing).val(place.geometry.location.lat());
                                $('#longitude_'+listing).val(place.geometry.location.lng());
                
                

                    });


                    var editMap = new google.maps.Map(document.getElementById('map_'+listing), {
                            center: {lat: listing_data.loc_lat ? parseInt(listing_data.loc_lat) : 30.0444 , lng:  listing_data.loc_lng ? parseInt(listing_data.loc_lng ) : 31.2357  },
                            zoom: 12,
                            
                            mapTypeId: 'roadmap'
                        }); 

                        var geocoder = new google.maps.Geocoder();
                        google.maps.event.addListener(editMap, 'click', function(event) {
                            SelectedLatLng = event.latLng;
                            geocoder.geocode({
                                'latLng': event.latLng
                            }, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        deleteMarkers();
                                        addMarkerRunTime(event.latLng);
                                        SelectedLocation = results[0].formatted_address;
                                        console.log( results[0].formatted_address);
                                        editSplitLatLng(String(event.latLng),listing);
                                        $("#location_input_"+listing).val(results[0].formatted_address);
                                    }
                                }
                            });
                        });


                        function addMarkerRunTime(location) {
                            var marker = new google.maps.Marker({
                                position: location,
                                map: editMap
                            });
                            markers.push(marker);
                        }


        
                    function setMapOnAll(map) {
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(map);
                        }
                    }
                    function clearMarkers() {
                        setMapOnAll(null);
                    }
                    function deleteMarkers() {
                        clearMarkers();
                        markers = [];
                    }
                
                    var markers = [];

                    ClassicEditor
                    .create(document.querySelector('#edit_description_en_' + listing))
                    .then(
                        newEditor => {
                            editor_en   = newEditor;
                        }
                    )
                    .catch(error => {

                    });

                    ClassicEditor
                        .create(document.querySelector('#edit_description_ar_' + listing), {
                            language: 'ar'
                        })
                        .then(
                            newEditor => {
                                editor_ar = newEditor;
                        }
                        )
                        .catch(error => {

                        });


                        var listing_id = listing;

                    $('#drag-and-drop-zone-'+listing_id).dmUploader({ 

                        url: temporary_photo,
                        extraData: {
                        "agency": agency
                        },
                        headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        maxFileSize: 3000000, 
                        allowedTypes: 'image/*',
                        extFilter: ["jpg", "jpeg","png","gif"],
                        onNewFile: function(id, file){

                        edit_ui_multi_add_file(id, file,listing_id);

                            if (typeof FileReader !== "undefined"){
                                var reader = new FileReader();
                                var img = $('#uploaderFile' + id+' .with-watermark').find('img');
                                
                                reader.onload = function (e) {
                                img.attr('src', e.target.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        },
                            onBeforeUpload: function(id){
                            
                                edit_ui_multi_update_file_progress(id, 0, '', true,listing_id);
                                edit_ui_multi_update_file_status(id, 'uploading', 'Uploading...',listing_id);
                            },

                            onUploadSuccess: function(id, data){
                              
                                edit_ui_multi_update_file_status(id, 'success', 'Upload Complete',listing_id);
                                edit_ui_multi_update_file_progress(id, 100, 'success', false,listing_id);

                                var img = $('#uploaderFile' + id+' .with-watermark').find('img');
                                var link = $('#uploaderFile' + id+' .with-enlarg-watermark').find('a');
                                var path = path_photo+'/'+ data.photo.folder+'/'+ data.photo.watermark
                                img.attr('src',path);
                                link.attr('href',path);
                                $('#uploaderFile' + id).find('.watermark').attr('id','watermark-uploaderFile' + id)
                                var img = $('#uploaderFile' + id +' .no-watermark').find('img');
                                var link = $('#uploaderFile' + id+' .no-enlarg-watermark').find('a');
                                var path = path_photo+'/'+ data.photo.folder+'/'+ data.photo.main

                                link.attr('href',path);
                                img.attr('src',path);
                                $('#uploaderFile' + id + ' .listing_photos').val(data.photo.folder);

                                
                                $('#uploaderFile' + id).find('.remove-photo').attr('id','remove-uploaderFile' + id)
                                $('#uploaderFile' + id).find('.photo-id').val( data.photo.id)
                                $('#uploaderFile' + id).find('.checked_main').attr('id','checked-main-uploaderFile' + id)
                                $('#uploaderFile' + id).find('.checked_main_hidden').attr('id','checked-main-uploaderFile' + id+'-hidden')
                                
                                $('#uploaderFile' + id).find('.listing-category-'+listing_id).attr('id','listing-category-' + id)

                            },
                            onUploadError: function(id, xhr, status, message){
                                console.log('error')
                                edit_ui_multi_update_file_status(id, 'danger', message,listing_id);
                                edit_ui_multi_update_file_progress(id, 0, 'danger', false,listing_id);  
                            },

                        });



                      $('#plan-drag-and-drop-zone-'+listing_id).dmUploader({ 
                            url: temporary_plans,
                            extraData: {
                            "agency": agency
                            },
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            maxFileSize: 3000000, 
                            allowedTypes: 'image/*',
                            extFilter: ["jpg", "jpeg","png","gif",'pdf','txt'],
                            onNewFile: function(id, file){
                                edit_plan_ui_multi_add_file(id, file,listing_id);

                                if (typeof FileReader !== "undefined"){
                                    var reader = new FileReader();
                                    var img = $('#planUploaderFile' + id+' .plan-with-watermark').find('img');
                                    
                                    reader.onload = function (e) {
                                    img.attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                            },
                            onBeforeUpload: function(id){
                                edit_plan_ui_multi_update_file_progress(id, 0, '', true,listing_id);
                                edit_plan_ui_multi_update_file_status(id, 'uploading', 'Uploading...',listing_id);
                            },

                            onUploadSuccess: function(id, data){

                                edit_plan_ui_multi_update_file_status(id, 'success', 'Upload Complete',listing_id);
                                edit_plan_ui_multi_update_file_progress(id, 100, 'success', false,listing_id);


                                $('#planUploaderFile' + id).find('.rename').attr('id',data.plan.id)
                                $('#planUploaderFile' + id).find('.rename_value').attr('id','rename_'+data.plan.id)
                                $('#planUploaderFile' + id).find('.save-title-success').attr('id','save_success_'+data.plan.id)
                                $('#planUploaderFile' + id).find('.title').attr('id','title_'+data.plan.id)

                                var img = $('#planUploaderFile' + id+' .plan-with-watermark').find('img');
                                var link = $('#planUploaderFile' + id+' .plan-with-enlarg-watermark').find('a');
                                var path = path_plan+'/'+data.plan.folder +'/'+data.plan.watermark
                                img.attr('src',path);
                                link.attr('href',path);
                                $('#planUploaderFile' + id).find('.plan-watermark').attr('id','watermark-planUploaderFile' + id)
                                var img = $('#planUploaderFile' + id +' .plan-no-watermark').find('img');
                                var link = $('#planUploaderFile' + id+' .plan-no-enlarg-watermark').find('a');
                                var path = path_plan+'/'+data.plan.folder +'/'+ data.plan.main

                                link.attr('href',path);
                                img.attr('src',path);
                                $('#planUploaderFile' + id + ' .listing_plans').val(data.plan.folder);


                                $('#planUploaderFile' + id).find('.remove-plan').attr('id','remove-planUploaderFile' + id)
                                $('#planUploaderFile' + id).find('.plan-id').val( data.plan.id)

                            },
                            onUploadError: function(id, xhr, status, message){
                                edit_plan_ui_multi_update_file_status(id, 'danger', message,listing_id);
                                edit_plan_ui_multi_update_file_progress(id, 0, 'danger', false,listing_id);  
                            }




                            });



                            $('#document-drag-and-drop-zone-'+listing_id).dmUploader({ 
                                url: temporary_document,
                                extraData: {
                                "agency": agency
                                },
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                maxFileSize: 3000000, 
                                allowedTypes: 'image/*',
                                extFilter: ["jpg", "jpeg","png","gif",'pdf','txt'],
                                onNewFile: function(id, file){
                                edit_document_ui_multi_add_file(id, file,listing_id);

                                if (typeof FileReader !== "undefined"){
                                    var reader = new FileReader();

                                    reader.readAsDataURL(file);
                                }
                                },
                                onBeforeUpload: function(id){
                                edit_document_ui_multi_update_file_progress(id, 0, '', true,listing_id);
                                edit_document_ui_multi_update_file_status(id, 'uploading', 'Uploading...',listing_id);
                                },

                                onUploadSuccess: function(id, data){

                                edit_document_ui_multi_update_file_status(id, 'success', 'Upload Complete',listing_id);
                                edit_document_ui_multi_update_file_progress(id, 100, 'success', false,listing_id);


                                var path = path_document+'/'+ data.document.document

                                $('#documentUploaderFile' + id + ' .listing_documents').val(data.document.folder);
                                $('#documentUploaderFile' + id).find('.document_rename').attr('id',data.document.id)
                                $('#documentUploaderFile' + id).find('.document_rename_value').attr('id','rename_'+data.document.id)
                                $('#documentUploaderFile' + id).find('.save-title-success').attr('id','save_success_'+data.document.id)
                                $('#documentUploaderFile' + id).find('.title').attr('id','title_'+data.document.id)

                                $('#documentUploaderFile' + id).find('.remove-document').attr('id','remove-documentUploaderFile' + id)
                                $('#documentUploaderFile' + id).find('.document-id').val( data.document.id)

                                },
                                onUploadError: function(id, xhr, status, message){
                                    edit_document_ui_multi_update_file_status(id, 'danger', message,listing_id);
                                    edit_document_ui_multi_update_file_progress(id, 0, 'danger', false,listing_id);  
                                }

                                });


                        $('.lds-ring-row-'+listing).addClass('d-none')
                    

        },
        error : function (error) {
            $('.lds-ring-row-'+listing).addClass('d-none')
             $('.load_edit_listing_'+listing).addClass('d-none')
             $('.close-edit-'+listing).addClass('d-none')
             $('.load-edit-'+listing).removeClass('d-none')
        }

    });
    }


    function close_edit(listing){
        $('#edit-staff-form-'+listing).remove();
        $('.load_edit_listing_'+listing).addClass('d-none')
        $('.close-edit-'+listing).addClass('d-none')
        $('.load-edit-'+listing).removeClass('d-none')

        
    }




function show_duplicate_div(){
   if( $('.duplicate-listing').hasClass('d-none')){
    $('.duplicate-listing').removeClass('d-none')
    }else{
        $('.duplicate-listing').addClass('d-none')
    }
    
}


function generate_duplicate_link(url){
  var ref = $('.duplicate-listing-select').val()

  $('.duplicate-link').attr('href',url+'?ref='+ref)
}




function getCommunitites(type,id,locale,route,token){

    var city_id ='';
    if(type == "create"){
        city_id = $('.city-in-create').val();

    }else{
        city_id = $('.city-in-edit-'+id).val();

    }



        $.ajax({
        url:route,
        type:'POST',
        data:{
            _token: token,
            city_id    : city_id,
        },
        success: function(data){

            var option = '';
            var locale = locale;
            data.communities.forEach(function(value,key){
                if(type == 'create'){
                    option += '<option value="'+value.id+'" class="create-appended-communities">';
                } else{
                    option += '<option value="'+value.id+'" class="edit-appended-communities-'+id+'">';
                }


                    if(locale == 'en'){

                        option += value.name_en;
                    } else{
                        option += value.name_ar;
                    }
                option += '</option>';

            });


            if(type == "create"){
                $('.create-appended-communities').remove();
                $('.create-appended-sub-communities').remove();
                $('.community-in-create').append(option)


            }else{
                $('.edit-appended-communities-'+id).remove();
                $('.edit-appended-sub-communities-'+id).remove();
                $('.community-in-edit-'+id).append(option)

            }




        },
        error: function(error){

        },
        })


}

function getSubCommunities(type,id,locale,route,token){
    var community_id ='';
    if(type == "create"){
     community_id = $('.community-in-create').val();

    }else{
        community_id = $('.community-in-edit-'+id).val();
    }


    $.ajax({
    url:route,
    type:'POST',
    data:{
        _token: token,
        community_id    : community_id,
    },
    success: function(data){

        var option = '';
        var locale = locale;

        data.sub_communities.forEach(function(value,key){
            if(type == 'create'){
                   option += '<option value="'+value.id+'" class="create-appended-sub-communities">';
                } else{
                    option += '<option value="'+value.id+'" class="edit-appended-sub-communities-'+id+'">';
                }

                if(locale == 'en'){

                    option += value.name_en;
                } else{
                    option += value.name_ar;
                }
            option += '</option>';

        })


        if(type == "create"){
            $('.create-appended-sub-communities').remove();
            $('.sub-community-in-create').append(option)

        }else{
            $('.edit-appended-sub-communities-'+id).remove();
            $('.sub-community-in-edit-'+id).append(option)
        }





    },
    error: function(error){

    },
    })



}

