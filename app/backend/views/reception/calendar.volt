<table class="table table-bordered calendar" id="calendar-content">
    <thead>
    <tr>
        <th scope="col" colspan="7" class="bg-light text-center">
            <a class="change_month" href="#" data-id_month="{{ curent_month_id -1 }}"><i
                        class="fas fa-chevron-circle-left"></i></a>
            {{ curent_month }} ({{ curent_month_id }}.2019)
            <a class="change_month" href="#" data-id_month="{{ curent_month_id +1 }}"><i
                        class="fas fa-chevron-circle-right"></i></a>

        </th>
    </tr>
    <tr>
        <th scope="col">Пн</th>
        <th scope="col">Вт</th>
        <th scope="col">Ср</th>
        <th scope="col">Чт</th>
        <th scope="col">Пт</th>
        <th scope="col">Сбб</th>
        <th scope="col">Вс</th>
    </tr>
    </thead>
    <tbody>
    {% for i in 1..cells_count %}

        {% set day = i - start_month_day + 1  %}

        {% if i%7 == 1 %}
            <tr>
        {% endif %}


        {% if day <= 0 %}

            <td class="no-day"></td>

        {% else %}
            <td {% if day == curent_day %} class="today " {% endif %}>
                <a href="{{ url.get(['for':'reception-concrete-day','id_month':  curent_month_id, 'id_day':  day]) }}" class="date_cell">
                    <div class="table-cell">
                        {{ day }}
                    </div>
                </a>
            </td>

        {% endif %}


        {% if (i+1)%7 == 1 %}
            </tr>
        {% endif %}
    {% endfor %}
    </tbody>
</table>
