<?php

namespace Modules\Listing\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use Modules\Listing\Http\Repositories\ListingRepo;


class ListingController extends Controller
{


    public function index($agency, ListingRepo $repo)
    {
        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->index($agency);
    }

    public function store(Request $request, ListingRepo $repo)
    {
        abort_if(Gate::denies('add_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->store($request);
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


    public function temporary_photos(Request $request, ListingRepo $repository)
    {
        return $repository->temporary_photos($request);
    }
    public function temporary_plans(Request $request, ListingRepo $repository)
    {
        return $repository->temporary_plans($request);
    }
    public function temporary_documents(Request $request, ListingRepo $repository)
    {
        return $repository->temporary_documents($request);
    }
    public function modify_document_title(Request $request, ListingRepo $repository)
    {
        return $repository->modify_document_title($request);
    }

    public function update(Request $request, $id, ListingRepo $repository)
    {
        return $repository->update($request, $id);
    }
}