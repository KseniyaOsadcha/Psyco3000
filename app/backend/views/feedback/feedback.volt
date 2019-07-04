<div id="feedback-content">
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-light">
            <tr class="">
                <th class="">Имя</th>
                <th class="">Телефон</th>
                <th class="">email</th>
                <th class="">Комментарий</th>
                <th class="">Дата добавления</th>
                <th class=" text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            {% for feedback in feedbacks %}
                <tr class=" translate-item">
                    <td class="">
                        {{ feedback.name }}
                    </td>
                    <td class="">
                        {{ feedback.phone }}
                    </td>
                    <td class="">
                        {{ feedback.email|default('') }}
                    </td>
                    <td class="">
                        {{ feedback.comment|default('') }}
                    </td>
                    <td class="">
                        {{ date('H:i - d.m.y', strtotime(feedback.date_add))}}
                    </td>
                    <td class="d-flex flex-column align-middle text-center">
                        <a class="change-status btn btn-success btn-sm mb-1" data-id_status="1"
                           data-id_feedback="{{ feedback.id_feedback }}" href="#">
                            Новая запись
                        </a>
                        <a class="change-status btn btn-light btn-sm mb-1" data-id_status="2"
                           data-id_feedback="{{ feedback.id_feedback }}" href="#">
                            Не дозвонились
                        </a>
                        <a class="change-status btn btn-light btn-sm mb-1" data-id_status="3"
                           data-id_feedback="{{ feedback.id_feedback }}" href="#">
                            Записан на прием
                        </a>
                        <a class="change-status btn btn-danger btn-sm mb-1" data-id_status="4"
                           data-id_feedback="{{ feedback.id_feedback }}" href="#">
                            Не актуально
                        </a>
                    </td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>
    <div id="feedbackpaginator">
        {% if total_count > limit %}
            {{ partial('layouts/paginator') }}
        {% endif %}
    </div>
</div>