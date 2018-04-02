$(document).ready(function() {
	$('#form_submit').submit(function(e) {
		e.preventDefault();
		var data = [],
		i = 0,
		link = $(this).attr('action');

		$('.question_item').each(function() {
			data[i] = packedQuestion($(this));
			i++;
		});

		$.ajax({
			type: "POST",
			url: link,
			data: {'_token' : $('#token').val(), 'data' : data},
		  		success: function(){
		  			location.reload();
		  		},
		});
	});
});
function packedQuestion(objectQuestion)
{
	var answerObj = objectQuestion.find('.answers_group'),
	answer_id = '';

	answerObj.each(function(key, value) {
		if ($(this).find('.right-answer').is(':checked'))
			answer_id = $(this).find('.answer_id').val();
	});
	json_array = {
		"question_id" : objectQuestion.find('.question').val(),
		"answer_id" : answer_id
	};
	return json_array;
}