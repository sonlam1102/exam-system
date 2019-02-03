<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('#form_submit').submit(function (e) {
            e.preventDefault();
            var data = [],
                i = 0,
                link = $(this).attr('action');

            $('.question_item').each(function () {
                data[i] = packedQuestion($(this));
                i++;
            });

            $.ajax({
                type: "POST",
                url: link,
                data: {'_token': $('#token').val(), 'data': data},
                success: function () {
                    location.href = '/user/contest';
                },
            });
        });
    });

    function packedQuestion(objectQuestion) {
        var answerObj = objectQuestion.find('.answers_group'),
            answer_id = '';

        answerObj.each(function (key, value) {
            if ($(this).find('.right-answer').is(':checked'))
                answer_id = $(this).find('.answer_id').val();
        });
        json_array = {
            "question_id": objectQuestion.find('.question').val(),
            "answer_id": answer_id
        };
        return json_array;
    }
</script>