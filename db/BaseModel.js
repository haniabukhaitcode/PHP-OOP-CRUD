$(document).ready(function() {
	showTable();

	//add
	$('#add').click(function() {
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});

	$('#addbutton').click(function() {
		var author = $('#author').val();

		if (author !== '') {
			var addForm = $('#addForm').serialize();
			$.ajax({
				type: 'POST',
				url: '../authors/create.php',
				data: addForm,
				success: function() {
					$('#addnew').modal('hide');
					$('#addForm')[0].reset();
					showTable();
					$('#alert').slideDown();
					$('#alerttext').text('Member Added Successfully');
				},
			});
		} else {
			alert('Please input both Fields');
		}
	});
	//
	//edit
	$(document).on('click', '.edit', function() {
		var id = $(this).data('id');
		var author = $('#author' + id).text();
		$('#editID').modal('show');
		$('#editAuthor').val(author);
		$('#editButton').val(id);
	});

	$('#editButton').click(function() {
		var id = $(this).val();
		var editForm = $('#editForm').serialize();
		$.ajax({
			type: 'POST',
			url: '../authors/edit.php',
			data: editForm + '&id=' + id,
			success: function() {
				$('#editID').modal('hide');
				$('#editForm')[0].reset();
				showTable();
				$('#alert').slideDown();
				$('#alerttext').text('Member Updated Successfully');
			},
		});
	});
	//
	//delete
	$(document).on('click', '.delete', function() {
		var id = $(this).data('id');
		var author = $('#author' + id).text();
		$('#deleteID').modal('show');
		$('#deleteAuthor').text(author);
		$('#deleteButton').val(id);
	});

	$('#deleteButton').click(function() {
		var id = $(this).val();
		$.ajax({
			type: 'POST',
			url: '../authors/delete.php',
			data: {
				id: id,
			},
			success: function() {
				$('#deleteID').modal('hide');
				showTable();
				$('#alert').slideDown();
				$('#alerttext').text('Member Deleted Successfully');
			},
		});
	});
});

function showTable() {
	$.ajax({
		type: 'POST',
		url: 'handler.php',
		data: {
			handler: 1,
		},
		success: function(data) {
			$('#table').html(data);
		},
	});
}
