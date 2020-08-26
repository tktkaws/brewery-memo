<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewery;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::all()->sortByDesc('created_at');

        return view('breweries.index', ['breweries' => $breweries]);
    }
}