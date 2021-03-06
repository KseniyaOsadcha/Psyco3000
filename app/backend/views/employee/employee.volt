<div id="employee-content">
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-light">
            <tr class="">
                <th class="">ФИО</th>
                <th class="">Телефон</th>
                <th class="">email</th>
                <th class=" text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            {% for employee in employees %}
                <tr class=" translate-item">
                    <td class="">
                        {{ employee.firstname }} {{ employee.lastname }}
                    </td>
                    <td class="">
                        {{ employee.phone }}
                    </td>
                    <td class="">
                        {{ employee.email|default('') }}
                    </td>
                    <td class=" align-middle text-center">
                        <div class="btn-group">
                            <button class="btn btn-default">
                                <a href="{{ url.get(['for':'employee-view','id_employee': employee.id_employee]) }}">Посмотреть</a>
                            </button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Удалить</a>
                            </div>
                        </div>
                    </td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>
    <div id="employeepaginator">
        {% if total_count > limit %}
            {{ partial('layouts/paginator') }}
        {% endif %}
    </div>
</div>