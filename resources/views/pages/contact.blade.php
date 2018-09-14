@extends('pages.index')
@section('c') 
<h1>contact us	</h1>
<hr>



{!! Form::open(['action'=>'contactUscontroller@dosend','method'=>'POST']) !!}
<div class="form-group">`
 {{ Form::label('name')}}
 {{ Form::text('name', '' ,['placeholder'=>'enter your name','class'=>'form-control'])}}
		</div>
<div class="form-group">
 {{ Form::label('Email')}}
 {{ Form::text('email', '' ,['placeholder'=>'enter your Email','class'=>'form-control'])}}
		</div>
<div class="form-group">
 {{ Form::label('subject')}}
 {{ Form::textarea('subject', '' ,['placeholder'=>'enter your message','class'=>'form-control'])}}
		</div>

<div class='form-group pull-right'>
{{Form::submit('send',['class'=>'btn btn-primary'])}}
</div>


{!!Form::close()!!}
@endsection