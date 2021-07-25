<?php

namespace Modules\Activity\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Activity\Entities\ActivityLog;
use Symfony\Component\HttpFoundation\Response;
use Gate;


class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {
        abort_if(Gate::denies('view_logs'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(!owner()){

            return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
        }
        $per_page   = 10;
        $activities = ActivityLog::where('business_id', auth()->user()->business_id)->with('addBy');

        //filter logs

        if (request('staff_filter') != null) {
            $activities->where('add_by', request('staff_filter'));
        }

        if (request('id') != null) {
            $activities->where('id', request('id'));
        }

        if (request('group') != null) {

            $activities->where('group',    'like', '%' . request('group') . '%');

        }

        if (request('filter_from_date') != null) {
            $activities->where('created_at', '>=', request('filter_from_date') . ' 00:00:00');
        }

        if (request('filter_to_date') != null) {
            $activities->where('created_at', '<=', request('filter_to_date') . ' 23:59:59');
        }

        $activities = $activities->orderBy('id', 'desc')->paginate($per_page);

        $staffs     = User::where('agency_id',$agency)->where('active','=','1')->where('type','staff')
            ->orwhere('business_id', auth()->user()->business_id)->where('type','owner')->where('active','=','1')->get();

        return view('activity::activity_logs.index',compact('activities', 'staffs'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return redirect()->back();
//        return view('activity::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return redirect()->back();
//        return view('activity::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return redirect()->back();
//        return view('activity::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
}
