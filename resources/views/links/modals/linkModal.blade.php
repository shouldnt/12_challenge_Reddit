<div id="mymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Edit</h3>
			</div>
			<form action="/links/{link}" method="post">
					{{method_field("patch")}}
					{{csrf_field()}}	
				<div class="modal-body">
					<div class="row form-group">
						<div class="col-md-2">
							<label for="">Title:</label>
						</div>
						<di class="col-md-10">
							<input class="form-control" type="text" value="{{$link->title}}">
						</di>
					</div>
					<div class="row form-group">
						<div class="col-md-2">
							<label for="">Link:</label>
						</div>
						<div class="col-md-10">
							<input class="form-control" type="text" value="{{$link->link}}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary">Save changes</button>
					<button class="btn btn-danger" data-dismiss="modal" type="submit">Close</button>
				</div>				
			</form>
			
		</div>
	</div>
</div>