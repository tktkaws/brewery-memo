<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        $breweries = $user->breweries->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'breweries' => $breweries,
        ]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $breweries = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'breweries' => $breweries,
        ]);
    }


    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}