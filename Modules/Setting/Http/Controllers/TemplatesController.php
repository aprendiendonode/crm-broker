<?php

namespace Modules\Setting\Http\Controllers;

use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Template;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {
        abort_if(Gate::denies('manage_templates'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $per_page  = 3;
        $business  = auth()->user()->business_id;
        $type = 'all';

        $templates = Template::where('agency_id', $agency);

        if (request('title') != null) {
            $templates->where('title', 'like', '%' . request('title') . '%');
        }

        $templates = $templates->paginate($per_page);
        return view('setting::template.index', compact('templates', 'agency', 'business', 'type'));
    }

    public function filter($agency, $type)
    {
        if ($type != 'description' && $type != 'email') {
            abort(404);
        }
        $per_page  = 3;
        $business  = auth()->user()->business_id;
        $templates = Template::where('agency_id', $agency)->where('type', $type)->paginate($per_page);
        return view('setting::template.index', compact('templates', 'agency', 'business', 'type'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'title'            =>  'required|string',
                'type'              =>  'required|string|in:description,email',
                'description_en'   =>  'nullable|sometimes|string',
                'description_ar'   =>  'nullable|sometimes|string',
                'agency_id'          => 'required|integer|exists:agencies,id',
                'business_id'        => 'required|integer|exists:businesses,id'
            ], [
                'edit_title_.required'              =>  trans('settings.title_required'),
                'edit_title_.string'                =>  trans('settings.title_string'),
                'edit_type_.required'             =>  trans('settings.type_required'),
                'edit_type_.in'                   =>  trans('settings.type_in'),
                'edit_description_en_.string'   => trans('settings.description_en_string'),
                'edit_description_ar_.string'   => trans('settings.description_ar_string'),
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            Template::create([
                'title'              => $request->title,
                'slug'              => Str::slug($request->title),
                'type'                => $request->type,
                'description_en'     => $request->description_en,
                'description_ar'     => $request->description_ar,
                'agency_id'     => $request->agency_id,
                'business_id'     => $request->business_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('settings.template_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }


    public function update($id, Request $request)
    {
        $template = Template::find($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'edit_title_' . $id            =>  "required|string",
                'edit_type_' . $id           =>  'required|in:description,email',
                'edit_description_en_' . $id   =>  'nullable|sometimes|string',
                'edit_description_ar_' . $id   =>  'nullable|sometimes|string',

            ], [
                'edit_title_' . $id . '.required'              =>  trans('settings.title_required'),
                'edit_title_' . $id . '.string'                =>  trans('settings.title_string'),
                'edit_type_' . $id . '.required'             =>  trans('settings.type_required'),
                'edit_type_' . $id . '.in'                   =>  trans('settings.type_in'),
                'edit_description_en_' . $id . '.string'   => trans('settings.description_en_string'),
                'edit_description_ar_' . $id . '.string'   => trans('settings.description_ar_string'),
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }



            $template->update([
                'title'             => $request->{'edit_title_' . $id},
                'slug'              => Str::slug($request->{'edit_title_' . $id}),

                "type"              => $request->{'edit_type_' . $id},
                'description_en'    => $request->{'edit_description_en_' . $id},
                'description_ar'    => $request->{'edit_description_ar_' . $id},
            ]);


            DB::commit();
            return back()->with(flash(trans('settings.template_updated'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy()
    {
        Template::where('id',request('template_id'))->where('system','no')->delete();

        return back()->withInput()->with(flash(trans('settings.template_delete'), 'success'));
    }
}
