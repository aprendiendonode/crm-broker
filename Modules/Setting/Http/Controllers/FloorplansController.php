<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Setting\Entities\FloorPlan;
use Symfony\Component\HttpFoundation\Response;


class FloorplansController extends Controller
{

    public function index($agency)
    {
        try {
            return view('setting::floor_plan.index', compact('agency'));
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }

    public function delete_image($id,$agency)
    {

        try {
            $image = FloorPlan::findorfail($id);
            $images = FloorPlan::where('image',$image->image)->get();
            if(count($images) <= 1){
                unlink(public_path('floor_plans/' . $agency . '/' . $image->image));
            }
            $image->delete();
            return response()->json(Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }

    }

    public function store_image(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|array',
                "file.*" => "required|image|mimes:jpg,png,jpeg,gif",
                'agency_id' => 'required|integer|exists:agencies,id'
            ]);
            $user = auth()->user();


            $agency_path = public_path('floor_plans/' . $request->agency_id);

            if (!File::isDirectory($agency_path)) {
                File::makeDirectory($agency_path, 0777, true, true);
            }


            foreach ($request->file as $file) {

                $image = upload_image($file, $agency_path);
                FloorPlan::create([
                    'image' => $image,
                    'agency_id' => $request->agency_id,
                    'business_id' => $user->business_id,
                    'user_id' => $user->id,

                ]);
            }


        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }

    }

    public function content($agency)
    {
        try {

           $images = FloorPlan::where('agency_id', $agency)->get();


            $content = view('setting::floor_plan.content', compact('images','agency'))->render();

            return response()->json($content, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }

    }


}
