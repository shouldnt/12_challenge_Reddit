@extends('layouts.app')
@section('content')
		
	<div class="container">
		<a href="/links" class="btn btn-default">Back</a>
		<br><br>
	
		@include('common.errors')

		<form action="/links/{{$link->id}}" method="post">
			{{csrf_field()}}
			{{method_field('patch')}}
			<div class="form-group row">
				<div class="col-md-1">
					<label for="">Title:</label>
				</div>
				<div class="col-md-10">
					<input class="form-control" type="text" value="{{$link->title}}" name="title">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-1">
					<label for="">Link:</label>
				</div>
				<div class="col-md-10">
					<input class="form-control" type="text" value="{{$link->link}}" name="link">
				</div>
			</div>

			<button class="btn btn-primary" type="submit">Save Changes</button>

		</form>

	</div>

@stop