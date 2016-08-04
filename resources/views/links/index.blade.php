@extends('layouts.app')

@section('content')
	<!-- from to create new link -->

	<div class="container">

		@include('common.errors')
		<form class="" action="/link/create" method="post">
			{{csrf_field()}}
			<div class="col-md-12">
				<div class="form-group row">
					<label class="control-label col-sm-2">Title:</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="title">
					</div>					
				</div>
				
				<div class="form-group row">
					<label class="control-label col-sm-2">Link:</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="link">						
					</div>
				</div>
			</div>
			
			<button class="btn btn-primary btn-block"><i class="fa fa-plus"> </i> Add</button>

		</form>		

		<h3>All Links</h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-md-2">Title</th>
					<th class="col-md-2">Link</th>
					<th class="col-md-2">Button</th>
				</tr>
			</thead>
			<tbody id="link-list">
				@if(count($links) > 0)
					@foreach($links as $link)
						<tr id="{{$link->id}}">
							<td class="col-md-2">{{$link->title}}</td>
							<td class="col-md-8">{{$link->link}}</td>
							<td class="col-md-4">
								<button class="btn btn-primary" name="edit-link" data-toggle="modal" data-target="#mymodal">
									<i class="fa fa-btn fa-pencil"></i>Edit
								</button>
								<button class="btn btn-danger" name="delete-link"  >
									<i class="fa fa-btn fa-trash"></i>Delete
								</button>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
		
		@include('links.modals.linkModal')

	</div>


@stop