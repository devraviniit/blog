<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
     public function index()
    {
		//$posts = Posts::all();
		$posts =DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author')
                ->select('posts.*','users.name')
                ->get();
		return view('post.index')->with('posts',$posts);
    }
		
	public function showPost($id){
		$post = Posts::find($id);
		return view('post/show_form')->with('post',$post);
	}
}
