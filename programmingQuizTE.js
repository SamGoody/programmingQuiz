function removeNavigation(){
		
	$j.ajax("programmingQuizTEAJAX.php", { 
		data: {
			action  		: 'remove_navigation',
			remove_id     	: $j('#remove-id').val()
		},
		dataType: "json",
		type: "POST",
		success: function(returnObject) {
			alert('succesfully removed navigation');
		},
		error: function(){
			alert('something went wrong');
		}
	});
}

function addNavigation(){
	$j.ajax("programmingQuizTEAJAX.php", { 
		data: {
			action  		: 'add_navigation',
			parent_id     	: $j('#add-parent-id').val(),
			name			: $j('#add-name').val(),
			url			: $j('#add-url').val()
		},
		dataType: "json",
		type: "POST",
		success: function(returnObject) {
			alert('succesfully added navigation');
		},
		error: function(){
			alert('something went wrong');
		}
	});
}
