<div class="row">

    @foreach($folders->folders as $folder)


            <div class="col-xl-3 col-lg-6 product-box " ondblclick="open_folder({{$folder->id}})">
                <div class="card m-1 shadow-none border ">
                    <div class="p-2  ">
                        <div class="row align-items-center ">

                            <div class="col-auto">
                                <div class="avatar-sm">
                            <span class="avatar-title bg-light text-secondary rounded">
                               <i class="mdi mdi-folder font-18"></i>
                            </span>
                                </div>
                            </div>

                            <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-normal"
                                   id="folder_name_{{$folder->id}}"
                                   onclick="edit_folder_name({{$folder->id}})">{{$folder->name ?? ''}}</a>
                                <input type="text" class="text-muted font-weight-normal"
                                       id="folder_input_{{$folder->id}}"
                                       value="{{$folder->name ?? ''}}" style="display:none">
                                <i class="fas fa-save ml-2" style="display:none; font-size: 120%"
                                   id="folder_submit_{{$folder->id}}" onclick="save_new_name({{$folder->id}})"></i>

                            </div>

                        </div>
                        <!-- end row -->
                    </div>

                </div>
                <div class="product-action">
                    <a href="#" onclick="delete_folder({{$folder->id}})"
                       class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                </div>
            </div>


    @endforeach
</div>

<div class="row">
    @foreach($folders->images as $image)

        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                    <a href="#" onclick="delete_image({{$image->id}})"
                       class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                </div>

                <div class="bg-light">
                    <img src="{{asset('bank_images/'.$image->dir.'/'.$image->image)}}" alt="{{$image->image ?? ''}}"
                         class="img-fluid">
                </div>


            </div>
        </div>
    @endforeach
</div>
