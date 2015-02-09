@extends('layout')

@section('content')
@foreach ($member as $data)


<h1>{{$data->username;}}</h1>
<h2>{{$data->email;}}</h2>

{{ Form::open(['controller' => 'AdminController@postAddskill','class' => 'form-horizontal','files'=> 'true']) }}
		<div class="form-group">
			{{ Form::label('webdesign', 'Web Design', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('webdesign',$count	)}}
		</div>

		<div class="form-group">
			{{ Form::label('graphicdesign', 'Graphic Design', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('graphicdesign',$count	)}}
		</div>

		<div class="form-group">
			{{ Form::label('branding', 'Branding', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('branding',$count	)}}
		</div>

		<div class="form-group">
			{{ Form::label('d3model', '3D Model', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('d3model',$count	)}}
		</div>
		
		<div class="form-group">
			{{ Form::label('illustration', 'Illustration', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('illustration',$count	)}}
		</div>

		<div class="form-group">
			{{ Form::label('photography', 'Photography', ['class' => 'col-lg-2 control-label']);}}
			{{Form::select('photography',$count	)}}
		</div>
			{{ Form::hidden('id' ,$data->id)}}
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('UpdateSkills', ['class' => 'btn'])}}
			</div>
		</div>

		
		
		{{ Form::close() }}

@endforeach
@stop