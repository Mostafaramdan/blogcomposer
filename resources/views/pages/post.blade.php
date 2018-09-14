@extends('pages.index')
	@section('post')

@if($posts->count()>0)
@foreach ($posts as $p)
<div class='panel' >
 
	
	<div class='panel-heading'>
			  <a href="/post/{{$p->title}}" > 
			 <h1> {{ str_limit($p->title, 50)  }}</h1>
			 </a>
	 	 </div>
	 <div class='panel-body'>
	 {!!$p->body!!}
	 </div>
	
	<div class="panel-footer">
<span class="label label-default "><i class="fa fa-user" ></i> {{$p->user->name}}</span>	
		&nbsp;

<span class="label label-info pull-right"><i class="fa fa-calendar" ></i> {{$p->created_at}}</span>	
		
	
	
	</div>
</div>
	

@endforeach
{{$posts->links()}}
@else
<div class = "alert alert-info">
<h1>oops there is no data</h1>
</div>

@endif



@endsection
	