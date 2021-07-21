<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resource\ClientResource
     */
    public function index()
    {
        return new ClientResource(
            Client::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ClientRequest  $request
     * @return \App\Http\Resource\ClientResource
     */
    public function store(ClientRequest $request)
    {
        $validated_data = $request->validated();

        $client = Client::create($validated_data);

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response(null, 200)
                    ->header('Content-Type', 'text/plain');
    }
}
