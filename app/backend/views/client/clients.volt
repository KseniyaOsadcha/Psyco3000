<div id="client-content">
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-light">
            <tr class="">
                <th class="">ФИО</th>
                <th class="">Телефон</th>
                <th class="">Лечащий врач</th>
                <th class="">Нотатки</th>
                <th class="">Диагноз</th>
                <th class=" text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            {% for client in clients %}
                <tr class=" translate-item">
                    <td class="">
                        {{ client.name }}
                    </td>
                    <td class="">
                        {{ client.phone|default('') }}
                    </td>
                    <td class="">
                        {{ client.empl.firstname|default('') }}
                    </td>
                    <td class="">
                        {{ client.client_notes|default('') }}
                    </td>
                    <td class="">
                        {{ client.diagnosis|default('') }}
                    </td>
                    <td class=" align-middle text-center">
                        <a class="change-status btn btn-success btn-sm mb-1"
                           href="{{ url.get(['for': 'update-client', 'id_client' : client.id_client ]) }}">
                            Редактировать
                        </a>
                    </td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>
    <div id="clientpaginator">
        {% if total_count > limit %}
            {{ partial('layouts/paginator') }}
        {% endif %}
    </div>
</div>