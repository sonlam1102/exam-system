$(document).ready(function() {
	$('#submit').click(function() {
		var data = [],
		i = 0;
		$('.question_item').each(function() {
			data[i] = packedQuestion($(this));
			i++;
		});
		console.log(data);
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