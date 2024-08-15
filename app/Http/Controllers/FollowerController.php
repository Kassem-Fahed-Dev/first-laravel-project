<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);

        return redirect()->route('user.show', $user->id)->with('success', "followed successfully");
    }

    public function unfollow(User $user)
    {

        $follower = auth()->user();
        $follower->followings()->detach($user);

        return redirect()->route('user.show', $user->id)->with('success', "unfollowed successfully");
    }
}
