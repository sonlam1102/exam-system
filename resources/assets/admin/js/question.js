$(document).ready(function() {
	var content = "<div class='form-group question_pack'>" + 
				  "<label class='col-sm-2 control-label'>Question</label>" +
				  "<input class='form-control question' type='text'>" +
				  "<div class='form-group answers_group'>" + 
				  "<label class='col-sm-2 control-label'>Answers</label>" +
				  "<input class='form-control answer type='text'> " + 
				  "<input class='form-control answer type='text' >" + 
				  "<input class='form-control answer type='text' >" + 
				  "<input class='form-control answer type='text' >" +
				  "</div>" +
				  "</div>";
	$('#add_new_question').click(function() {
		$('#question_field').append(content);
	});
	$("#question-form").submit(function(e) {
		var array = [],
		i = 0;
		e.preventDefault();
	    $('.question_pack').each(function(key, value){
	    	var answer = $(this).find('.answers_group');
	    });
	});
});