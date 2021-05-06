<?php

namespace Modules\Listing\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use Modules\Listing\Http\Repositories\ListingRepo;


class ListingController extends Controller
{

    protected $repository;
    function __construct(ListingRepo $repository)
    {
        $this->repository = $repository;
    }
    public function index($agency)
    {
        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->index($agency);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('add_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->store($request);
    }








    /**********************************End Assign Task********************************* */







    public function locations($agency)
    {

        return view('listing::location');
    }
    public function uploader($agency)
    {
        return view('listing::uploader');
    }

    public function tenant(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->tenant($request);
    }
    public function landlord(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->landlord($request);
    }
    public function developer(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->developer($request);
    }


    public function temporary_photos(Request $request)
    {
        return $this->repository->temporary_photos($request);
    }
    public function temporary_plans(Request $request)
    {
        return $this->repository->temporary_plans($request);
    }
    public function temporary_documents(Request $request)
    {
        return $this->repository->temporary_documents($request);
    }
    public function modify_title(Request $request)
    {
        return $this->repository->modify_title($request);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }
    public function brochure(Request $request, $type, $agency)
    {
        return $this->repository->brochure($request, $type, $agency);
    }
    public function remove_listing_temporary(Request $request)
    {
        return $this->repository->remove_listing_temporary($request);
    }
    public function update_listing_temporary_active(Request $request)
    {
        return $this->repository->update_listing_temporary_active($request);
    }
    public function share_listing($agency, ListingRepo $repository)
    {
        return $repository->share_listing($agency);
    }
}
