<div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6 mg-auto">
    <div class="page-header">
        <h2>Создать запись</h2>
    </div>
    <form method="post" class="create_reception_form">
        <div class="form-group">
            <label for="time">Время</label>
            <select id="time" name="time" required class="form-control ">
                {% for time in times %}
                    <option value="{{ time }}" {% if (time == selected_time) %} selected {% endif %}>{{ time }}</option>
                {% endfor %}
            </select>
        </div>
        <div class="form-group">
            <label for="date">День</label>
            <input required type="date" name="day" class="form-control" id="date" value="{{ date|default('') }}">
        </div>
        <div class="form-group card p-2">
            <label for="client">Клиент</label>
            <select id="client" name="client" required class="form-control ">
                <option value="0">Выберите клиента</option>
                {% for client in clients %}
                    <option value="{{ client.id_client }}">{{ client.name }}</option>
                {% endfor %}
            </select>
            <br>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                или Создать нового
            </button>
            <div class="collapse" id="collapseExample">
                <br>

                <label for="new_client">ФИО</label>
                <input type="text" name="new_client" class="form-control" id="new_client">
            </div>
        </div>
        <div class="form-group">
            {% if id_empl == null %}
                <label for="employee">Врач</label>
                <select id="employee" name="employee" required class="form-control ">
                    {% for employee in employees %}
                        <option value="{{ employee.id_employee }}">{{ employee.firstname }}</option>
                    {% endfor %}
                </select>
            {% else %}
                <input type="hidden" id="employee" name="employee" value="{{ id_empl }}" class="form-control ">
            {% endif %}
            <input type="hidden" id="is_payed" name="is_payed" value="1" class="form-control ">
        </div>
        <div class="form-group">
            <label for="office">Офис</label>
            <select id="office" name="office" required class="form-control ">
                <option value="1" {% if selected_office == 1 %}selected{% endif %}>Оболонь м</option>
                <option value="2" {% if selected_office == 2 %}selected{% endif %}>Оболонь б</option>
                <option value="3" {% if selected_office == 3 %}selected{% endif %}>Кавказская</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-success" type="submit">Создать</button>
        </div>
    </form>
</div>
