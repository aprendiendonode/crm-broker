<?php

namespace Domain\Listings\Actions;

use Intervention\Image\Facades\Image;
use Modules\Agency\Entities\Watermark;
use Modules\Listing\Entities\TemporaryPlan;


class UploadTemporaryPlanAction
{

    public function __invoke($plan, $temporaryPlanData)
    {

        if (!file_exists(public_path("temporary"))) {
            mkdir(public_path("temporary"));
        }
        if (!file_exists(public_path("temporary/plans"))) {
            mkdir(public_path("temporary/plans"));
        }

        $plan = request()->file('file');
        $plan_name = str_replace([' ', '_'], '-', $plan->getClientOriginalName());

        $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

        if (!file_exists(public_path('temporary/plans/' . $main_tmp_folder))) {
            mkdir(public_path('temporary/plans/' . $main_tmp_folder));
        }

        $path = public_path('temporary/plans/' . $main_tmp_folder);
        $plan->move($path, $plan_name);
        $main_plan_path = public_path('temporary/plans/' . $main_tmp_folder . '/' . $plan_name);
        // * image with full size and watermark
        $with_watermark_tmp_folder_path = public_path("temporary/plans/$main_tmp_folder/mainWatermark-$plan_name");
        $watermark = Watermark::where('agency_id', $temporaryPlanData->agency)->where('active', 'yes')->first();
        if ($watermark) {
            Image::make($main_plan_path)
                ->insert(public_path('upload/watermarks/' . $watermark->image), $watermark->position)
                ->save($with_watermark_tmp_folder_path);
        }


        $temporary_plan = TemporaryPlan::create([
            'folder' => $main_tmp_folder,
            'main' => $plan_name,
            'watermark' => 'mainWatermark-' . $plan_name,
            'active' => 'watermark',
        ]);

        return $temporary_plan;
    }
}