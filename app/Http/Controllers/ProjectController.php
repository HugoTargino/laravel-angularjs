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
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->findWhere(['owner_id' => $userId]);
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
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden'];
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
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden'];
        }

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
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbidden'];
        }

        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId)
    {

        $userId = Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);


    }
}
