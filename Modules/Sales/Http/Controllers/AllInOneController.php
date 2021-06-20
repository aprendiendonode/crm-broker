<?php

namespace Modules\Sales\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use Modules\Sales\Http\Repositories\AllInOneRepo;


class AllInOneController extends Controller
{

    protected $repository;
    function __construct(AllInOneRepo $repository)
    {
        $this->repository = $repository;
    }
    public function index($agency)
    {
        abort_if(Gate::denies('view_search_center'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->index($agency);
    }
}
