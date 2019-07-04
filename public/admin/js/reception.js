$(function () {
    $('body').on('click', '.change_month', function () {
        let id_month = $(this).data('id_month');
        $.ajax({
            type: 'POST',
            url: 'reception',
            dataType: 'json',
            data: {id_month: id_month},
            success: function (data) {
                if (data.status) {
                    $('#calendar-content').replaceWith(data.content);
                    $('html,body').animate({scrollTop: $('#calendar-index').offset().top - 150}, 500);
                }
            }
        })
    });

    $('body').on('change', '.change_is_payed', function () {
        let status = $(this).data('status');
        let id_reception = $(this).data('id_reception');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'change-payed-status',
            data: {status: status, id_reception: id_reception},
            success: function (data) {
                if (data.status)
                    showAlert(data.content);
                else
                    showAlert(data.content, 'error');
            }
        });
    });
    $('body').on('click', '.concrete_cell', function () {
        let id_month = $(this).data('month');
        let id_day = $(this).data('day');
        let time = $(this).data('time');
        let office = $(this).data('office');
        let client = $(this).data('client');

        let cell_text = $(this).text();
        cell_text = 'Врач -' + cell_text + '. Клиент - ' + client + '.';
        $('#concrete_day_modal .modal-body').text(cell_text);

        let title = 'Запись на ' + id_day + '.' + id_month + ', ' + time + '. Офис ' + office;
        $('#concrete_day_modal .modal-title').text(title);

        let id_reception = $(this).data('id_reception');
        let newUrl = 'https://psylife.kiev.ua/admin/reception/' + id_reception;
        $('#edit_reception').attr("href", newUrl);

        $('#concrete_day_modal').modal('show');
    });
    $('body').on('click', '.concrete_cell_free', function () {
        let id_month = $(this).data('month');
        let id_day = $(this).data('day');
        let time = $(this).data('time');
        let office = $(this).data('office');
        let title = 'Запись на ' + id_day + '.' + id_month + ', ' + time + '. Офис ' + office;
        $('#concrete_day_modal_free .modal-title').text(title);

        cell_text = 'Записи нет на это время, создать?';
        $('#concrete_day_modal_free .modal-body').text(cell_text);

        $('#selected_time').val(time);
        $('#selected_office').val(office);
        $('#concrete_day_modal_free').modal('show');

    });
    // $('body').on('click', '#test', function () {
    //     let id_day = $(this).data('test');
    //     $.ajax({
    //         type: 'POST',
    //         dataType: 'json',
    //         url: 'reception/concrete-day-test',
    //         data: {day: id_day}
    //     });
    // });
    $('.create_reception_form').on('submit', function (e) {
        e.preventDefault();
        let time = $('#time').val();
        let day = $('#date').val();
        let client = $('#client').val();
        let new_client = $('#new_client').val();
        let employee = $('#employee').val();
        let office = $('#office').val();
        let is_payed = $('#is_payed').val();
        let id_reception = $('#id_reception').val();
        $.ajax({
            type: 'POST',
            url: 'create-new',
            dataType: 'json',
            data: {
                id_reception: id_reception,
                is_payed: is_payed,
                time: time,
                day: day,
                client: client,
                new_client: new_client,
                employee: employee,
                office: office
            },
            success: function (data) {
                if (data.status) {
                    location.href = data.content;
                } else
                    showAlert(data.content, 'error');
            }
        })
    });
});

// $('.edit_reception_form').on('submit', function (e) {
//     e.preventDefault();
//     let time = $('#time').val();
//     let day = $('#date').val();
//     let client = $('#client').val();
//     let new_client = $('#new_client').val();
//     let employee = $('#employee').val();
//     let is_payed = $('#is_payed').val();
//     let office = $('#office').val();
//     $.ajax({
//         type: 'POST',
//         dataType: 'json',
//         data: {time: time, is_payed: is_payed, day: day, client: client, new_client: new_client, employee: employee, office: office},
//         success: function (data) {
//             if (data.status) {
//                 // location.href = data.content;
//             } else
//                 showAlert(data.content, 'danger');
//         }
//     })
// });