<div id="reception-content">
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-light">
            <tr class="">
                <th class="">Врач</th>
                <th class="">Клиент</th>
                <th class="">Офис</th>
                <th class="">День&Время</th>
                <th class="">Оплата</th>
                <th class=" text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            {% for reception in receptions %}
                <tr class=" translate-item">
                    <td class="">
                        {{ reception.employee.firstname }}
                    </td>
                    <td class="">
                        {{ reception.client.name|default('') }}
                    </td>
                    <td class="">
                        {{ reception.office.short_name|default('') }}
                    </td>
                    <td class="">
                        {{ reception.day|default('') }} {{ reception.time|default('') }}
                    </td>
                    <td class="">
                        <label class="container change_is_payed" data-status="1"
                               data-id_reception="{{ reception.id_reception }}">Не оплачено
                            <input {% if id_doc != 0 %} disabled {% endif %}
                                    type="radio" {% if reception.is_payed == 1 %} checked="checked" {% endif %}
                                    name="is_payed{{ reception.id_reception }}">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container change_is_payed" data-status="2"
                               data-id_reception="{{ reception.id_reception }}">Оплачено
                            <input {% if id_doc != 0 %} disabled {% endif %} type="radio"
                                                                             name="is_payed{{ reception.id_reception }}" {% if reception.is_payed == 2 %} checked="checked" {% endif %}>
                            <span class="checkmark"></span>
                        </label>
                    </td>

                    <td class="d-flex flex-column align-middle text-center">
                        <a class="change-status btn btn-success btn-sm mb-1"
                           href="{{ url.get(['for' : 'edit-reception', 'id_reception' : reception.id_reception]) }}">
                            Редактировать
                        </a>
                    </td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>
    <div id="receptionpaginator">
        {% if total_count > limit %}
            {{ partial('layouts/paginator') }}
        {% endif %}
    </div>
</div>