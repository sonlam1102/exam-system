/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 42);
/******/ })
/************************************************************************/
/******/ ({

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(43);


/***/ }),

/***/ 43:
/***/ (function(module, exports) {

$(document).ready(function () {
	var num = 0;
	$('#add_new_question').click(function () {
		$('#question_field').append(questionPackGenerate(num));
		num++;
	});

	$('#add_new_big_question').click(function () {
		$('#question_field').append(bigQuestionGenerate());
		$('.big_question #add_new_subquestion').on("click", function () {
			$(this).parent().append(questionPackGenerate(num));
			num++;
		});
	});

	$('.add_one_new_subquestion').click(function () {
		var big_question = $(this).parent().find('.big_question').val();
		$('#question_field').append(subQuestionPackGenerate(num, big_question));
		num++;
	});

	$('.delete_question #delete').click(function () {
		var id = $(this).data('qid'),
		    data = {},
		    link = "/admin/contest/delete/";

		data = {
			'_token': $('.delete_question #token').val(),
			'_method': $('.delete_question #method').val()
		};

		link = link + $.trim(id) + "/question";

		$.ajax({
			type: "POST",
			url: link,
			data: data,
			success: function success() {
				location.reload();
			}
		});
	});

	$("#question-form").submit(function (e) {
		var data = [];
		dataUpdate = [], actionLink = $(this).attr('action');
		submit = {}, i = 0, j = 0;
		e.preventDefault();

		$('.question_pack').each(function (key, value) {
			data[i] = packedQuestion($(this));
			i++;
		});
		$('.question_item').each(function (key, value) {
			dataUpdate[j] = packedQuestion($(this), 1);
			j++;
		});
		if ($('.question_pack').length > 0) submit = { '_token': $('#token').val(), 'data': data };else submit = { '_token': $('#token').val(), 'update': dataUpdate };

		$.ajax({
			type: "POST",
			url: actionLink,
			data: submit,
			success: function success() {
				location.reload();
			}
		});
	});
});
function packedQuestion(objectQuestion) {
	var update = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

	var answerObj = objectQuestion.find('.answers_group'),
	    answer_list = [],
	    j = 0,
	    json_array = {};

	if (update == 1) {
		answerObj.each(function (key, value) {
			answer_list[j] = packedAnswer($(this), update);
			j++;
		});
		json_array = {
			"id": objectQuestion.find('.question_id').val(),
			"question": objectQuestion.find('.question').val(),
			"answer": answer_list
		};
	} else {
		answerObj.each(function (key, value) {
			answer_list[j] = packedAnswer($(this), update);
			j++;
		});
		if ($.trim(objectQuestion.find('.big_question_id').val()) != "undefined" && $.trim(objectQuestion.find('.big_question_id').val()) != "") {
			json_array = {
				"question": objectQuestion.find('.question').val(),
				"answer": answer_list,
				"big_question_id": $.trim(objectQuestion.find('.big_question_id').val())
			};
		} else {
			json_array = {
				"question": objectQuestion.find('.question').val(),
				"answer": answer_list
			};
		}
	}
	if (objectQuestion.parent().attr('class') == 'big_question') json_array['big_question'] = 'true';
	return json_array;
}
function packedAnswer(objAnswer) {
	var update = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

	var json_array = {};
	if (update == 1) {
		json_array = {
			'id': objAnswer.find('.answer_id').val(),
			'answer_content': objAnswer.find('.answer').val(),
			'right_answer': objAnswer.find('.right-answer').is(':checked')
		};
	} else {
		json_array = {
			'answer_content': objAnswer.find('.answer').val(),
			'right_answer': objAnswer.find('.right-answer').is(':checked')
		};
	}
	return json_array;
}
function questionPackGenerate() {
	var i = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;

	var content = "<div class='form-group question_pack'>" + "<label class='col-sm-2 control-label'>Question</label>" + "<textarea class='form-control question'></textarea>" + "<label class='col-sm-2 control-label'>Answers</label>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text'> " + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "</div>";
	return content;
}
function bigQuestionGenerate() {
	var content = "<div class='big_question'>" + "<div class='form-group question_pack'>" + "<label class='col-sm-2 control-label'>Big Question</label>" + "<textarea class='form-control question'></textarea>" + "</div>" + "<a href='javascript:void(0)' id='add_new_subquestion'>Add 1 sub question question</a>" + "</div>";
	return content;
}
function subQuestionPackGenerate() {
	var i = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
	var big_question_id = arguments[1];

	var content = "<div class='form-group question_pack'>" + "<label class='col-sm-2 control-label'>Question</label>" + "<input class='form-control big_question_id' type='text' value=\" " + big_question_id + " \" hidden >" + "<textarea class='form-control question'></textarea>" + "<label class='col-sm-2 control-label'>Answers</label>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text'> " + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" + "<input class='form-control answer type='text' >" + "</div>" + "</div>";
	return content;
}

/***/ })

/******/ });