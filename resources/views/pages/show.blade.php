@extends('pages.index')
@section('c') 


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="clearfix">
<div class="panel panel-default">
	         <a href="/post" class='btn btn-info btn-block	' ><i class="fas fa-home"></i> home</a>
<div class="panel">
<div class="panel-heading">

	
@if(!Auth::guest() && (Auth::user()->id == $post->user_id ))
	<div class="pull-right">	
	<button class="btn btn-danger btn-lg" type='submit' data-toggle="modal" data-target="#myModal" ><i class="fas fa-trash-alt"></i> delete post</button>
				</div>

					<a href="/post/{{$post->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> edit</a>

			 <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DELETE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			do you want to delete this post
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
			{!!	Form::open(['action'=>['postcontroller@destroy',$post->id] ,'method'=>'POST']) !!}
	{{Form::hidden('_method','DELETE')}}
          <button type="submit" class="btn btn-danger" >delete</button>
					{!!Form::close()!!}

        </div>
        
      </div>
    </div>
  </div>
	</div>
	@endif
<h1 style="text-align: center"> {{$post->title}}</h1>
<div class="panel-body " style="overflow:hidden">
	<div  style="border:1px solid;  padding-left:10px;"  >

{!! $post->body !!}
	</div>
	</div>
	<div class="panel-body ">

		<h3 style="display: inline-block">Username : </h3><span style="font-size:20px"> {{$post->user->name}} </span><br>
		<h3 style="display: inline">Email : </h3><span style="font-size:20px"> {{$post->user->email}} </span>
<h3 > this post created at : <span style="font-size:20px"> {{$post->created_at}}</span> </h3>
	
		</div>
	<hr/>
		<h3>&nbsp;&nbsp;Comments :  {{$comments->count()}}</h3>

	<div class="panel panel-default">
	<div class="panel-heading">Add your comments</div>
<div class="panel-body">
@if($comments->count()>0)
@foreach($post->comments as $comment)		
		
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>{{$comment->user->name}} <i class="fa fa-user"></i>
				
				
				
				
				<!--
                                    using for delete comment


 				@if(!Auth::guest() && (Auth::user()->id == $comment->user_id ))
				<div class="pull-right">
					{!! Form::open(['action' => ['commentcontroller@destroy', $comment->id], 'method' => 'POST']) !!}	{{Form::hidden('_method','DELETE')}}
          <button type="submit" class="btn btn-danger" >elete this comment</button>
					{!!Form::close()!!}
					
	
		</div> 
				
		@endif                             -->
			</h3>
		</div>  
		<div class="panel-body">{{$comment->body}} <i class="fa fa-comment"></i></div>
	<div class="panel-footer"> <div class="pull-left"><i class="fa fa-clock"></i>&nbsp; &nbsp; {{$comment->created_at->format('D')}} &nbsp; &nbsp;{{$comment->created_at->format('H : i')}}
</div>	
		</div>
		
	<hr>
						</div>

	@endforeach
	@else <h1 style="text-align:center">there is no comments</h1>
	@endif

	
	<form action="{{route('comments.store', $post->title)}}" method='POSt'>
	{{csrf_field()}}
	<div class="form-group">
		<label for="comment">comments</label>
		<textarea  name="body" class="form-control" placeholder="write your comment"></textarea>
		
		</div>
		<div class="form-group pull-right">
		<button class="btn btn-primary">add comment</button>
		
		</div>
	</form>
		</div>	
	
	
	
	</div>

@endsection	