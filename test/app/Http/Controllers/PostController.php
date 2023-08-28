<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
	public function create(){
		return view('post.create');
	}

	public function store(Request $request){
		dump($request);
		$validated = $request->validate([
				'title'=> 'required|max:30',
				'body' => 'required|max:500',
		]);

		$validated['user_id'] = auth()->id();

		$post = Post::create($validated);
		return back()->with('message','Post Success !');
	}

	public function index(){
		$posts = Post::all();
		return view('post.index',compact('posts'));
	}
}
