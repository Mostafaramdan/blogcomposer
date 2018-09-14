@extends('pages.index')
@section('c') 
<div><h1 class="container"><a href="/post" class="btn btn-primary"> back</a></h1>
</div>
<h1>add new post	</h1>
<hr>

{!! Form::open(['action'=>'postcontroller@store','method'=>'POST']) !!}
<div class="form-group">`
 {{ Form::label('Title')}}
 {{ Form::text('title', ' ' ,['placeholder'=>'enter post title','class'=>'form-control'])}}
		</div>
<div class="form-group">
 {{ Form::label('body')}}
 {{ Form::textarea('body', ' ' ,['placeholder'=>'enter post post','class'=>'form-control ckeditor'])}}
		</div>

<div class='form-group pull-right'>
{{Form::submit('share',['class'=>'btn btn-primary'])}}
</div>


{!!Form::close()!!}
@endsection