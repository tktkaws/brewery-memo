<?php

namespace App\Http\Controllers;

use App\Brewery;
use App\Http\Requests\BreweryRequest;
use Illuminate\Http\Request;


class BreweryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brewery::class, 'brewery');
    }

    public function index()
    {
        $breweries = Brewery::all()->sortByDesc('created_at');

        return view('breweries.index', ['breweries' => $breweries]);
    }

    public function create()
    {
        return view('breweries.create');
    }

    public function store(BreweryRequest $request, Brewery $brewery)
    {
        $brewery->fill($request->all());
        $brewery->user_id = $request->user()->id;
        $brewery->save();

        return redirect()->route('breweries.index');
    }

    public function edit(Brewery $brewery)
    {
        return view('breweries.edit', [
            'brewery' => $brewery,
        ]);

    }

    public function update(BreweryRequest $request, Brewery $brewery)
    {
        $brewery->fill($request->all())->save();

        return redirect()->route('breweries.index');
    }

    public function destroy(Brewery $brewery)
    {
        $brewery->delete();
        return redirect()->route('breweries.index');
    }

    public function show(Brewery $brewery)
    {
        return view('breweries.show', ['brewery' => $brewery]);
    }
}