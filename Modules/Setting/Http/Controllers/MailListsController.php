<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;
use Modules\Setting\Entities\MailList;

class MailListsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {

        $per_page = 3;
        $business = auth()->user()->business_id;

        $mail_lists = MailList::where('agency_id', $agency);

//        $contacts = Contact::where('agency_id', $agency)->get();
        if(request('name_en') != null){
            $mail_lists->where('name_en','like', '%' . request('name_en') . '%')->orwhere('name_ar','like', '%' . request('name_en') . '%');
        }

        $leads = Lead::where('agency_id', $agency)->pluck('email1')->filter()->unique()->toArray();

        $opportunities = Opportunity::where('agency_id', $agency)->pluck('email1')->filter()->unique()->toArray();
        $clients = Client::where('agency_id', $agency)->pluck('email1')->filter()->unique()->toArray();

        $mails = $leads;

        $mails += $opportunities;
        $mails += $clients;

        $mail_lists = $mail_lists->paginate($per_page);
        return view('setting::maillist.index', compact('mail_lists', 'agency', 'business','mails'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'name_en' => 'required|string',
                'name_ar' => 'nullable|sometimes|string',
                'mails' => 'array|sometimes',
                'agency_id' => 'required|integer|exists:agencies,id',
                'business_id' => 'required|integer|exists:businesses,id'
            ], [
                'name_en.required' => trans('settings.name_en_required'),
                'name_en.string' => trans('settings.name_en_string'),
                'name_ar.string' => trans('settings.name_ar_string')
            ]
            );


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            MailList::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'mails' => implode(',',$request->mails),
                'agency_id' => $request->agency_id,
                'business_id' => $request->business_id,
            ]);

            //attach data
//                $mail_list->contacts()->sync($request->contacts);

            DB::commit();
            return back()->with(flash(trans('settings.maillist_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }


    public function update($id, Request $request)
    {
        $maillist = MailList::find($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'edit_name_en_'  . $id    => 'required|string',
                'edit_name_ar_'  . $id    => 'nullable|sometimes|string',
                'edit_mails_'  . $id    => 'array|sometimes',


            ], [
                'edit_name_en_' . $id . '.required' => trans('settings.name_en_required'),
                'edit_name_en_' . $id . '.string' => trans('settings.name_en_string'),
                'edit_name_ar_' . $id . '.string' => trans('settings.name_ar_string')
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }


            $maillist->update([
                'name_en' => $request->{'edit_name_en_' . $id},
                'name_ar' => $request->{'edit_name_ar_' . $id},
                'mails' => implode(',',$request->{'edit_mails_' . $id})
            ]);


            //attach data
//            $maillist->contacts()->sync($request->{'edit_contacts_' . $id});


            DB::commit();
            return back()->with(flash(trans('settings.maillist_updated'), 'success'));
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
        $maillist =  MailList::findorfail(request('maillist_id'));
//        $maillist->contacts()->detach();
        $maillist->delete();

        return back()->withInput()->with(flash(trans('settings.maillist_delete'), 'success'));
    }
}
