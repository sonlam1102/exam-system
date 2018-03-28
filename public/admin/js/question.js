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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(1);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(document).ready(function () {

	$('#add_new_question').click(function () {
		$('#question_field').append(questionPackGenerate());
	});

	$("#question-form").submit(function (e) {
		var data = [],
		    i = 0;
		e.preventDefault();
		$('.question_pack').each(function (key, value) {
			data[i] = packedQuestion($(this));
			i++;
		});

		// data = data + $(this).serialize();
		// console.log($('#token').val());

		$.ajax({
			type: "POST",
			url: '',
			data: { '_token': $('#token').val(), 'data': data },
			success: function success() {}
		});
	});
});
function packedQuestion(objectQuestion) {
	var question = objectQuestion.find('.question'),
	    answerObj = objectQuestion.find('.answers_group'),
	    answer_list = [],
	    j = 0,
	    json_array = {};

	answerObj.each(function (key, value) {
		answer_list[j] = packedAnswer($(this));
		j++;
	});
	json_array = {
		"question": question.val(),
		"answer": answer_list
	};
	return json_array;
}
function packedAnswer(objAnswer) {
	var json_array = {
		'answer_content': objAnswer.find('.answer').val(),
		'right-answer': objAnswer.find('.right-answer').is(':checked')
	};
	return json_array;
}
function questionPackGenerate() {
	var content = "<div class='form-group question_pack'>" + "<label class='col-sm-2 control-label'>Question</label>" + "<input class='form-control question' type='text'>" + "<label class='col-sm-2 control-label'>Answers</label>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + "<input class='form-control answer type='text'> " + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + "<input class='form-control answer type='text' >" + "</div>" + "<div class='input-group answers_group'>" + "<input class='input-group-addon flat-red right-answer' type='checkbox'>" + "<input class='form-control answer type='text' >" + "</div>" + "</div>";
	return content;
}

/***/ })
/******/ ]);