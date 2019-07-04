$(function () {
    $('body').on('click', '.change-status', function () {
        let id_feedback = $(this).data('id_feedback');
        let id_status = $(this).data('id_status');
        $.ajax({
            type: 'POST',
            url: 'feedback/update-status',
            dataType: 'json',
            data: {id_status: id_status, id_feedback: id_feedback},
            success: function (data) {
                if (data.status)
                    showAlert(data.message);
                else
                    showAlert(data.message, 'error');
            }
        })
    });
});