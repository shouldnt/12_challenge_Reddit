@extends('layouts.app')

@section('content')
	<!-- from to create new link -->

	<div class="container">

		@include('common.errors')
		<form class="" action="/link/create" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label>Title:
					<input type="text" name="title">
				</label>
			</div>
			
			<div class="form-group">
				<label>Link:
					<input type="text" name="link">
				</label>
			</div>
			<button class="btn btn-primary"><i class="fa fa-plus"> </i> Add</button>

		</form>		

		<h3>All Links</h3>
		<div class="row">
			<div class="col-md-2">Title</div>
			<div class="col-md-6">Link</div>
			<div class="col-md-2"></div>
			<div class="col-md-2"></div>

		</div>
		@foreach($links as $link)
			<div class="row">
				<div class="col-md-2">
					<input class="form-control" type="text" name="" value="{{$link->title}}" disabled>
				</div>
				<div class="col-md-6">
					<input class="form-control" type="text" name="" value="{{$link->link}}" disabled>
				</div>
				<div class=" col-md-4 row">
					<div class="col-xs-8">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Edit</button>	
						<a href="{{url("/links/" . $link->id)}}"><button class="btn btn-default">Edit</button></a>					
					</div>
					<div class="col-xs-4">
						<form action="/links/{{$link->id}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}					
						<button class="btn btn-danger"><i class="fa fa-btn fa-trash "></i> Delete</button>
					</form>
					</div>					
				</div>
				<br>
				<br>

				
			</div>
		@endforeach

		@include('links.modals.linkModal')

	</div>


@stop