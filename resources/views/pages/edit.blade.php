@extends('pages.index')
@section('c') 
<div class="container">
<h1>edit {{$post->title}}</h1>
<hr>
</div>

{!! Form::open(['action'=>['postcontroller@update',$post->id],'method'=>'POST']) !!}
{{Form::hidden('_method','Put')}}
<div class="form-group">`
 {{ Form::label('Title')}}
 {{ Form::text('title', $post->title ,['placeholder'=>'enter post title','class'=>'form-control'])}}
		</div>
<div class="form-group">
 {{ Form::label('body')}}
 {{ Form::textarea('body', $post->body ,['placeholder'=>'enter post body','class'=>'form-control ckeditor'])}}
		</div>

<div class='form-group pull-right'>
{{Form::submit('Update',['class'=>'btn btn-primary'])}}
</div>


{!!Form::close()!!}
@endsection