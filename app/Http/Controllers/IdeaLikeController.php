<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like($idea)
    {
       $liker=auth()->user();
       $liker->likes()->attach($idea);

       return redirect()->route('dashboard')->with('success', "liked successfully");
    }

    public function unlike(Idea $idea)
    {
        $liker=auth()->user();
        $liker->likes()->detach($idea);

        return redirect()->route('dashboard')->with('success', "unliked successfully");
    }
}
