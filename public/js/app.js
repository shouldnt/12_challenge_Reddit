
var tempID;

$('#link-list').find('button[name="edit-link"]').on('click', function() {
	tempID = $(this).parents('tr').attr("id");
	$.ajax({
		method:"get",
		url: "/links/" + tempID
	}).done(function(link) {
		var title = link.title;
		var link = link.link;
		$('#m-title').val(title);
		$('#m-link').val(link);
	});
});

$('#link-list').find('button[name=delete-link]').on('click', function() {
	tempID = $(this).parents('tr').attr("id");
	var token = $('input[name="_token"]').val();
	$.ajax({
		method: "delete",
		url: "/links/" + tempID,
		data: {_token: token, _method: "delete"}
	}).done(function(data) {
		$("#"+String(tempID)).remove();
	}).fail(function() {
		alert('fail');
	});

})

$('#m-u-link').click(function(e) {
	e.preventDefault();
	var title = $('#m-title').val();
	var link = $('#m-link').val();
	var token = $('input[name="_token"]').val();
	$.ajax({
		method: "patch",
		url: "links/" + tempID,
		data: {"title" : title, "link" : link, _token : token, _method: "patch" }
	}).done(function (link) {
		$('#notification').addClass('alert-success');
		$('#notification').removeClass('alert-warning');
		$('#notification').text('Success');
		console.log(link);

		var row = '<tr id="'+ link.id +'">';
		row += '<td class="col-md-2">'+ link.title +'</td>';
		row += '<td class="col-md-8">'+ link.link +'</td>';
		row += '<td class="col-md-4">';
		row += '<button class="btn btn-primary" name="edit-link" data-toggle="modal" data-target="#mymodal">';
		row += '<i class="fa fa-btn fa-pencil"></i>Edit';
		row += '</button>';
		row += '<button class="btn btn-danger" name="delete-link"  >';
		row += '<i class="fa fa-btn fa-trash"></i>Delete';
		row += '</button>';
		row += '</td>';
		row += '</tr>';

		$('#'+tempID).replaceWith(row);		

	}).fail(function( jqXHR, textStatus, errorThrown) {
		console.log(jqXHR, textStatus, errorThrown);
		$('#notification').addClass('alert-warning');
		$('#notification').removeClass('alert-success');
		$('#notification').text('Fail');
	});
});