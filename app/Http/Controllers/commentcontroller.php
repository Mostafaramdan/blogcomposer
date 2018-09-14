<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\comment;
use App\post;

class commentcontroller extends Controller
{
	
	
	  public function __construct()
    {
        $this->middleware('auth');
    }
public function store(Request $request , $title)
{
	$this->validate($request, [
			'body' => 'required|max:500'
]);
	$post=post::where('title',$title)->firstOrfail();
	$comment=new Comment();
	$comment->body=$request->body;
	$comment->user_id=Auth::id();
	$comment->post_id=$post->id;
	$comment->save();
	return redirect()->route('post.show',$title)->with('success','your comment send successfully'); 
 	
}
    public function destroy($id){
		//$comment=Comment::find($id);
		//$comment->delete();
//		return  redirect('post/show')->with('success','your post deleted succefully');
		
	}
}
