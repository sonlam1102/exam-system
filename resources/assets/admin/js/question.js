$(document).ready(function() {

	$('#add_new_question').click(function() {
		$('#question_field').append(questionPackGenerate());
	});

	$("#question-form").submit(function(e) {
		var data = [],
		actionLink = $(this).attr('action'),
		i = 0;
		e.preventDefault();
	    $('.question_pack').each(function(key, value) {
	    	data[i] = packedQuestion($(this));
	    	i++;
	    });

		// data = data + $(this).serialize();
		// console.log($('#token').val());

		$.ajax({
		  type: "POST",
		  url: actionLink,
		  data: { '_token': $('#token').val(), 'data' : data },
		  success: function(){
		  	location.reload();
		  },
		});
	});
});
function packedQuestion(objectQuestion)
{
	var question = objectQuestion.find('.question'),
	answerObj = objectQuestion.find('.answers_group'),
	answer_list = [],
	j = 0,
	json_array = {};

	answerObj.each(function(key, value) {
	    answer_list[j] = packedAnswer($(this));
	   	j++;
	});
	json_array = {
	    "question" : question.val(),
	    "answer" : answer_list,
	}
	return json_array;
}
function packedAnswer(objAnswer)
{
	var json_array = {
		'answer_content' : objAnswer.find('.answer').val(),
		'right_answer' : objAnswer.find('.right-answer').is(':checked'),
	};
	return json_array;
}
function questionPackGenerate()
{
	var content = "<div class='form-group question_pack'>" + 
				  "<label class='col-sm-2 control-label'>Question</label>" +
				  "<input class='form-control question' type='text'>" +
				  "<label class='col-sm-2 control-label'>Answers</label>" +
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text'> " + 
				  "</div>" +
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" +
				  "</div>";
	return content;
}