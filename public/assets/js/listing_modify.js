 function updateListingAgent(listing, route, token, agency, business, locale) {

     var agent = $('.listing-agent-' + listing).val()

     if (agent == '') {
         toast('Choose a listing agent', 'error')
         return;
     }

     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             agent: agent
         },
         success: function (data) {

             var name = locale == 'en' ? data.agent.name_en : data.agent.name_ar;
             $('.listing-agent-name-' + listing).text(name)
             $('.listing-agent-table-name-' + listing).text(name)
             $('.listing-agent-email-' + listing).text(data.agent.email)
             $('.listing-agent-phone-' + listing).text(data.agent.phone)
             toast(data.message, 'success')
             $('#agent-modal-' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }



 function updateListingPricing(listing, route, token, agency, business, locale) {

     var price = $('.listing-price-' + listing).val()
     var commission_percent = $('.listing-commission-percent-' + listing).val()
     var commission_value = $('.listing-commission-value-' + listing).val()
     var deposite_percent = $('.listing-deposite-percent-' + listing).val()
     var deposite_value = $('.listing-deposite-value-' + listing).val()
     var rent_frequency = $('.listing-rent-frequency-' + listing).val()
     var cheque = $('.listing-cheque-' + listing).val()

     if (price == '') {
         toast('Price Required', 'error')
         return;
     }

     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             price: price,
             commission_percent: commission_percent,
             commission_value: commission_value,
             deposite_percent: deposite_percent,
             deposite_value: deposite_value,
             rent_frequency: rent_frequency,
             cheque: cheque,
         },
         success: function (data) {
             var cheque_name
             if (cheque != '') {

                 cheque_name = locale == 'en' ? data.cheque.name_en : data.cheque.name_ar;
             } else {
                 cheque_name = '';
             }

             $('.listing-pricing-price-' + listing).text(price)
             $('.listing-pricing-table-price-' + listing).text(price)
             $('.listing-pricing-commission-' + listing).text(commission_value + ' - ' + commission_percent + ' %')
             $('.listing-pricing-deposite-' + listing).text(commission_value + ' - ' + commission_percent + ' %')
             $('.listing-pricing-cheque-' + listing).text(cheque_name)
             $('.listing-pricing-rent-frequency-' + listing).text(rent_frequency)
             toast(data.message, 'success')
             $('#pricing-modal-' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }



 function updateListingLocation(listing, route, token, agency, business, locale) {

     var location = $('.listing-location-' + listing).val()
     var loc_lat = $('.listing-loc-lat-' + listing).val()
     var loc_lng = $('.listing-loc-lng-' + listing).val()
     var city = $('.listing-city-' + listing).val()
     var community = $('.listing-community-' + listing).val()
     var sub_community = $('.listing-sub-community-' + listing).val()
     var unit = $('.listing-unit-' + listing).val()
     var plot = $('.listing-plot-' + listing).val()
     var street = $('.listing-street-' + listing).val()


     if (city == '') {
         toast('City Required', 'error')
         return;
     }

     if (community == '') {
         toast('Community Required', 'error')
         return;
     }

     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             location: location,
             loc_lat: loc_lat,
             loc_lng: loc_lng,
             city: city,
             community: community,
             sub_community: sub_community,
             unit: unit,
             plot: plot,
             street: street,
         },
         success: function (data) {

             var city_name = locale == 'en' ? data.city.name_en : data.city.name_ar;
             var community_name = locale == 'en' ? data.community.name_en : data.community.name_ar;
             console.log(data.sub_community)
             if (data.sub_community != '') {
                 console.log('here')
                 var sub_community_name = locale == 'en' ? data.sub_community.name_en : data.sub_community.name_ar;
                 $('.listing-locations-sub-community-' + listing).text(sub_community_name)
             }

             $('.listing-locations-location-' + listing).text(location)

             // $('.listing-location-table-price-'+listing).text(price)
             $('.listing-locations-city-' + listing).text(city_name)
             $('.listing-locations-community-' + listing).text(community_name)

             $('.listing-locations-unit-' + listing).text(unit)
             $('.listing-locations-plot-' + listing).text(plot)
             $('.listing-locations-street-' + listing).text(street)

             toast(data.message, 'success')
             $('#locations-modal-' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }




 function updateListingExtraInfo(listing, route, token, agency, business, locale) {

     var key_location = $('.listing-key-location-' + listing).val()
     var govfield1 = $('.listing-govfield1-' + listing).val()
     var govfield2 = $('.listing-govfield2-' + listing).val()
     var yearly_service_charges = $('.listing-yearly-service-charges-' + listing).val()
     var monthly_cooling_charges = $('.listing-monthly-cooling-charges-' + listing).val()
     var monthly_cooling_provider = $('.listing-monthly-cooling-provider-' + listing).val()

     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             key_location: key_location,
             govfield1: govfield1,
             govfield2: govfield2,
             yearly_service_charges: yearly_service_charges,
             monthly_cooling_charges: monthly_cooling_charges,
             monthly_cooling_provider: monthly_cooling_provider,

         },
         success: function (data) {

             $('.listing-extra-info-key-location-' + listing).text(key_location)
             $('.listing-extra-info-govfield1-' + listing).text(govfield1)
             $('.listing-extra-info-govfield2-' + listing).text(govfield2)
             $('.listing-extra-info-yearly-service-charges-' + listing).text(yearly_service_charges)
             $('.listing-extra-info-monthly-cooling-charges-' + listing).text(monthly_cooling_charges)
             $('.listing-extra-info-monthly-cooling-provider-' + listing).text(monthly_cooling_provider)

             toast(data.message, 'success')
             $('#extraInfo-modal_' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }





 function updateListingDetails(listing, route, token, agency, business, locale) {

     var purpose = $('.listing-purpose-' + listing).val()
     var status = $('.listing-status-' + listing).val()
     var views = $('.listing-views-' + listing).val()
     console.log(views)
     var lsm = $('.listing-lsm-' + listing).val()
     var title = $('.listing-title-' + listing).val()
     var type = $('.listing-type-' + listing).val()
     var beds = $('.listing-beds-' + listing).val()
     var parkings = $('.listing-parkings-' + listing).val()
     var baths = $('.listing-baths-' + listing).val()
     var year_built = $('.listing-year-built-' + listing).val()
     var plot_area = $('.listing-plot-area-' + listing).val()
     var area = $('.listing-area-' + listing).val()
     var sources = $('.listing-source-' + listing).val()
     var landlord = $('.listing-landlord-' + listing).val()
     var developer = $('.listing-developer-' + listing).val()
     var rented = $('.listing-rented-' + listing).val()
     var never_lived_in = $('.listing-never-lived-in-' + listing).val()
     var featured_on_company_website = $('.listing-featured-on-company-website-' + listing).val()
     var exclusive_rights = $('.listing-exclusive-rights-' + listing).val()
     var tenant_start_date = $('.listing-tenant-start-date-' + listing).val()
     var tenant_end_date = $('.listing-tenant-end-date-' + listing).val()
     var tenant = $('.listing-tenant-' + listing).val()


     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             purpose: purpose,
             status: status,
             lsm: lsm,
             title: title,
             type: type,
             beds: beds,
             parkings: parkings,
             baths: baths,
             year_built: year_built,
             plot_area: plot_area,
             area: area,
             source: sources,
             landlord: landlord,
             developer: developer,
             rented: rented,
             never_lived_in: never_lived_in,
             featured_on_company_website: featured_on_company_website,
             exclusive_rights: exclusive_rights,
             tenant_start_date: tenant_start_date,
             tenant_end_date: tenant_end_date,
             tenant: tenant,
             views : JSON.stringify(views) ,


         },
         success: function (data) {

             $('.listing-details-Purpose-' + listing).text(purpose)
             $('.listing-details-status-' + listing).text(status)
             $('.listing-details-lsm-' + listing).text(lsm)
             $('.listing-details-title-' + listing).text(title)
             $('.listing-details-type-' + listing).text(type)
             $('.listing-details-beds-' + listing).text(beds)
             $('.listing-details-parkings-' + listing).text(parkings)
             $('.listing-details-baths-' + listing).text(baths)
             $('.listing-details-year-built-' + listing).text(year_built)
             $('.listing-details-year-area-' + listing).text(plot_area)
             $('.listing-details-area-' + listing).text(area)
             $('.listing-details-sources-' + listing).text(sources)
             $('.listing-details-landlord-' + listing).text(landlord)
             $('.listing-details-developer-' + listing).text(developer)
             $('.listing-details-rented-' + listing).text(rented)
             $('.listing-details-never-lived-in-' + listing).text(never_lived_in)
             $('.listing-details-featured-on-company-website-' + listing).text(featured_on_company_website)
             $('.listing-details-exclusive-rights-' + listing).text(exclusive_rights)
             $('.listing-details-tenant-start-date-' + listing).text(tenant_start_date)
             $('.listing-details-tenant-start-date-' + listing).text(tenant_end_date)
             $('.listing-details-tenant-' + listing).text(tenant)
             toast(data.message, 'success')
             $('#extraInfo-modal_' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }



 function editShowRentDiv(id) {

     if ($('.rent-radio-' + id + ' option:selected').val() == 'rent') {
         $('#rent_div_' + id)[0].style.display = "block";
         document.getElementById(`rent-sale-label-${id}`).innerHTML = "Rent";
     } else {
         document.getElementById(`rent-sale-label-${id}`).innerHTML = "Sale";
         $('#rent_div_' + id)[0].style.display = "none";
     }
 }

 function editShowSubRentDiv(id) {

     if ($('.sub-rent-checkbox-' + id)[0].checked) {
         $('#sub_rent_div_' + id)[0].style.display = "block";
     } else {
         $('#sub_rent_div_' + id)[0].style.display = "none";
     }

 }

 function editShowFurnishedQuestion(id) {
     question_status = $('.listing_type_' + id).find(':selected').data('furnished');
     if (question_status == 'yes') {
         $('.furnished_question_' + id).removeClass('d-none');
     } else {
         $('.furnished_question_' + id).addClass('d-none');
     }

 }


 function updateListingDescription(listing, route, token, agency, business, locale) {

     
     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             description_en: description_en,
             description_ar: description_ar,


         },
         success: function (data) {

             var description = locale == 'en' ? data.desciption_en : data.desciption_ar

             $('.listing-desc-description-' + listing).text(description)


             toast(data.message, 'success')
             $('#description-modal-' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }

 function updateListingPhotos(listing, route, token, agency, business, locale) {



     if (!handleCloseModal(listing)) {
         toast('please select all categories', 'error');
         return;
     }

     var photos = $('.listing-photos-for-submit-' + listing).map(function () {
         return $(this).val()
     }).get();
     var checked_main_hidden = $('.checked_main_hidden-' + listing).map(function () {
         return $(this).val()
     }).get();

     if (photos.length == 0) {
         toast('No Photos Uploaded', 'error')
         return;
     }



     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             photos: JSON.stringify(photos),
             checked_main_hidden: JSON.stringify(checked_main_hidden)
         },
         success: function (data) {


             toast(data.message, 'success')
             if(data.has_new_main_photo == 'yes'){
                $('.table-image').attr('src', data.path + data.new_main_photo.id + '/' + data.new_main_photo.main)


             }
             $('#photos-modal_' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }



 function handleCloseModal(listing) {


     let isAllSelected = ![...document.querySelectorAll('.listing-category-' + listing)].some(el => el.value == '');

     if (isAllSelected) {
         //   $('#photos-modal_'+listing).modal('toggle');
         return true;
     } else {

         return false;
         //   toast('please select all categories','error');
     }

 }



 function updateMain(input, table, listing_id, route, token, agency, business, locale, path) {

     var id = input.id
     var sliced_id = id.slice(13);

     var slicedForListingCategory = sliced_id.slice(12);

   
     if ($('#listing-category-' + slicedForListingCategory).val() == '') {
         toast("Please Select a Category First", 'error')
         $('#' + input.id).prop('checked', false);
         return false;
     }
     if ($('#listing-category-' + slicedForListingCategory).find(':selected').data('allowed') == 'no') {
         toast("This Category Not Allowed To be Main Photo", 'error')
         $('#' + input.id).prop('checked', false);
         return false;
     }
     $(' .checked_main').prop('checked', false);
     $('.checked_main_hidden').val('no');

     $('#' + input.id).prop('checked', true);

     $('#' + input.id + '-hidden').val('yes');
     var photo_id = $('#' + sliced_id + ' .photo-id').val();
     if (table == 'main') {


         $.ajax({
             url: route,
             type: 'POST',
             data: {
                 _token: token,
                 id: photo_id,
                 listing_id: listing_id


             },
             success: function (data) {
                 $('.table-image').attr('src', path + data.photo.id + '/' + data.photo.main)
                 toast(data.message, 'success')


             },
             error: function (error) {

             },
         })
     }

 }




 function updateListingVideos(listing, route, token, agency, business, locale) {

     var video_title = $('.listing-videotitle-for-submit-' + listing).map(function () {
         if ($(this).val() != '') {
             return $(this).val()
         }

     }).get();
     var video_link = $('.listing-videolink-for-submit-' + listing).map(function () {
         if ($(this).val() != '') {
             return $(this).val()
         }

     }).get();
     var video_host = $('.listing-videohost-for-submit-' + listing).map(function () {
         if ($(this).val() != '') {
             return $(this).val()
         }
     }).get();


     if (video_title.length == 0) {
         toast('No Videos To Add', 'error')
         return;
     }
     if (video_title.length != video_link.length || video_title.length != video_host.length) {
         toast('SomeThing Is Missing ', 'error')
         return;
     }
     $.ajax({
         url: route,
         type: "POST",
         data: {
             _token: token,
             listing: listing,
             business: business,
             agency: agency,
             video_title: JSON.stringify(video_title),
             video_host: JSON.stringify(video_host),
             video_link: JSON.stringify(video_link),
         },
         success: function (data) {
             toast(data.message, 'success')
             $('#videos-modal_' + listing).modal('hide')
         },
         error: function (error) {
             toast('error', 'error')
         }

     })
 }



 function editRemoveAddedVideo(addedVideo) {
     $('#' + addedVideo).remove();

 }

 function editAddVideo(id, video_title, video_host, video_link) {
     var count = $('#addedVideos_' + id + ' > div').length + 1;

     $('#addedVideos_' + id).append(`<div id="addedVideo_${id}_${count}" class="mb-4">
                                <div class="d-flex justify-content-end">
                                    <div class="cursor-pointer" onclick="editRemoveAddedVideo('addedVideo_${id}_${count}')">
                                            <i class="fas fa-times"></i>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="font-weight-medium text-muted">${video_title}</label>
                                    <input required type="text" name="edit_video_title_${id}[]" class="form-control listing-videotitle-for-submit-${id}">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="font-weight-medium text-muted">${video_link}</label>
                                    <input required type="text" class="form-control listing-videolink-for-submit-${id}" name="edit_video_link_${id}[]">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="font-weight-medium text-muted">${video_host}</label>
                                    <select required class="form-control listing-videohost-for-submit-${id}" name="edit_video_host_${id}[]" data-placeholder="select">
                                        <option style="font-size: 18px" value="youtube">Youtube</option>
                                        <option style="font-size: 18px" value="vimeo">Vimeo</option>
                                        <option style="font-size: 18px" value="dailymotion">Dailymotion</option>
                                        <option style="font-size: 18px" value="3dview">3D View</option>
                                    </select>
                                </div>
                            </div>`)


 }




 function updateListingFeatures(listing, route, token, agency, business, locale) {
        var  checkboxesFeatureName = $('.choosen-features-'+listing+':checkbox:checked').map(function() {
            var name = this.name.replace('"',"");
            name = name .replace('edit_features_'+listing,"");
            name = name .replace("[","");
            name = name .replace("]","");
    
            return name;
        }).get();
        var  checkboxesFeatureValue = $('.choosen-features-'+listing+':checkbox:checked').map(function() {
            var name = this.name.replace('"',"");
            name = name .replace('edit_features_'+listing,"");
            name = name .replace("[","");
            name = name .replace("]","");
    
            return this.value;
        }).get();


   var  inputsFeatureName = $('.choosen-features-inputs-'+listing).map(function() {

                if(this.value != ''){

                    var name = this.name.replace('"',"");
                    name = name .replace('edit_features_'+listing,"");
                    name = name .replace("[","");
                    name = name .replace("]","");
                  
                    return name ;
                }

        }).get();


        var  inputsFeatureValue = $('.choosen-features-inputs-'+listing).map(function() {

            if(this.value != ''){

                var name = this.name.replace('"',"");
                name = name .replace('edit_features_'+listing,"");
                name = name .replace("[","");
                name = name .replace("]","");
              
                return this.value;
            }

    }).get();

   var  selectsFeatureName = $('.choosen-features-select-'+listing).map(function() {
    if(this.value != ''){
        var name = this.name.replace('"',"");
        name = name .replace('edit_features_'+listing,"");
        name = name .replace("[","");
        name = name .replace("]","");
       

        return name;
    }
      }).get();
   var  selectsFeatureValue = $('.choosen-features-select-'+listing).map(function() {
    if(this.value != ''){
        var name = this.name.replace('"',"");
        name = name .replace('edit_features_'+listing,"");
        name = name .replace("[","");
        name = name .replace("]","");
       

        return this.value;
    }
      }).get();



console.log(checkboxesFeatureName,
    checkboxesFeatureValue,
    inputsFeatureName,
    inputsFeatureValue,
    selectsFeatureName,
    selectsFeatureValue)
     $.ajax({
        url: route,
        type: "POST",
        data: {
            _token: token,
            listing: listing,
            business: business,
            agency: agency,
            checkboxesFeatureName  : JSON.stringify( checkboxesFeatureName),
            checkboxesFeatureValue : JSON.stringify(checkboxesFeatureValue),
            inputsFeatureName      : JSON.stringify(inputsFeatureName),
            inputsFeatureValue     : JSON.stringify(inputsFeatureValue),
            selectsFeatureName     : JSON.stringify(selectsFeatureName),
            selectsFeatureValue    : JSON.stringify(selectsFeatureValue)
  
        },
        success: function (data) {
            toast(data.message, 'success')
            $('#featuresModal_' + listing).modal('hide')
        },
        error: function (error) {
            toast('error', 'error')
        }

    })


 }



 function getSelectedFeatures(id){

    var  checkboxesFeature = $('.choosen-features-'+id+':checkbox:checked ').map(function() {
        var name = this.name.replace('"',"");
        name = name .replace('edit_features_'+id,"");
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
   var  inputsFeature = $('.choosen-features-inputs-'+id).map(function() {

                if(this.value != ''){

                    var name = this.name.replace('"',"");
                    name = name .replace('edit_features_'+id,"");
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

   var  selectsFeature = $('.choosen-features-select-'+id).map(function() {
    if(this.value != ''){
        var name = this.name.replace('"',"");
        name = name .replace('edit_features_'+id,"");
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
     return  merged.concat(selectsFeature);
 }





 function editloadCheckedFeatures(type,id){


    var all = getSelectedFeatures(id)
    if(all.length > 0){

        var ul_html = '';
        ul_html+= '<ul>';
              for (let index = 0; index < all.length; index++) {

                  ul_html += '<li>' + all[index]+'</li>';

              }

        ul_html+= '</ul>';
        const domEditableElement = document.querySelector( '.description-profile-modal-'+id+' .edit_description_'+type+'_'+id+' .ck-editor__editable' );

          const editorInstance = domEditableElement.ckeditorInstance;
          const htmlDP = editorInstance.data.processor;
          const viewFragment = htmlDP.toView(ul_html);
          const modelFragment = editorInstance.data.toModel( viewFragment );
          const insertPosition = editorInstance.model.document.selection.getFirstPosition();
          editorInstance.model.insertContent(modelFragment, insertPosition);
    }else {

                  var message = 'Choose Features To Copy';
                  $('.features_copy_message_'+type+'_'+id).text(message)
                  return;

    }
}





function updateListingDocuments(listing, route, token, agency, business, locale) {
    var documents = $('.listing-documents-for-submit-' + listing).map(function () {
        return $(this).val()
    }).get();
    if (documents.length == 0) {
        toast('No Documents Uploaded', 'error')
        return;
    }
    $.ajax({
        url: route,
        type: "POST",
        data: {
            _token: token,
            listing: listing,
            business: business,
            agency: agency,
            documents: JSON.stringify(documents),         
        },
        success: function (data) {
            toast(data.message, 'success')
            $('#documents-modal_' + listing).modal('hide')
        },
        error: function (error) {
            toast('error', 'error')
        }

    })
}




function updateListingFloorPlans(listing, route, token, agency, business, locale) {
    var floors = $('.listing-floors-for-submit-' + listing).map(function () {
        return $(this).val()
    }).get();
    if (floors.length == 0) {
        toast('No Floors Uploaded', 'error')
        return;
    }
    $.ajax({
        url: route,
        type: "POST",
        data: {
            _token: token,
            listing: listing,
            business: business,
            agency: agency,
            floors: JSON.stringify(floors),         
        },
        success: function (data) {
            toast(data.message, 'success')
            $('#floorPlans-modal_' + listing).modal('hide')
        },
        error: function (error) {
            toast('error', 'error')
        }

    })
}


