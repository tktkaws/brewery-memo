<?php

namespace App\Http\Controllers;

use App\Brewery;
use App\Http\Requests\BreweryRequest;
use Illuminate\Http\Request;


class BreweryController extends Controller
{
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
}