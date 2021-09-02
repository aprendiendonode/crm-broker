<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModeratorRequest;

use App\Http\Requests\UpdateModeratorRequest;
use App\Models\User;
use Domain\Moderators\Actions\CreateModeratorAction;
use Domain\Moderators\Actions\UpdateModeratorAction;
use Domain\Moderators\DataTransferObjects\CreateModeratorData;
use Domain\Moderators\DataTransferObjects\UpdateModeratorData;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\ViewModels\Moderator\ModeratorIndexViewModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Gate;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class ModeratorController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency, Request $request)
    {
        abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewModel = new ModeratorIndexViewModel($agency, $request);
        return view('moderator.index', $viewModel);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('agency::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateModeratorRequest $request, CreateModeratorAction $createModeratorAction)
    {

        DB::beginTransaction();

        try {
            $createModeratorAction(CreateModeratorData::fromRequest($request));
            DB::commit();
            return back()->with(flash(trans('moderator.moderator_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('moderator.something_went_wrong'), 'error'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('agency::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('agency::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateModeratorRequest $request, UpdateModeratorAction $updateModeratorAction)
    {
        DB::beginTransaction();

        try {
            $updateModeratorAction(UpdateModeratorData::fromRequest($request));
            DB::commit();
            return back()->with(flash(trans('moderator.moderator_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('moderator.something_went_wrong'), 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        try {
            abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');
//            dd($id);
            User::findorfail($id)->delete();

            return back()->withInput()->with(flash(trans('moderator.moderator_deleted'), 'success'));

        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('moderator.something_went_wrong'), 'error'));
        }
    }

    public function export($agency)
    {
        abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new UsersExport($agency,'moderator'), 'moderator-list.xlsx');
    }

    public function change_activation($id)
    {
        try {
            abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $user = User::findorfail($id);

            $user->active = $user->active == '0' ? '1' : '0';
            if ($user->save()){

                return back()->withInput()->with(flash( ($user->active == 0 ? __('moderator.in_active') : __('moderator.active')) .trans('moderator.moderator'), 'success'));
            }

            return back()->withInput()->with(flash(trans('moderator.something_went_wrong'), 'error'));

        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('moderator.something_went_wrong'), 'error'));
        }
    }
}
