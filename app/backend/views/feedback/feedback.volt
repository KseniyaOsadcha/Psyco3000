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
                {#<th class=" text-center">Действия</th>#}
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
                        {{ date('H', strtotime(feedback.date_add)) + 3}}:{{ date('i - d.m.y', strtotime(feedback.date_add))}}
                    </td>
                    {#<td class=" align-middle text-center">#}
                        {#<div class="btn-group">#}
                        {#</div>#}
                    {#</td>#}
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