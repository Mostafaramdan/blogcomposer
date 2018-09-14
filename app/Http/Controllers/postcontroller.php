<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class postcontroller extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth',['except'=>['show','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	//$posts =post::select('title','body','id','created_at','updated_at','user_id')->paginate(2);
	$posts =post::orderBy('created_at','DESC')->paginate(2);
     
		
		//return	view('pages.post', compact('posts'));
		//return	view('pages.post')->with('posts',$posts);
		return view('pages.post',['posts'=>$posts]);
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
        'title' => 'required|unique:posts|min:4',
			'body' => 'required|:posts|min:5'
]);
		$user=Auth::user();

		$post=new post();
		$post->title=$request->input('title');
		$post->body=$request->input('body');
		$post->user_id=$user->id;
          $post->save();
		return redirect('/post')->with('success','post created succefully');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
		
        $post=Post::where('title',$title)->first();
		$comment_post_id=$post->id;
        $comment=Comment::where('post_id',$comment_post_id);
		return view('pages.show',['post'=>$post,'comments'=>$comment]);
			//view('pages.show',compact('post'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		        $post=Post::Find($id);

		$userId = Auth::id();
		if($post->user_id <> $userId ){
			return redirect('/post')->with('error','its not your post');
								}

        return view('pages.edit',compact('post'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       	$this->validate($request, [
        'title' => 'required|:posts|min:5',
			'body' => 'required|:posts|min:5'
]);
		$post=Post::find($id);
			$post->title=$request->input('title');
		    $post->body =$request->input('body');
		$post->save();
		return redirect('/post/'.$post->title)->with('success','post updated succefully');
	
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		        $post=Post::Find($id);

		$userId = Auth::id();
		if($post->user_id <> $userId ){
			return redirect('/post')->with('error','its not your post');
								}		
	$post->delete();
		return redirect('/post')->with('success','post deleted succefully');
	}
}
