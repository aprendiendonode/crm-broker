<?php

namespace Modules\Agency\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Agency\ViewModels\Agency\AgencyIndexViewModel;
use Symfony\Component\HttpFoundation\Response;


class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewModel = new AgencyIndexViewModel($request);
//        return view('agency::index',$viewModel);
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
