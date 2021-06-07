<?php

namespace Modules\Activity\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\EmailGeneral;
use App\Models\Agency;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Activity\Entities\Email;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;
use Modules\Setting\Entities\MailList;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Modules\Setting\Entities\Template;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {
        $per_page   = 10;
        $mail_lists = MailList::where('agency_id', $agency)->get();

        // Clients and leads and opportunities
        $clients = Client::where('agency_id', $agency)->select('email1','email2','table_name');
        $leads = Lead::where('agency_id', $agency)->select('email1','email2','table_name');
        $contacts = Opportunity::where('agency_id', $agency)->select('email1','email2','table_name')->union($clients)->union($leads)->get();


        $templates = Template::where('agency_id', $agency)->where('type', 'email')->get();

        $staffs     = User::where('agency_id', $agency)->where('active', '=', '1')->where('type', 'staff')
            ->orwhere('business_id', auth()->user()->business_id)->where('type', 'owner')->where('active', '=', '1')->get();


        $emails = Email::where('business_id', auth()->user()->business_id)->with('addBy');

        //filter emails

        if (request('id') != null) {

            $emails->where('id', request('id'));

        }
        if (request('sender_filter') != null) {
            $emails->where('add_by', request('sender_filter'));
        }

        if (request('subject') != null) {

            $emails->where('subject',    'like', '%' . request('subject') . '%');

        }

        if (request('filter_from_date') != null) {
            $emails->where('created_at', '>=', request('filter_from_date') . ' 00:00:00');
        }

        if (request('filter_to_date') != null) {
            $emails->where('created_at', '<=', request('filter_to_date') . ' 23:59:59');
        }


        $emails = $emails->orderBy('id', 'desc')->paginate($per_page);

        $agency = Agency::findorfail($agency);

        return view('activity::emails.index', compact('staffs', 'mail_lists', 'contacts', 'templates', 'emails','agency'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('activity::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $email_address_array = [];
        if ($request->email_address){

            $email_address_array = explode(',',$request->email_address);
        }
        try {
            //        $explode = explode(',',$request->email_address);
            //        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            //
            //        for ($i=0 ;$i<sizeof($explode);$i++)
            //        {
            //            $emailaddress = $explode[$i];
            //
            //            if (preg_match($pattern, $emailaddress) === 1) {
            //                dd('true');
            //            }else{
            //                dd('false');
            //            }
            //        }
            //        dd($request->all());
            // validate data
            $validator = Validator::make($request->all(), [

                'contacts.*'    => ['string',],
                'contacts'      => ['array','required',],
                "bcc"           => ['sometimes','string', 'nullable'],
                "email_address" => ['required_without:contacts','string', 'nullable'],
                "subject"       => ['required', 'string',],
                "email_content" => ['required', 'string',],
                'attach_file'   => ['nullable', 'file', 'mimes:jpg,png,jpeg,gif,pdf'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            // send emails

            $fileName = null;
            //store email data
            if ($request->attach_file) {

                $file = $request->attach_file;
                $path = public_path('email_files');

                $fileName = upload_image($file, $path, true);
            }

            if ($request->contacts) {
                foreach ($request->contacts as $contact) {
                    // send emails
                    $attach = null;
                    if ($request->attach_file) {

                        $attach = $path.'/'.$fileName;
                    }
//                    Mail::to($contact)->cc($email_address_array)->bcc($request->bcc)
//                        ->send(new EmailGeneral($request->email_content, $request->subject, $attach));
                    SendEmail::dispatch($contact, $request->email_content, $request->subject,$attach,$email_address_array,$request->bcc);

                    //store email data
                    $email = Email::create([

                        'contacts'          => $contact,
                        'email_addresses'   => $request->email_address,
                        'BCC'               => $request->bcc,
                        'subject'           => $request->subject,
                        'email_content'     => $request->email_content,
                        'attach_file'       => $fileName,
                        'agency_id'         => $request->agency_id,
                        'business_id'       => auth()->user()->business_id,
                        'add_by'            => auth()->user()->id,

                    ]);

                    setActivity('email',$email->id,$email->agency_id,$email->business_id,'the email #'.$email->id.' sent by ' .auth()->user()->name_en. ' to '.$email->contacts,
                        'تم إضافة بريد إلكترونى رقم #'.$email->id.' تمت بواسطه ' .auth()->user()->name_en .' إلى '.$email->contacts);

                }

            } elseif ($request->email_address) {
                $explode = explode(',', $request->email_address);
                $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

                for ($i = 0; $i < sizeof($explode); $i++) {
                    $emailaddress = $explode[$i];

                    if (preg_match($pattern, $emailaddress) === 1) {
                        // send emails

                        $attach = null;
                        if ($request->attach_file) {

                            $attach = $path.'/'.$fileName;
                        }

//                        Mail::to($emailaddress)->bcc($request->bcc)->send(new EmailGeneral($request->email_content, $request->subject ,$attach));
                        SendEmail::dispatch($emailaddress, $request->email_content, $request->subject,$attach,null,$request->bcc);

                        //store email data
                        $email = Email::create([

                            'contacts'          => $emailaddress,
                            'email_addresses'   => $request->email_address,
                            'BCC'               => $request->bcc,
                            'subject'           => $request->subject,
                            'email_content'     => $request->email_content,
                            'attach_file'       => $fileName,
                            'agency_id'         => $request->agency_id,
                            'business_id'       => auth()->user()->business_id,
                            'add_by'            => auth()->user()->id,

                        ]);

                        setActivity('email',$email->id,$email->agency_id,$email->business_id,'the email #'.$email->id.' sent by ' .auth()->user()->name_en. ' to '.$email->contacts,
                            'تم إضافة بريد إلكترونى رقم #'.$email->id.' تمت بواسطه ' .auth()->user()->name_en .' إلى '.$email->contacts);

                    } else {
                        return back()->with(flash(trans('activity.create_failed'), 'danger'))->withInput();
                    }
                }
            }else{
                return back()->withInput()->with(flash('activity.create_failed', 'danger'));
            }

            return back()->with(flash(trans('activity.create_success'), 'success'));
        } catch (\Exception $e) {
            return back()->withInput()->with(flash('activity.create_failed', 'danger'));
            throw $e;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('activity::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('activity::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
