 
    
    function updateListingAgent(listing,route ,token,agency,business,locale){
       
        var agent = $('.listing-agent-'+listing).val()

        if(agent == ''){
            toast('Choose a listing agent','error')
            return;
        }

        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token   : token,
                listing  : listing,
                business : business,
                agency   :   agency,
                agent    : agent
            },
            success: function(data){
            
               var name = locale == 'en' ?  data.agent.name_en : data.agent.name_ar;
                $('.listing-agent-name-'+listing).text(name)
                $('.listing-agent-table-name-'+listing).text(name)
                $('.listing-agent-email-'+listing).text(data.agent.email)
                $('.listing-agent-phone-'+listing).text(data.agent.phone)
                toast(data.message,'success')
                $('#agent-modal-'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }



    function updateListingPricing(listing,route ,token,agency,business,locale){
       
        var price              = $('.listing-price-'+listing).val()
        var commission_percent = $('.listing-commission-percent-'+listing).val()
        var commission_value   = $('.listing-commission-value-'+listing).val()
        var deposite_percent   = $('.listing-deposite-percent-'+listing).val()
        var deposite_value     = $('.listing-deposite-value-'+listing).val()
        var rent_frequency     = $('.listing-rent-frequency-'+listing).val()  
        var cheque             = $('.listing-cheque-'+listing).val()  

        if(price == ''){
            toast('Price Required','error')
            return;
        }

        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token              : token,
                listing             : listing,
                business            : business,
                agency              : agency,
                price               : price,
                commission_percent  : commission_percent,  
                commission_value    : commission_value,
                deposite_percent    : deposite_percent,
                deposite_value      : deposite_value,
                rent_frequency      : rent_frequency,
                cheque              : cheque,
            },
            success: function(data){
            
               var cheque_name = locale == 'en' ?  data.cheque.name_en : data.cheque.name_ar;
              
                $('.listing-pricing-price-'+listing).text(price)
                $('.listing-pricing-table-price-'+listing).text(price)
                $('.listing-pricing-commission-'+listing).text(commission_value +' - '+ commission_percent +' %')
                $('.listing-pricing-deposite-'+listing).text(commission_value +' - '+ commission_percent +' %')
                $('.listing-pricing-cheque-'+listing).text(cheque_name)
                $('.listing-pricing-rent-frequency-'+listing).text(rent_frequency)
                toast(data.message,'success')
                $('#pricing-modal-'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }



    function updateListingLocation(listing,route ,token,agency,business,locale){
       
        var location              = $('.listing-location-'+listing).val()
        var loc_lat               = $('.listing-loc-lat-'+listing).val()
        var loc_lng               = $('.listing-loc-lng-'+listing).val()
        var city                  = $('.listing-city-'+listing).val()
        var community             = $('.listing-community-'+listing).val()
        var sub_community         = $('.listing-sub-community-'+listing).val()
        var unit                  = $('.listing-unit-'+listing).val()
        var plot                  = $('.listing-plot-'+listing).val()
        var street                = $('.listing-street-'+listing).val()


        if(city == ''){
            toast('City Required','error')
            return;
        }

        if(community == ''){
            toast('Community Required','error')
            return;
        }

        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token              : token,
                listing             : listing,
                business            : business,
                agency              : agency,
                location            : location,
                loc_lat             : loc_lat,
                loc_lng             : loc_lng,
                city                : city,
                community           : community,
                sub_community       : sub_community,
                unit                : unit,
                plot                : plot,
                street              : street,
            },
            success: function(data){
            
               var city_name = locale == 'en' ?  data.city.name_en : data.city.name_ar;
               var community_name = locale == 'en' ?  data.community.name_en : data.community.name_ar;
               console.log(data.sub_community)
               if(data.sub_community != ''){
                console.log('here')
                   var sub_community_name = locale == 'en' ?  data.sub_community.name_en : data.sub_community.name_ar;
                   $('.listing-locations-sub-community-'+listing).text(sub_community_name)
               }
              
                $('.listing-locations-location-'+listing).text(location)

                // $('.listing-location-table-price-'+listing).text(price)
                $('.listing-locations-city-'+listing).text(city_name)
                $('.listing-locations-community-'+listing).text(community_name)
               
                $('.listing-locations-unit-'+listing).text(unit)
                $('.listing-locations-plot-'+listing).text(plot)
                $('.listing-locations-street-'+listing).text(street)
  
                toast(data.message,'success')
                $('#locations-modal-'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }




    function updateListingExtraInfo(listing,route ,token,agency,business,locale){
       
        var key_location                         = $('.listing-key-location-'+listing).val()
        var govfield1                            = $('.listing-govfield1-'+listing).val()
        var govfield2                            = $('.listing-govfield2-'+listing).val()
        var yearly_service_charges               = $('.listing-yearly-service-charges-'+listing).val()
        var monthly_cooling_charges              = $('.listing-monthly-cooling-charges-'+listing).val()
        var monthly_cooling_provider             = $('.listing-monthly-cooling-provider-'+listing).val()
 
        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token                    : token,
                listing                   : listing,
                business                  : business,
                agency                    : agency,
                key_location              : key_location,
                govfield1                 : govfield1,
                govfield2                 : govfield2,
                yearly_service_charges    : yearly_service_charges,
                monthly_cooling_charges   : monthly_cooling_charges,
                monthly_cooling_provider  : monthly_cooling_provider,
               
            },
            success: function(data){
        
                $('.listing-extra-info-key-location-'+listing).text(key_location)
                $('.listing-extra-info-govfield1-'+listing).text(govfield1)
                $('.listing-extra-info-govfield2-'+listing).text(govfield2)
                $('.listing-extra-info-yearly-service-charges-'+listing).text(yearly_service_charges)
                $('.listing-extra-info-monthly-cooling-charges-'+listing).text(monthly_cooling_charges)
                $('.listing-extra-info-monthly-cooling-provider-'+listing).text(monthly_cooling_provider)

                toast(data.message,'success')
                $('#extraInfo-modal_'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }




    
    function updateListingDetails(listing,route ,token,agency,business,locale){
       
        var purpose                              = $('.listing-purpose-'+listing).val()
        var status                              = $('.listing-status-'+listing).val()
        var lsm                                  = $('.listing-lsm-'+listing).val()
        var title                                = $('.listing-title-'+listing).val()
        var type                                 = $('.listing-type-'+listing).val()
        var beds                                 = $('.listing-beds-'+listing).val()
        var parkings                             = $('.listing-parkings-'+listing).val()
        var baths                                = $('.listing-baths-'+listing).val()
        var year_built                           = $('.listing-year-built-'+listing).val()
        var plot_area                            = $('.listing-plot-area-'+listing).val()
        var area                                 = $('.listing-area-'+listing).val()
        var sources                              = $('.listing-source-'+listing).val()
        var landlord                             = $('.listing-landlord-'+listing).val()
        var developer                            = $('.listing-developer-'+listing).val()
        var rented                               = $('.listing-rented-'+listing).val()
        var never_lived_in                       = $('.listing-never-lived-in-'+listing).val()
        var featured_on_company_website          = $('.listing-featured-on-company-website-'+listing).val()
        var exclusive_rights                     = $('.listing-exclusive-rights-'+listing).val()
        var tenant_start_date                    = $('.listing-tenant-start-date-'+listing).val()
        var tenant_end_date                      = $('.listing-tenant-end-date-'+listing).val()
        var tenant                               = $('.listing-tenant-'+listing).val()


        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token                               : token,
                listing                              : listing,
                business                             : business,
                agency                               : agency,
                purpose                              : purpose,
                status                              : status,
                lsm                                  : lsm, 
                title                                : title,
                type                                 : type,
                beds                                 : beds,
                parkings                             : parkings,
                baths                                : baths,
                year_built                           : year_built,
                plot_area                            : plot_area,
                area                                 : area,
                source                               : sources,
                landlord                             : landlord,
                developer                            : developer,
                rented                               : rented,
                never_lived_in                       : never_lived_in,
                featured_on_company_website          : featured_on_company_website,
                exclusive_rights                     : exclusive_rights,
                tenant_start_date                    : tenant_start_date,
                tenant_end_date                      : tenant_end_date,
                tenant                               : tenant,
                
               
            },
            success: function(data){

                 $('.listing-details-Purpose-'+listing).text(purpose)
                 $('.listing-details-status-'+listing).text(status)
                 $('.listing-details-lsm-'+listing).text(lsm)
                 $('.listing-details-title-'+listing).text(title)
                 $('.listing-details-type-'+listing).text(type)
                 $('.listing-details-beds-'+listing).text(beds)
                 $('.listing-details-parkings-'+listing).text(parkings)
                 $('.listing-details-baths-'+listing).text(baths)
                 $('.listing-details-year-built-'+listing).text(year_built)
                 $('.listing-details-year-area-'+listing).text(plot_area)
                 $('.listing-details-area-'+listing).text(area)
                 $('.listing-details-sources-'+listing).text(sources)
                 $('.listing-details-landlord-'+listing).text(landlord)
                 $('.listing-details-developer-'+listing).text(developer)
                 $('.listing-details-rented-'+listing).text(rented)
                 $('.listing-details-never-lived-in-'+listing).text(never_lived_in)
                 $('.listing-details-featured-on-company-website-'+listing).text(featured_on_company_website)
                 $('.listing-details-exclusive-rights-'+listing).text(exclusive_rights)
                 $('.listing-details-tenant-start-date-'+listing).text(tenant_start_date)
                 $('.listing-details-tenant-start-date-'+listing).text(tenant_end_date)
                 $('.listing-details-tenant-'+listing).text(tenant)
                toast(data.message,'success')
                $('#extraInfo-modal_'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }



    function editShowRentDiv(id) {
        
        if($('.rent-radio-'+id +' option:selected').val() == 'rent'){
            $('#rent_div_'+id)[0].style.display = "block";
            document.getElementById(`rent-sale-label-${id}`).innerHTML = "Rent";
        }else {
            document.getElementById(`rent-sale-label-${id}`).innerHTML = "Sale";
            $('#rent_div_'+id)[0].style.display = "none";
        }
    }
    function editShowSubRentDiv(id) {
    
        if($('.sub-rent-checkbox-'+id)[0].checked){
            $('#sub_rent_div_'+id)[0].style.display = "block";
        }else {
            $('#sub_rent_div_'+id)[0].style.display = "none";
        }
            
    }
    
    function editShowFurnishedQuestion(id){
        question_status = $('.listing_type_'+id).find(':selected').data('furnished');
        if(question_status == 'yes'){
            $('.furnished_question_'+id).removeClass('d-none');
        }else{
            $('.furnished_question_'+id).addClass('d-none');
        }
    
    }


    function updateListingDescription(listing,route ,token,agency,business,locale){
     
        console.log(
            
            editor_en.getData(),editor_ar.getData()
            )
        $.ajax({
            url:route ,
            type:"POST",
            data:{
                _token                    : token,
                listing                   : listing,
                business                  : business,
                agency                    : agency,
                description_en            : description_en,
                description_ar            : description_ar,
            
               
            },
            success: function(data){
        
                var description = locale == 'en' ? data.desciption_en : data.desciption_ar
                
                $('.listing-desc-description-'+listing).text(description)
              

                toast(data.message,'success')
                $('#description-modal-'+listing).modal('hide')
            },
            error: function(error){
                toast('error','error')
            }

        })
    }

