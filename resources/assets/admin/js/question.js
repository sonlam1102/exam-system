$(document).ready(function() {
	var num = 0;
	$('#add_new_question').click(function() {
		$('#question_field').append(questionPackGenerate(num));
		num++;
	});

	$('.delete_question #delete').click(function() {
		var id = $(this).data('qid'),
		data = {},
		link = "/admin/contest/delete/";

		data = {
			'_token': $('.delete_question #token').val(),
			'_method' :$('.delete_question #method').val()
		};

		link = link + $.trim(id) + "/question";
		
		$.ajax({
		  type: "POST",
		  url: link,
		  data: data,
		  success: function(){
		  	location.reload();
		  },
		});
	});

	$("#question-form").submit(function(e) {
		var data = []
		dataUpdate = [],
		actionLink = $(this).attr('action'),
		i = 0,
		j = 0;
		e.preventDefault();

	    $('.question_pack').each(function(key, value) {
	    	data[i] = packedQuestion($(this));
	    	i++;
	    });
	    $('.question_item').each(function(key, value) {
	    	dataUpdate[j] = packedQuestion($(this), 1);
	    	j++;
	    });

		$.ajax({
		  type: "POST",
		  url: actionLink,
		  data: { '_token': $('#token').val(), 'data' : data, 'update' :  dataUpdate},
		  success: function(){
		  	location.reload();
		  },
		});

	});
});
function packedQuestion(objectQuestion, update = 0)
{
	var answerObj = objectQuestion.find('.answers_group'),
	answer_list = [],
	j = 0,
	json_array = {};

	if (update == 1) {
		answerObj.each(function(key, value) {
		    answer_list[j] = packedAnswer($(this), update);
		   	j++;
		});
		json_array = {
			"id" : objectQuestion.find('.question_id').val(),
		    "question" : objectQuestion.find('.question').val(),
		    "answer" : answer_list,
		};
	} else {
		answerObj.each(function(key, value) {
		    answer_list[j] = packedAnswer($(this), update);
		   	j++;
		});
		json_array = {
		    "question" : objectQuestion.find('.question').val(),
		    "answer" : answer_list,
		};
	}

	return json_array;
}
function packedAnswer(objAnswer, update = 0)
{
	var json_array = {};
	if (update == 1) {
		json_array = {
			'id' : objAnswer.find('.answer_id').val(),
			'answer_content' : objAnswer.find('.answer').val(),
			'right_answer' : objAnswer.find('.right-answer').is(':checked'),
		};
	} else {
		json_array = {
			'answer_content' : objAnswer.find('.answer').val(),
			'right_answer' : objAnswer.find('.right-answer').is(':checked'),
		};
	}
	return json_array;
}
function questionPackGenerate(i = 0)
{
	var content = "<div class='form-group question_pack'>" + 
				  "<label class='col-sm-2 control-label'>Question</label>" +
				  "<input class='form-control question' type='text'>" +
				  "<label class='col-sm-2 control-label'>Answers</label>" +
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" + 
				  "<input class='form-control answer type='text'> " + 
				  "</div>" +
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" + 
				  "<div class='input-group answers_group'>" +
				  "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" + 
				  "<input class='form-control answer type='text' >" + 
				  "</div>" +
				  "</div>";
	return content;
}