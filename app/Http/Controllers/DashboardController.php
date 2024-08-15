<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Http\Controllers\dumb;
class DashboardController extends Controller
{
    public function index(){
        $ideas = Idea::orderby('created_at','DESC');
        if(request()->has('search'))
        $ideas = $ideas->where('content','like','%' . request()->search . '%');
        return view('dashboard',['ideas'=>$ideas->paginate(5)]);
    }
}
