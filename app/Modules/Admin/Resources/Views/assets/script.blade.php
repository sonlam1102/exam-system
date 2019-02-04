<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wysihtml5/0.3.0/wysihtml5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/demo.js"></script>
<script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/amd/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#startdate').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },
            singleDatePicker: true,
            "startDate": $('#startdate').data('date'),
            showDropdowns: true,

        });
    });
</script>

<script>
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

        $('.question_image #upload').click(function () {
            let id = $(this).data('qid'),
                token = $('.question_image #token').val(),
                link = "/admin/contest/" + $.trim(id) + "/question/image";


            let file_data = $("#quest_image"+id).prop('files')[0];
            let form = new FormData();

            form.append("question_img", file_data);
            form.append("_token", token);


            $.ajax({
                type: "POST",
                url: link,
                data: form,
                processData: false,
                contentType: false,
                success: function () {
                    location.reload();
                },
            });
        });

        $('.answer_image #upload').click(function () {
            let id = $(this).data('qid'),
                token = $('.answer_image #token').val(),
                link = "/admin/contest/" + $.trim(id) + "/answer/image";


            let file_data = $("#answ_image"+id).prop('files')[0];
            let form = new FormData();

            form.append("answer_img", file_data);
            form.append("_token", token);


            $.ajax({
                type: "POST",
                url: link,
                data: form,
                processData: false,
                contentType: false,
                success: function () {
                    location.reload();
                },
            });
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
                success: function () {
                    location.reload();
                },
            });
        });

        $("#question-form").submit(function (e) {
            var data = []
            dataUpdate = [],
                actionLink = $(this).attr('action')
            submit = {},
                i = 0,
                j = 0;
            e.preventDefault();

            $('.question_pack').each(function (key, value) {
                data[i] = packedQuestion($(this));
                i++;
            });
            $('.question_item').each(function (key, value) {
                dataUpdate[j] = packedQuestion($(this), 1);
                j++;
            });
            if ($('.question_pack').length > 0)
                submit = {'_token': $('#token').val(), 'data': data};
            else
                submit = {'_token': $('#token').val(), 'update': dataUpdate};

            $.ajax({
                type: "POST",
                url: actionLink,
                data: submit,
                success: function () {
                    location.reload();
                },
            });

        });
    });

    function packedQuestion(objectQuestion, update = 0) {
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
                "answer": answer_list,
            };
        } else {
            answerObj.each(function (key, value) {
                answer_list[j] = packedAnswer($(this), update);
                j++;
            });
            if ($.trim(objectQuestion.find('.big_question_id').val()) != "undefined"
                && $.trim(objectQuestion.find('.big_question_id').val()) != "") {
                json_array = {
                    "question": objectQuestion.find('.question').val(),
                    "answer": answer_list,
                    "big_question_id": $.trim(objectQuestion.find('.big_question_id').val())
                };
            } else {
                json_array = {
                    "question": objectQuestion.find('.question').val(),
                    "answer": answer_list,
                };
            }
        }
        if (objectQuestion.parent().attr('class') == 'big_question')
            json_array['big_question'] = 'true';
        return json_array;
    }

    function packedAnswer(objAnswer, update = 0) {
        var json_array = {};
        if (update == 1) {
            json_array = {
                'id': objAnswer.find('.answer_id').val(),
                'answer_content': objAnswer.find('.answer').val(),
                'right_answer': objAnswer.find('.right-answer').is(':checked'),
            };
        } else {
            json_array = {
                'answer_content': objAnswer.find('.answer').val(),
                'right_answer': objAnswer.find('.right-answer').is(':checked'),
            };
        }
        return json_array;
    }

    function questionPackGenerate(i = 0) {
        var content = "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Question</label>" +
            "<textarea class='form-control question'></textarea>" +
            "<label class='col-sm-2 control-label'>Answers</label>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text'> " +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "</div>";
        return content;
    }

    function bigQuestionGenerate() {
        var content = "<div class='big_question'>" +
            "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Big Question</label>" +
            "<textarea class='form-control question'></textarea>" +
            "</div>" +
            "<a href='javascript:void(0)' id='add_new_subquestion'>Add 1 sub question question</a>" +
            "</div>";
        return content;
    }

    function subQuestionPackGenerate(i = 0, big_question_id) {
        var content = "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Question (Reference Big question #" + big_question_id + ")</label>" +
            "<input class='form-control big_question_id' type='text' value=\" " + big_question_id + " \" hidden >" +
            "<textarea class='form-control question'></textarea>" +
            "<label class='col-sm-2 control-label'>Answers</label>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text'> " +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i + "' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "</div>";
        return content;
    }
</script>