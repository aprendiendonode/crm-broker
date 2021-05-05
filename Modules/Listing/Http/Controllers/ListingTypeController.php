<?php

namespace Modules\Listing\Http\Controllers;

use Gate;
use App\Models\Team;

use App\Models\User;
use Illuminate\Support\Str;
use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Listing\Entities\ListingType;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ListingTypeController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;
        $per_page  = 100;

        $listing_types = ListingType::where('agency_id', $agency)->where('business_id', auth()->user()->business_id)->paginate($per_page);


        return view('listing::settings.types.index', compact('agency', 'listing_types', 'business'));
    }



    public function store(Request $request)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [

                'name_en'            =>  'required|string',
                'name_ar'            =>  'sometimes|nullable|string',
                'agency_id'          =>  'required|integer|exists:agencies,id',
                'business_id'        =>  'required|integer|exists:businesses,id',
                'type'               =>  'required|in:commercial,residential',
                'furnished_question' =>  'required|in:yes,no',
                'reference'          =>  'required|string'
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            ListingType::create([

                'name_en'            => $request->name_en,
                'slug'               => Str::slug($request->name_en, '-'),
                'name_ar'            => $request->name_ar,
                "business_id"        => $request->business_id,
                "agency_id"          => $request->agency_id,
                "type"               => $request->type,
                "furnished_question"               => $request->furnished_question,
                "reference"          => $request->reference,

            ]);

            DB::commit();
            return back()->with(flash(trans('listing.type_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    public function update($id, Request $request)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listing_type = ListingType::findorfail($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id          =>  'required|string',
                'edit_name_ar_' . $id          =>  'sometimes|nullable|string',
                'edit_type_' . $id             => 'required|in:commercial,residential',
                'edit_reference_' . $id                    =>  'required|string',
                'edit_furnished_question_' . $id           =>  'required|in:yes,no'



            ], [

                'edit_name_en_' . $id . '.required'              =>  trans('agency.name_en_required'),
                'edit_name_en_' . $id . '.string'                =>  trans('agency.name_en_string'),

                'edit_name_ar_' . $id . '.string'                =>  trans('agency.name_ar_string'),


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }



            $listing_type->update([

                'name_en'            => $request->{'edit_name_en_' . $id},
                'slug'               => Str::slug($request->{'edit_name_en_' . $id}, '-'),
                'name_ar'            => $request->{'edit_name_ar_' . $id},
                'type'               =>  $request->{'edit_type_' . $id},
                'furnished_question' =>  $request->{'edit_furnished_question_' . $id},
                'reference'          =>  $request->{'edit_reference_' . $id},

            ]);


            DB::commit();
            return back()->with(flash(trans('listing.type_updated'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }




    public function destroy()
    {
        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ListingType::findorfail(request('type_id'))->delete();

        return back()->withInput()->with(flash(trans('listing.type_deleted'), 'success'));
    }
}