<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href='{{asset("css/app.css")}}' type="text/css">
		<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
		
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		
		
		
		
		
		
		
		
		
		
        <title>{{config('app.name','my sites')}}</title>
	</head>
	<body>
		
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
	  	<div class="container">	

    <div class="navbar-header active">
      <a class="navbar-brand"  href="/post">EL MOSTAFA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/post">posts</a></li>
      <li class="active"><a href="/post/create">create new post</a></li>
      <li class="active"><a href="/post">about</a></li>
      <li class="active"><a href="/contactUs">contact us</a></li>
		<li style="margin-left:5px"><div class="input-group" style="margin-top:5px">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
		</li>
    </ul>
		     <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
				 
                            <li class="dropdown">
                                <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
									<li><a href='/post/create'> <i class="fa fa-plus"></i> &nbsp;write post</a></li>
									<li ><a href="{{ route('home') }}"><i class="fa fa-eye"></i> &nbsp;show your post</a></li>
									<li ><a href="{{ route('home') }}"><i class="fa fa-user"></i> &nbsp;admin</a></li>
									<li class="devider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-arrow-left"></i> &nbsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
			</div>

  		  </div>

  		</nav>

		
		
		
		

		
<div class="container" style="margin-top:80px">
			@include('pages.flash')
		@yield('c')
			@yield('post')
<script scr="{{asset('js/app.js')}}"></script>
</div>
			</body>
</html>