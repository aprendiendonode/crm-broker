<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


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
}
