<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::user()->isAdmin == 1){
			$posts = Posts::all();
		}else{
			$posts = Posts::where('author' , Auth::user()->id)->get();
		}
        return view('home')->with('posts',$posts);
    }

    public function getPostForm() {
        return view('post/post_form');
    }

    public function createPost(Request $request){
	
        $post = Posts::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'author' => Auth::user()->id
        ));

        return redirect()->route('home')->with('success', 'Post has been successfully added!');
    }
	
	public function editPost($id)
    {
        $post = Posts::where('id', $id)->first();
		return view('post/edit_form')->with('post',$post);
    }
	
	public function updatePost(Request $request){
	
        $id =  Input::get('updatedId');
        Posts::find($id)->update($request->all());

        return redirect()->route('home')->with('success', 'Post has been successfully updated!');
    }
	
	
	
	 public function deletePost(Request $request){
		$id = Input::get('deletedId');
        $post = Posts::find($id);    
		$post->delete();
        return redirect()->route('home')->with('success', 'Post has been successfully deleted!');
    }

}