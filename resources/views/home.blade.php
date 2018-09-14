@extends('pages.index')
@section('c')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
				<div class="btn-group pull-right"> <a class="btn btn-default btn-sm" href="/post/create"><i class="fa fa-plus"></i> &nbsp;add new post</a> </div>
				</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<h3>your posts</h3>        
			<table class="table table-striped">
				<thead>
				    	<tr> 
					<th>Title </th>
					<th>Created </th>
					<th>last update </th>
					<th>edit </th>
					<th>delete </th>
						</tr>
					</thead>
				<tbody>

                @foreach($post as $p)
				<tr>
					<td>
					{{$p->title}}
					</td>
					<td>
					{{$p->created_at}}
					</td>
					<td>
					{{$p->updated_at}}
					</td>
					
					<td>
												
						<a  href="/post/{{$p->id}}/edit" class="btn btn-primary" > edit</a></td>
					<td>

								
         <button class="btn btn-danger " type='submit' data-toggle="modal" data-target="#myModal" ><i class="fas fa-trash-alt"></i> delete post</button>
					<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>DELETE &nbsp;<i class="fa fa-trash"></i></strong>
          <button type="button" class="close btn-lg" data-dismiss="modal">&times;</button>
			  </h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			do you want to delete this post    &nbsp; <i class="fa fa-question"></i>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
			{!!	Form::open(['action'=>['postcontroller@destroy',$p->id] ,'method'=>'POST']) !!}
	{{Form::hidden('_method','DELETE')}}
          <button type="submit" class="btn btn-danger" >delete</button>
					{!!Form::close()!!}
</div>
		</div>
								 </div>
	{!!Form::close()!!}
						</div>	</td>
				
@endforeach
		
					
						</tr>
				</tbody>		
					
					</table>	
				
				</div>
            </div>
        </div>
    </div>
</div>


@endsection
