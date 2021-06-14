<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lead2;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function test(){
       try{
           dd(Lead2::where('show_in','in_leads')->get());
           $old_leads =DB::connection('mysql2')->table('tbl_leads')->get();
//        $old_leads = Lead2::all();
           foreach($old_leads as $lead){
               dump($lead);
           }
           dd($old_leads);
       }catch (\Exception $e) {
           Log::error($e);
       }

    }

    public function change_language($lang)
    {
        DB::beginTransaction();
        try{
            $user = User::find(auth()->user()->id);
            $user->update([
                'language' => $lang
            ]);
            DB::commit();
            return back()->with(flash(trans('global.language_changed'), 'success'));
        }catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }
    public function change_Notify_status(Request $request)
    {

        DB::beginTransaction();
        try{

            \App\Models\Notification::where('id',$request->notify)->update([
                'read_at' => now()
            ]);
            DB::commit();
            return response()->json(Response::HTTP_CREATED,200);
        }catch (\Exception $e) {
            DB::rollback();
        }
    }

}
