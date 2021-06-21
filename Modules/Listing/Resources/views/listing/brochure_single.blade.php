<style>
    div {
        font-size: 13px
    }
</style>

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
                <img style="width: 87px; height: 87px; margin-top: 1rem" src="{{$listing->agent &&  $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' }}" alt="">
            </div>
            <div style="display: inline-block; padding: 0 0.4rem; vertical-align: top;">
                <h4 style="margin: 0 0 0.4rem;">{{ $listing->agent ? $listing->agent->{'name_'.app()->getLocale()} : '' }}</h4>
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
              <div>{{ $listing->price }}</div>
              <div>AED 1,760,000</div>
            </p>
            <p>
              <ul style="padding-left: 10px;">
                <li>2271 SqFt</li>
                <li>Beds:3</li>
                <li>Baths:3</li>
                <li>Garden View</li>
                <li>Ref: 122-Th-S-1029</li>
                <li>Permit: 26706</li>
              </ul>
            </p>
                <p>- Welcome to the new Portuguese-inspired
                district within the Serena Community. Its vast
                green spaces and unique architecture promise a
                cheerful ambiance and a tranquil lifestyle. Relax
                and unwind in spacious 2 and 3-bedroom
                townhouses, and enjoy a host of amenities at the
                Central Plaza, which is located at the heart of the
                community</p>
              <p>
                <div>- PROPERTY SIZES -Type A: 3 Bedroom + Maid
                  Semi-Detached - 2,271 sq.ft</div>
                <div>Type B: 3 Bedroom + Maid Townhouse End -
                    1,936 sq.ft</div>
                <div>Type C: 3 Bedroom + Maid Townhouse Mid -
                  1,820 sq.ft</div>
                <div>Type D+: 2 Bedroom + Maid Townhouse Mid -
                  1,513 sq.ft
                  </div>
                <div>DP will Bear 100% DLD fees on behalf of the
                  client.</div>
                <div>20% during construction| 5% on Handover | 75%
                  post-handover payment plan for 5 years.
                  To guarantee your unit due to the high demand
                  please contact me to register.
                  </div>
              </p>
              <p>
                <div>Perfecta Casa Real Estate</div>
                <div>RERA ORN: 12155</div>
                <div>Address: Al Safouh First - Fraser Suits Hotel -
                  Sidra Tower - 803
                  </div>
                <div>Office phone no: 044217902
                  </div>
                <div>Hotline No: 0551900600
                </div>
                <div>Primary email: info@pcasa.ae</div>
                <div>Website: www.pcasa.ae</div>
              </p>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
