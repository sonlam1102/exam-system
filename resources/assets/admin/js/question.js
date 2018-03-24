$(document).ready(function() {
	var content = "<div class='form-group'>" + 
				  "<label class='col-sm-2 control-label'>Question</label>" +
				  "<input class='form-control question' type='text'>" +
				  "</div>" +
				  "<div class='form-group'>" + 
				  "<label class='col-sm-2 control-label'>Answers</label>" +
				  "<input class='form-control answer[] type='text'> " + 
				  "<input class='form-control answer[] type='text' >" + 
				  "<input class='form-control answer[] type='text' >" + 
				  "<input class='form-control answer[] type='text' >" +
				  "</div>";
	$('#add_new_question').click(function() {
		$('#question_field').append(content);
	});
});