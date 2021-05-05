
<div class="row">
    @foreach($images as $image)

        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                    <a href="#" onclick="delete_image({{$image->id}})"
                       class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                </div>

                <div class="bg-light">
                    <img src="{{asset('floor_plans/'.$agency.'/'.$image->image)}}" alt="{{$image->image ?? ''}}"
                         class="img-fluid">
                </div>


            </div>
        </div>
    @endforeach
</div>
