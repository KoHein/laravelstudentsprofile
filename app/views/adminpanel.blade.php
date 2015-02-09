@extends('layout')

@section('content')

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
{{ HTML::script('js/bootstrap.min.js') }}

<body style="background:#27872E">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center" style="color:#FFF">Students Profile</h2><a href="{{ action('AdminController@getLogout') }}" class="btn">Logout</a>
				<hr style="height:5px;background:gray">
			</div>
		</div>
		
		<div class="row">
		@foreach($keke as $user)					

			<div class="col-sm-6 col-md-3">
				
					<div class="thumbnail" style="background-color:#CFCFCF">
						<div style="height:250px;overflow:hidden">
							<img style="height:250px; width:250px" src="../uploads/{{$user->photo}}" alt="Your Photo Not Found">
						</div>
						<div class="caption">
						</div>
					</div>
				</a>
			</div>
		<h2>{{ $user->username }}</h2>
        <p>{{ $user->email }}</p>

		<a href="approve/{{$user->id}}" class="btn">Approve</a>
		<a href="delete/{{$user->id}}" class="btn">Delete</a>
		<a href="addskill/{{$user->id}}" class="btn">AddSkills</a>

		</div>
	</div>
</body>
</html>
@endforeach
@stop