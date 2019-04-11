$(function () {
    $('body').on('click', '#feedbackpaginator a', function (e) {
        e.preventDefault();
        // let params = $(this).data('params');
        let page = $(this).data('page');
        // getFeedback(params.id_status, page);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {page: page},
            success: function (data) {
                if (data.status) {
                    $('#feedback-content').replaceWith(data.content);
                    $('html,body').animate({scrollTop: $('#feedback-index').offset().top - 150}, 500);
                }
            }
        });
    });
    $('body').on('click', '#employeepaginator a', function (e) {
        e.preventDefault();
        // let params = $(this).data('params');
        let page = $(this).data('page');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {page: page},
            success: function (data) {
                if (data.status) {
                    $('#employee-content').replaceWith(data.content);
                    $('html,body').animate({scrollTop: $('#employee-index').offset().top - 150}, 500);
                }
            }
        });
    });
});