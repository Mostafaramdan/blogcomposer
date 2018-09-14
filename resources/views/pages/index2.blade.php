@extends('pages.index')
		@section('c')
	<h1>hi</h1>	
		<h2>contact us</h2>
		<hr>
<form action="">
<div class="form-group">
	<label for="name">name </label>
	<input type=text class="form-control" name="name">
	</div>
	
	<div class="form-group">
	<label for="name">email</label>
	<input type="text" class="form-control" name="email"
	</div>

<div class="form-group pull-right">
<button class="btn btn-info">send</button>		
		</div>




</form>
		@endsection
