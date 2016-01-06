<?php

namespace AppLaravel\Http\Controllers;

use AppLaravel\Entities\Client;
use AppLaravel\Repositories\ClientRepository;
use AppLaravel\Repositories\ClientRepositoryEloquent;
use Illuminate\Http\Request;

use AppLaravel\Http\Requests;
use AppLaravel\Http\Controllers\Controller;

class ClientController extends Controller
{

    private $client;
    /**
     * @var ClientRepositoryEloquent
     */
    private $repository;


    public function __construct(ClientRepository $repository)
    {

        $this->repository = $repository;
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
        return $this->client->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->client->find($id);
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
        $this->client->find($id)->update($request->all());
        return $this->client->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->client->find($id)->delete();
    }
}
