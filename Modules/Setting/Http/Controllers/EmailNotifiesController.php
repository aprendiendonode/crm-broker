<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Setting\Entities\EmailNotify;
use Modules\Setting\Entities\EmailNotifyReminder;
use Modules\Setting\Entities\EmailNotifyTenancy;
use Modules\Setting\Http\Requests\UpdateProfile;

class EmailNotifiesController extends Controller
{

    public function index()
    {
        return view('setting::index');
    }


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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $agency)
    {
        $email_notify = EmailNotify::firstOrCreate([
            'agency_id' => $agency,
            'business_id'   =>  auth()->user()->business_id
        ]);

        $reminders = EmailNotifyReminder::where('email_notify_id'  , $email_notify->id)->get();
        $tenancies = EmailNotifyTenancy::where('email_notify_id'  , $email_notify->id)->get();
        return view('setting::emailnotify.edit', compact('email_notify','reminders','tenancies'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'notify' => 'required|integer|exists:email_notifies,id',
                'email_cc' => 'nullable|sometimes|string|email',
                'email_bcc' => 'nullable|sometimes|string|email',


                'tenancy_expiry' => 'nullable|sometimes|in:0,1',
                'task_reminder' => 'nullable|sometimes|in:0,1',
                'listing_assigned' => 'nullable|sometimes|in:0,1',
                'lead_assigned' => 'nullable|sometimes|in:0,1',
                'listing_approval' => 'nullable|sometimes|in:0,1',
                'task_assigned' => 'nullable|sometimes|in:0,1',
                'listing_approved' => 'nullable|sometimes|in:0,1',
                'listing_rejected' => 'nullable|sometimes|in:0,1',
                'lsm_lead' => 'nullable|sometimes|in:0,1',
                'email_lead' => 'nullable|sometimes|in:0,1',
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $email_notify = EmailNotify::findorfail($request->notify);

            $data = [
                'email_bcc' => $request->email_bcc,
                'email_cc' => $request->email_cc,
                'tenancy_expiry' => $request->tenancy_expiry,
                'task_reminder' => $request->task_reminder,
                'listing_assigned' => $request->listing_assigned,
                'lead_assigned' => $request->lead_assigned,
                'listing_approval' => $request->listing_approval,
                'task_assigned' => $request->task_assigned,
                'listing_approved' => $request->listing_approved,
                'listing_rejected' => $request->listing_rejected,
                'lsm_lead' => $request->lsm_lead,
                'email_lead' => $request->email_lead,
            ];

            $email_notify->update($data);



            if($request->task_reminder == 1){
                EmailNotifyReminder::where( 'email_notify_id'  , $email_notify->id)->delete();
                foreach($request->category as $key => $category){
                    EmailNotifyReminder::create([
                        'category'  => $category,
                        'type'  => $request->type[$key],
                        'day'  => $request->days[$key],
                        'time'  => $request->time[$key],
                        'email_notify_id'  => $email_notify->id,
                    ]);

                }
            }

            if($request->tenancy_expiry == 1){
                EmailNotifyTenancy::where( 'email_notify_id'  , $email_notify->id)->delete();
                foreach($request->tenancy_type as $key => $type){
                    EmailNotifyTenancy::create([
                        'type'  => $type,
                        'day'  => $request->tenancy_days[$key],
                        'time'  => $request->tenancy_time[$key],
                        'email_notify_id'  => $email_notify->id,
                    ]);

                }
            }





            DB::commit();

            return back()->with(flash(trans('settings.success'), 'success'));


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->withInput()->with(flash(trans('settings.failed'), 'error'));
        }
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
