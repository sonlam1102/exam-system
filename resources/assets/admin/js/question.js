$(document).ready(function() {

	$('#add_new_question').click(function() {
		$('#question_field').append(questionPackGenerate());
	});

	$("#question-form").submit(function(e) {
		var data = [],
		i = 0;
		e.preventDefault();
	    $('.question_pack').each(function(key, value) {
	    	data[i] = packedQuestion($(this));
	    	i++;
	    });
		console.log(data);
	});
});
function packedQuestion(objectQuestion)
{
	var question = objectQuestion.find('.question'),
	answerObj = objectQuestion.find('.answers_group'),
	answer_list = [],
	j = 0
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
		'right-answer' : objAnswer.find('.right-answer').is(':checked'),
	};
	return json_array;
}
function questionPackGenerate()
{
	var content = "<div class='form-group question_pack'>" + 
				  "<label class='col-sm-2 control-label'>Question</label>" +
				  "<input class='form-control question' type='text'>" +
				  "<div class='form-group answers_group'>" + 
				  "<label class='col-sm-2 control-label'>Answers</label>" +
				  "<div class='input-group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text'> " + 
				  "</div>" +
				  "<div class='input-group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group'>" +
				  "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "</div>" +
				  "</div>";
	return content;
}