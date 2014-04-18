
// function delete_row(row_id)
// {
// 	$.ajax(
// 	{
// 		url: "brishi_zapis.php",
// 		type: 'POST',
// 		data: { id: row_id },

// 	}
// 			)
// 	.done(function( msg ) {
// 		// alert(msg);
// 	$('#row_'+row_id).remove();
// 	});
// }

function delete_row(row_id) {
	$.post('/it-server/public/Home/brishi_zapis.php',
			{id: row_id},
			function(o) {
				console.log(o);
			}

		);

}
											  
