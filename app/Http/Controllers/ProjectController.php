<?php

namespace AppLaravel\Http\Controllers;



use AppLaravel\Repositories\ProjectRepository;
use AppLaravel\Services\ProjectService;
use Illuminate\Http\Request;
use AppLaravel\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ProjectController extends Controller
{


    /**
     * @var ProjectRepositoryEloquent
     */

    private $repository;

    /**
     * @var ProjectService
     */

    private $service;


    public function __construct(ProjectRepository $repository, ProjectService $service)
    {

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $userId = Authorizer::getResourceOwnerId(); // pega o id do user logado pelo oauth2

        if($this->repository->isOwner($id, $userId) == false){  // caso seja false não será mostrado os dados do projeto
            return ['success' => 'false'];
        }

        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
