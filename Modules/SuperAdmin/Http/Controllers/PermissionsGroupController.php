<?php

namespace Modules\SuperAdmin\Http\Controllers;

use App\Models\PermissionGroup;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $permissions_groups = PermissionGroup::paginate(10);
        $paginate = true;
        return view('superadmin::permissionsGroups.index', compact('permissions_groups', 'paginate'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('superadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:permission_groups,name',
            
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            PermissionGroup::create([
                'name' => str_replace(' ', '_', $request->name),
            ]);

            DB::commit();
            return back()->with(flash(trans('superadmin.permissionsGroup.created'), 'success'));

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('superadmin.permissionsGroup.something_went_wrong'), 'error'))->with('open-tab', 'yes');

        }
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('superadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('superadmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:permission_groups,name,' . $id,
            
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $permissionsGroup = PermissionGroup::findOrFail($id);
            $permissionsGroup->update([
                'name' => str_replace(' ', '_', $request->name),
            ]);

            DB::commit();
            return back()->with(flash(trans('superadmin.permissionsGroup.updated'), 'success'));

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('superadmin.permissionsGroup.something_went_wrong'), 'error'))->with('open-tab', 'yes');

        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        PermissionGroup::findorfail(request('permissions_group_id'))->delete();

        return back()->withInput()->with(flash(trans('superadmin.permissionsGroup.deleted'), 'success'));
    }
}
