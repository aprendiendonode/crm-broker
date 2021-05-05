<?php

namespace Modules\Sales\Http\Controllers;

use Gate;

use Illuminate\Http\Request;

use Modules\Sales\Entities\Call;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Activity\Entities\Task;

use Modules\Sales\Entities\Client;

use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpFoundation\Response;

use Modules\Sales\Http\Repositories\ClientRepo;


class ClientsController extends Controller
{


    public function index($agency, ClientRepo $repo)
    {
        abort_if(Gate::denies('view_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->index($agency);
    }



    public function update($id, Request $request, ClientRepo $repo)
    {
        abort_if(Gate::denies('edit_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->update($id, $request);
    }

    public function destroy()
    {
        abort_if(Gate::denies('delete_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Client::findorfail(request('client_id'))->delete();

        return back()->withInput()->with(flash(trans('sales.client_deleted'), 'success'));
    }

    public function update_qualification_index(Request $request, ClientRepo $repo)
    {
        return $repo->update_qualification_index($request);
    }

    public function make_call(Request $request, $id, ClientRepo $repo)
    {

        abort_if(Gate::denies('edit_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->make_call($request, $id);
    }




    public function delete_call(Request $request)
    {
        DB::beginTransaction();

        try {
            Call::findorfail($request->call_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.call_deleted'), 'success'))->with('open-call-tab', $request->call_client_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $request->call_client_id);
        }
    }


    public function assign_staff(Request $request, ClientRepo $repo)
    {
        abort_if(Gate::denies('assign_client_to_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->assign_staff($request);
    }

    public function assign_task(Request $request, $id, ClientRepo $repo)
    {

        abort_if(Gate::denies('assign_task_on_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->assign_task($request, $id);
    }
    public function edit_assign_task(Request $request, $id, ClientRepo $repo)
    {

        abort_if(Gate::denies('assign_task_on_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->edit_assign_task($request, $id);
    }

    public function delete_task(Request $request)
    {


        abort_if(Gate::denies('assign_task_on_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            Task::findorfail($request->task_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.task_deleted'), 'success'))->with('open-task-tab', $request->task_client_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $request->task_client_id);
        }
    }
    /**********************************End Assign Task********************************* */



    public function convert_to_client(Request $request, ClientRepo $repo)
    {

        abort_if(Gate::denies('convert_client_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->convert_to_client($request);
    }


    public function result(Request $request, $id, ClientRepo $repo)
    {


        abort_if(Gate::denies('edit_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->result($request, $id);
    }





    public function question(Request $request, $id, ClientRepo $repo)
    {

        abort_if(Gate::denies('add_question_on_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->question($request, $id);
    }



    public function answer(Request $request, ClientRepo $repo)
    {
        abort_if(Gate::denies('edit_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->answer($request);
    }



    public function client_hold(Request $request)
    {

        abort_if(Gate::denies('edit_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client = Client::where('id', $request->hold_client_id)->where('business_id', auth()->user()->business_id)->first();
        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {

            $validator = Validator::make($request->all(), [

                "hold_reason_" . $request->hold_client_id      => "required|string",

            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-approve-tab', $request->hold_client_id);
            }

            $client->update([
                'converting_approval'      => 'hold',

                'hold_reason'              => $request->{'hold_reason_' . $request->hold_client_id},
                'hold_by'                  => auth()->user()->id,
                'hold_date'                => date('Y-m-d'),

                'reject_reason'            => null,
                'rejected_by'              => null,
                'reject_date'              => null,

                'submit_for_approve_by'    => null,
                'submit_for_approve_date'  => null,

            ]);

            DB::commit();
            return back()->with(flash(trans('sales.client_on_hold'), 'success'))->with('open-hold-tab', $request->hold_client_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-hold-tab', $request->hold_client_id);
        }
    }

    public function suggest_new_convert(Request $request, ClientRepo $repo)
    {

        abort_if(Gate::denies('convert_client_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->suggest_new_convert($request);
    }




    public function remove_document(Request $request, ClientRepo $repo)
    {

        if ($request->ajax()) {

            return $repo->remove_document($request);
        }
    }


    public function client_reject(Request $request, ClientRepo $repo)
    {
        return $repo->client_reject($request);
    }



    public function approve_client(Request $request, ClientRepo $repo)
    {
        return $repo->approve_client($request);
    }
}