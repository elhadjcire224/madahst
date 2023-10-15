<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(Request $request): View
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    public function create(Request $request): View
    {
        return view('client.create');
    }

    public function store(ClientStoreRequest $request): RedirectResponse
    {
        $client = Client::create($request->validated());

        return redirect()->route('client.index');
    }

    public function destroy(Request $request, Client $client): RedirectResponse
    {
        $client->delete();

        return redirect()->route('client.index');
    }

    public function update(ClientUpdateRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return redirect()->route('client.index');
    }
}
