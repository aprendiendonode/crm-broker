
<div>
  <h2>
    {{ $listing->title }}
  </h2>
  
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
  <div>
    <table style="table-layout: fixed; width: 100%">
      <tbody>
        <tr>
          <td style="vertical-align: top">

            @if($listing->photos)
            @foreach($listing->photos->where('main_photo','no')->take(2) as $photo)


            <div>
              <img
                style="width: 100%; margin-bottom: 1rem"
                @if($photo->active == 'main')
                src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}"
                @else
                src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}"
                @endif
                alt=""
              />
            </div>
           
             @endforeach
         @endif
  
     
          <div style="margin-top: 1rem">
            <div style="display: inline-block">
                <img style="width: 87px; height: 87px; margin-top: 1rem"
                 src="{{$listing->agent &&  $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' }}" alt="">
            </div>
            <div style="display: inline-block; padding: 0 0.4rem; vertical-align: top;">
                <h4 style="margin: 0 0 0.4rem;">{{ $listing->agent ? Str::ucfirst( $listing->agent->{'name_'.app()->getLocale()} ) : '' }}</h4>
                <div>{{ $listing->agent ? $listing->agent->phone : '' }}</div>
                <div>{{ $listing->agency ? $listing->agency->country_code .'-'.$listing->agency->phone : '' }}</div>
                <div>{{ $listing->agent ? $listing->agent->email : ''  }}</div>
                <div>{{ $listing->agency ? $listing->agency->{'company_name_'.app()->getLocale()} : '' }}</div>
            </div>
          </div>
          </td>
          <td style="vertical-align: top">
          <div style="padding: 1rem">
            <p>
              <div>{{ $listing->price }}</div>
              <div>{{ Str::ucfirst($listing->rent_frequency) }}</div>
              <div>{{ $listing->location .''. ($listing->city ? ' -'. $listing->city->name_en  : '')}}</div>
            </p>
            <p>
              <ul style="padding-left: 10px;">
                <li>{{ $listing->area }} SqFt</li>
                <li>Beds:{{ $listing->beds }}</li>
                <li>Baths:{{ $listing->baths }}</li>
                @if($listing->agency && $listing->agency->listing_views)
                   @foreach($listing->agency->listing_views as $view)

                    @if(in_array($view->id,$listing->view_ids)  ) 
                    <li>{{ $view->name_en }}</li>
                    @endif
                  @endforeach

                  @endif
             
                <li>Ref: {{ $listing->listing_ref }}</li>
                <li>Permit: {{ $listing->permit }}</li>
              </ul>
            </p>
            
             {!! $listing->description_en !!}
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

