<?php

namespace Modules\Activity\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Activity\Entities\ClientNote;
use Modules\Activity\Entities\LeadNote;
use Modules\Activity\Entities\ListingNote;
use Modules\Activity\Entities\OpportunityNote;
use Modules\Activity\Entities\TaskNote;
use Gate;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {
        abort_if(Gate::denies('view_notes'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $per_page       = 10;
        $notes = [];
        if (request()->segment(count(request()->segments())) == 'tasks'){

            $notes = TaskNote::whereHas('task', function($query) use($agency) {
                            $query->where('agency_id',$agency);
                        });

            if (request('id') != null) {
                $notes->where('task_id', request('id'));
            }
        }else if (request()->segment(count(request()->segments())) == 'listings'){

            $notes = ListingNote::whereHas('listing', function($query) use($agency) {
                $query->where('agency_id',$agency);
            });

            if (request('id') != null) {
                $notes->where('listing_id', request('id'));
            }
        }else if (request()->segment(count(request()->segments())) == 'leads'){

            $notes = LeadNote::whereHas('lead', function($query) use($agency) {
                $query->where('agency_id',$agency);
            });

            if (request('id') != null) {
                $notes->where('lead_id', request('id'));
            }
        }else if (request()->segment(count(request()->segments())) == 'clients'){

            $notes = ClientNote::whereHas('client', function($query) use($agency) {
                $query->where('agency_id',$agency);
            });

            if (request('id') != null) {
                $notes->where('client_id', request('id'));
            }
        }else if (request()->segment(count(request()->segments())) == 'opportunities'){

            $notes = OpportunityNote::whereHas('opportunity', function($query) use($agency) {
                $query->where('agency_id',$agency);
            });

            if (request('id') != null) {
                $notes->where('opportunity_id', request('id'));
            }
        }

        //filter notes
        if (request('keyword') != null) {

            $notes->where('notes_'.app()->getLocale(),    'like', '%' . request('keyword') . '%');

        }

        if (request('staff_filter') != null) {
            $notes->where('add_by', request('staff_filter'));
        }


        if (request('filter_from_date') != null) {
            $notes->where('created_at','>=', request('filter_from_date').' 00:00:00');
        }

        if (request('filter_to_date') != null) {
            $notes->where('created_at','<=', request('filter_to_date').' 23:59:59');
        }


        $staffs     = User::where('agency_id',$agency)->where('active','=','1')->where('type','staff')
                            ->orwhere('business_id', auth()->user()->business_id)->where('type','owner')->where('active','=','1')->get();
        if ($notes){

            $notes          = $notes->orderBy('id','desc')->paginate($per_page);
        }
        return view('activity::notes.index',compact('notes','staffs'));
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
