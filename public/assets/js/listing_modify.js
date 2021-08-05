 
    
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