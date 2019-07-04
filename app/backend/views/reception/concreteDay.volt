<table class="table table-bordered calendar" id="calendar-content">
    <thead>
    <tr>
        <th scope="col" colspan="7" class="bg-light text-center">
            <a class="change_day"
               href="{{ url.get(['for' : 'reception-concrete-day', 'id_month' :  date('m', strtotime([day,'-1 day']|join(' ')))  , 'id_day': date('d', strtotime([day,'-1 day']|join(' ')))  ]) }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            {{ date('d.m.Y', strtotime(day)) }}
            {{ date('l', strtotime(day)) }}
            <a class="change_day"
               href="{{ url.get(['for' : 'reception-concrete-day', 'id_month' :  date('m', strtotime([day,'+1 day']|join(' ')))  , 'id_day': date('d', strtotime([day,'+1 day']|join(' ')))  ]) }}">
                <i class="fas fa-chevron-circle-right"></i></a>
        </th>
    </tr>
    <tr>
        <th scope="col">Время</th>
        <th scope="col">Оболонь М</th>
        <th scope="col">Оболонь Б</th>
        <th scope="col">Кавказск</th>
    </tr>
    </thead>
    <tbody>
    {% for index, item in times %}
        <tr>
            <td>{{ index }}</td>
            {% if (item[1] == '') %}
                <td>
                    <a href="#" class="concrete_cell_free" data-month="{{ curent_month }}" data-day="{{ curent_day }}"
                       data-office="1" data-time="{{ index }}">...</a>
                </td>
            {% else %}
                {{ item[1] }}
            {% endif %}
            {% if (item[2] == '') %}
                <td>
                    <a href="#" class="concrete_cell_free" data-month="{{ curent_month }}" data-day="{{ curent_day }}"
                       data-office="2" data-time="{{ index }}">...</a>
                </td>
            {% else %}
                {{ item[2] }}
            {% endif %}
            {% if (item[3] == '') %}
                <td>
                    <a href="#" class="concrete_cell_free" data-month="{{ curent_month }}" data-day="{{ curent_day }}"
                       data-office="3" data-time="{{ index }}">...</a>
                </td>
            {% else %}
                {{ item[3] }}
            {% endif %}
        </tr>
    {% endfor %}
    </tbody>
</table>
<div id="concrete_day_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <a href="" id="edit_reception" class="btn btn-default">Редактировать</a>
                <button type="button" id="close_modal" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div id="concrete_day_modal_free" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ url.get(['for': 'create-reception']) }}">
                    <input type="hidden" value="{{ curent_day }}" name="selected_day">
                    <input type="hidden" value="{{ curent_month }}" name="selected_month">
                    <input type="hidden" value="" id="selected_time" name="selected_time">
                    <input type="hidden" value="" id="selected_office" name="selected_office">
                    <button type="submit" class="btn btn-default create-reception">Создать</button>
                </form>
                <button type="button" id="close_modal" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
{##}