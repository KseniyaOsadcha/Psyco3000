$(function () {
    $('body').on('click', '#news_paginator a', function (e) {
        e.preventDefault();
        let page = $(this).data('page');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {page: page},
            success: function (data) {
                if (data.status) {
                    $('#news-index').replaceWith(data.content);
                    $('html,body').animate({scrollTop: $('#news-index').offset().top - 150}, 500);
                }
            }
        });
    });
    $('body').on('click', '#feedbackpaginator a', function (e) {
        e.preventDefault();
        let params = $(this).data('params');
        let page = $(this).data('page');
        getFeedback(params.id_status, page);
    });

    $('body').on('change','#feedback-status', function (e) {
        e.preventDefault();
        let id_status = $(this).val();
        getFeedback(id_status);
    });
    $('body').on('click', '#receptionpaginator a', function (e) {
        e.preventDefault();
        let params = $(this).data('params');
        let page = $(this).data('page');
        getReception(params, page);
    });
    $('#reception-filter').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        getReceptionFilter(data);
    });
    $('body').on('click', '#clientpaginator a', function (e) {
        e.preventDefault();
        let params = $(this).data('params');
        let page = $(this).data('page');
        getClient(params.order, page);
    });
    $('body').on('change','#client-filter', function (e) {
        e.preventDefault();
        let order = $(this).val();
        getClient(order);
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
function getFeedback(id_status, page=1) {
    $.ajax({
        type: 'POST',
        url: 'feedback/filter',
        dataType: 'json',
        data: {id_status: id_status, page: page},
        success: function (data) {
            if (data.status) {
                $('#feedback-content').replaceWith(data.content);
                $('html,body').animate({scrollTop: $('#feedback-index').offset().top - 150}, 500);
            }
        }
    });
}

function getClient(order, page=1) {
    $.ajax({
        type: 'POST',
        url: 'clients/filter',
        dataType: 'json',
        data: {order: order, page: page},
        success: function (data) {
            if (data.status) {
                $('#client-content').replaceWith(data.content);
                $('html,body').animate({scrollTop: $('#client-index').offset().top - 150}, 500);
            }
        }
    });
}
function getReception(params, page=1) {
    $.ajax({
        type: 'POST',
        url: 'filter',
        dataType: 'json',
        data: {employee : params.employee, office : params.office, date : params.date, time : params.time, client : params.client, is_payed : params.is_payed, page: page},
        success: function (data) {
            if (data.status) {
                $('#reception-content').replaceWith(data.content);
                $('html,body').animate({scrollTop: $('#reception-index').offset().top - 150}, 500);
            }
        }
    });
}

function getReceptionFilter(params) {
    $.ajax({
        type: 'POST',
        url: 'filter',
        dataType: 'json',
        data:  params,
        success: function (data) {
            if (data.status) {
                $('#reception-content').replaceWith(data.content);
                $('html,body').animate({scrollTop: $('#reception-index').offset().top - 150}, 500);
            }
        }
    });
}