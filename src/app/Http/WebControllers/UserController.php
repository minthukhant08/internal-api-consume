<?php

namespace App\Http\WebControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\Controller;
use App\Http\ApiControllers\UserController as API;

class UserController extends Controller
{
    public $api;
    public function __construct(API $api)
    {
      $this->api = $api;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // $request->email = 'mtk@gmail.com';
      // $request->password = '12345';
      // $token = $this->api->login($request);
      $response = $this->api->index($request);
      $response = $response->getData()->data;
      return view('User.list', compact('response'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $response = $client->request('DELETE', 'https://api.astrosubs.com/api/v1/users',[
        'headers' => [
            'Authorization'   => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuYXN0cm9zdWJzLmNvbVwvYXBpXC92MVwvdXNlcnNcL2xvZ2luIiwiaWF0IjoxNTY1MDgwNTIxLCJleHAiOjE1NjUwODQxMjEsIm5iZiI6MTU2NTA4MDUyMSwianRpIjoiZEp6N0dHN2xqWXVDMWhRRiIsInN1YiI6MTEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.jM3Yaho34yRtYzdJbjXNgRP13yCDu5dDsebbpipWCxk'
          ]
      ]);
    }
}
