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
        return $this->repository->index($agency);
    }
}
