<div class="card-body">

    <div class="dropdown float-right">
                  <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                      <i class="dripicons-dots-3"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <!-- item-->
                      <a onclick="event.preventDefault()" data-toggle="modal"
                      data-target="#photos-modal_{{ $listing->id }}" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>@lang('listing.edit')</a>
                    
                  </div>
    </div> 




  <h4 class="header-title">@lang('listing.photo')</h4>
  {{-- <p class="sub-header font-13">Adding in the previous and next controls:</p>   --}} 

  <!-- START carousel-->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          @if($listing->photos)
          @foreach($listing->photos as $photo)

              @if($photo->active != 'watermark')
                  <div class="carousel-item  @if($loop->index == 0) active @endif ">
                      <img class="d-block img-fluid" src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->main) }}" >
                  </div>
              @else

                  <div class="carousel-item @if($loop->index == 0) active @endif ">
                      <img class="d-block img-fluid" src="{{ asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$photo->id.'/'.$photo->watermark) }}" >
                  </div>
              @endif
      
   
          @endforeach
          @endif

          @if($listing->photos->count() == 0)
              <p class="sub-header font-13">@lang('listing.from_here_you_can_update_photos')</p> 
          @endif
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>

</div>