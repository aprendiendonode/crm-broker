<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_view()
    {

        return view('auth.login');
    }

    public function login_proccess(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email',
                'password' => 'required'
            ]
        );
        // dd($request);

        // $password = Hash::make($request->password);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $agency_id = '';
            if (owner()) {
                $agencies = auth()->user()->agencies;

                $agency_id = $agencies->first()->id;
                return redirect('home/' . $agency_id);
            } elseif (moderator()) {

                $agencies = explode(',', auth()->user()->can_access);
                $agency_id = count($agencies) > 0 ? $agencies[0] : auth()->user()->agency_id;
                return redirect('home/' . $agency_id);
            } else {
                return redirect('home/' . auth()->user()->agency_id);
            }
        }
        return  back()->withInput()->with('message', 'Invalid Data');
    }


    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}