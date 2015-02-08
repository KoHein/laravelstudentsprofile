@extends('layout')
@section('content')

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
{{ HTML::script('js/bootstrap.min.js') }}

<body style="background:#27872E">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center" style="color:#FFF">Students Profile</h2>
				<hr style="height:5px;background:gray">
			</div>
		</div>
		<div class="row">
			
			@foreach($keke as $user)
			<div class="col-sm-6 col-md-3">
				<a href="detail/{{$user->id}}" title="{{$user->username}}">
					<div class="thumbnail" style="background-color:#CFCFCF">
						<div style="height:250px;overflow:hidden">
							<img style="height:250px; width:250px" src="../uploads/{{$user->photo}}" alt="{{$user->username}}">
						</div>
						<div class="caption">
							<h3 class="text-center">{{$user->username}}</h3>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</body>
</html>
@stop