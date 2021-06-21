<style>
    div {
        font-size: 13px
    }
</style>

<div>
    <div style="height: 900px">

        <h2>{{ $listing->title }}</h2>

          
        @if($listing->photos)
        @php $photo = $listing->photos->where('main_photo','yes')->first(); @endphp
            @if($photo)
            <img style="width: 100%; margin-bottom: 1rem"
            @if($photo->active == 'main')
            src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
            @else
            src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
            @endif
            >
            @endif
        @endif

        <div style="margin-bottom: 5rem">
            <table style="table-layout: fixed; width: 100%">
                <tbody>
                    <tr>
                        <td style="vertical-align: top;">
                         
                            @if($listing->photos)
                            @php $photo = $listing->photos->where('main_photo','no')->take(2)->first(); @endphp
                                @if($photo)
                                    <img
                                        style="width: 100%; margin-bottom: 1rem; height: auto;"
                                        @if($photo->active == 'main')
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
                                        @else
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
                                        @endif
                                    />
                         
                                @endif
                            @endif


                            <div style="margin-left: 1rem">
                                <h3 style="font-weight: medium; margin: 3px">Ref # {{ $listing->listing_ref }}</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->type ? Str::ucfirst( $listing->type->name_en) :'' }} To {{ Str::ucfirst($listing->purpose) }}</h3>
                                <h3 style="font-weight: medium; margin: 3px">AED {{ $listing->price }} / {{ Str::ucfirst($listing->rent_frequency) }}</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->beds }}</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->parkings }}</h3>
                            </div>
                        </td>
                        <td style="vertical-align: top;">

                            @if($listing->photos)
                            @php $photo = $listing->photos->where('main_photo','no')->take(2)->skip(1)->first(); @endphp
                                @if($photo)
                                    <img
                                        style="width: 100%; margin-bottom: 1rem; height: auto;"
                                        @if($photo->active == 'main')
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
                                        @else
                                        src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
                                        @endif
                                    />
                         
                                @endif
                            @endif

                            <div style="margin-left: 1rem">
                                <h3 style="font-weight: medium; margin: 3px">Permit # {{ $listing->permit }}</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->location .''. ($listing->city ? ' , '. $listing->city->name_en  : '')}}</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->area }} SqFt</h3>
                                <h3 style="font-weight: medium; margin: 3px">{{ $listing->baths }}</h3>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="description">
     {!! $listing->description_en !!}
    </div>
    <div class="gallery" style="height: 950px">
        <h2 style="margin-bottom: 3rem">Photo Gallery:</h2>

     


        <div>
      
            @if($listing->photos)
            @foreach($listing->photos->where('main_photo','no')->SortByDesc('id')
            ->take(4) as $photo)



                    <img
                    style="width: 40%; margin-bottom: 1rem; margin-right: 1rem; display: inline-block;"
                    @if($photo->active == 'main')
                    src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
                    @else
                    src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
                    @endif
                    alt=""
                      />
    
          
           
             @endforeach
         @endif
  


        </div>
    </div>
    <div style="margin-bottom: 1rem">
        <h2>Main features:</h2>
        <ul>
            @foreach($listing->features as $key => $feature)
                @if($feature != null || $feature != null)
                    <li>{{ Str::ucfirst($key) }}</li>
                @endif
            @endforeach
        </ul>
    </div>
    </div>
    <div style="margin-bottom: 1rem">
        <h2>Property View:</h2>
        <ul>
            @if($listing->agency && $listing->agency->listing_views)
            @foreach($listing->agency->listing_views as $view)

             @if(in_array($view->id,$listing->view_ids)  ) 
             <li>{{ $view->name_en }}</li>
             @endif
           @endforeach

           @endif
        </ul>
    </div>
    <table style="table-layout: fixed; width: 100%">
        <tbody>
            <tr>
                <td>
                    <img
                        style="width: 100%; margin-bottom: 1rem"
                        src="{{$listing->agent &&  $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' }}"
                        
                        />
                </td>
                <td colspan="2" style="vertical-align: top">
                    <div style="padding: 0.4rem">
                        <div style="margin-bottom: 0.5rem">
                            <h3 style="margin: 0;">Contact {{ $listing->agent ? Str::ucfirst( $listing->agent->{'name_'.app()->getLocale()} ) : '' }}:</h3>
                        </div>

                        <div>{{ $listing->agent ? $listing->agent->phone : '' }}</div>
                        <div>{{ $listing->agency ? $listing->agency->country_code .'-'.$listing->agency->phone : '' }}</div>
                        <div>{{ $listing->agent ? $listing->agent->email : ''  }}</div>
                        <div>{{ $listing->agency ? $listing->agency->website : '' }}</div>
                        <div>{{ $listing->agency ? $listing->agency->{'company_name_'.app()->getLocale()} : '' }}</div>
                   
                        
                        <div>{{ $listing->agency ? $listing->agency->address : '' }}</div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
