<?php

namespace Domain\Listings\Actions;

use Intervention\Image\Facades\Image;
use Modules\Sales\Entities\Developer;
use Modules\Agency\Entities\Watermark;
use Modules\Listing\Entities\TemporaryListing;
use Domain\Listings\DataTransferObjects\CreateTenantData;

class UploadTemporaryPhotoAction
{

    public function __invoke($photo, $temporaryPhotoData)
    {

        if (!file_exists(public_path("temporary"))) {
            mkdir(public_path("temporary"));
        }
        if (!file_exists(public_path("temporary/listings"))) {
            mkdir(public_path("temporary/listings"));
        }
        $photo_name = str_replace([' ', '_'], '-', $photo->getClientOriginalName());
        $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;
        if (!file_exists(public_path('temporary/listings/' . $main_tmp_folder))) {
            mkdir(public_path('temporary/listings/' . $main_tmp_folder));
        }
        $path = public_path('temporary/listings/' . $main_tmp_folder);
        $photo->move($path, $photo_name);
        $main_photo_path = public_path('temporary/listings/' . $main_tmp_folder . '/' . $photo_name);
        $icon_tmp_folder_path = public_path("temporary/listings/$main_tmp_folder/icon-$photo_name");
        Image::make($main_photo_path)
            ->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($icon_tmp_folder_path);
        $watermark = Watermark::where('agency_id', $temporaryPhotoData->agency)->where('active', 'yes')->first();
        // * image with full size and watermark
        $with_watermark_tmp_folder_path = public_path("temporary/listings/$main_tmp_folder/mainWatermark-$photo_name");
        if ($watermark) {
            Image::make($main_photo_path)
                ->insert(public_path('upload/watermarks/' . $watermark->image), $watermark->position)
                ->save($with_watermark_tmp_folder_path);
        }
        $temporary_photo = TemporaryListing::create([
            'folder' => $main_tmp_folder,
            'main' => $photo_name,
            'watermark' => 'mainWatermark-' . $photo_name,
            // 'borchure' => 'mainborchure-' . $photo_name,
            'icon' => 'icon-' . $photo_name,
            'active' => 'watermark',
        ]);

        return $temporary_photo;
    }
}