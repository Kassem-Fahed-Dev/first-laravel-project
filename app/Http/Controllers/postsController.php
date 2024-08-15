<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Post;

class postsController extends Controller
{
    public function create()
    {
        return view('post');
    }
    public function insert(request $request)
    {
        DB::table('users')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return $this->show();
    }
    public function show()
    {
        $posts = DB::table('users')->get();
        return view('terms',compact('posts'));
    }
    public function update(Request $request , $id)
    {
    DB::table('users')->where('id',$id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password
    ]);
   //return response('updated');
   return redirect()->route('post1');
}
public function edit($id)
{
    $posts = DB::table('users')->where('id',$id)->first();
    return view('post',compact('posts'));
}
}
