<div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6 mg-auto">
    <div class="page-header">
        <h2>Редактировать запись</h2>
    </div>
        <form method="post" class="create_reception_form">
        <div class="form-group">
            <label for="time">Время</label>
            <select id="time" name="time" required class="form-control ">
                {% for time in times %}
                    <option value="{{ time }}" {% if (time == date('G:i', strtotime(reception.time))) %} selected {% endif %}>{{ time }}</option>
                {% endfor %}
            </select>
        </div>
        <div class="form-group">
            <label for="date">День</label>
            <input required type="date" name="day" class="form-control" id="date" value="{{ reception.day }}">
        </div>
        <div class="form-group">
            <label for="office">Офис</label>
            <select id="office" name="office" required class="form-control ">
                <option value="1" {% if reception.id_office == 1 %}selected{% endif %}>Оболонь м</option>
                <option value="2" {% if reception.id_office == 2 %}selected{% endif %}>Оболонь б</option>
                <option value="3" {% if reception.id_office == 3 %}selected{% endif %}>Кавказская</option>
            </select>
        </div>
        <div class="form-group card p-2">
            <label for="client">Клиент</label>
            <select id="client" name="client" required class="form-control ">
                <option value="0">Виберите клиента</option>
                {% for client in clients %}
                    <option value="{{ client.id_client }}" {% if (reception.id_client == client.id_client) %} selected {% endif %}>{{ client.name }}</option>
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

        {% if id_empl == null %}
            <div class="form-group">
                <label for="employee">Врач</label>
                <select id="employee" name="employee" required class="form-control ">
                    {% for employee in employees %}
                        <option value="{{ employee.id_employee }}" {% if reception.id_employee == employee.id_employee %} selected {% endif %}>{{ employee.firstname }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class="form-group">
                <label>Статус оплаты</label>
                <label class="container">Не оплачено
                    <input type="radio" {% if reception.is_payed == 1 %} checked="checked" {% endif %}
                          id="is_payed" name="is_payed" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container ">Оплачено
                    <input type="radio" name="is_payed" id="is_payed" value="2"
                            {% if reception.is_payed == 2 %} checked="checked" {% endif %}>
                    <span class="checkmark"></span>
                </label>
            </div>
        {% else %}
            <div class="form-group">
                <input type="hidden" id="employee" name="employee" value="{{ id_empl }}" class="form-control ">
                <input type="hidden" id="is_payed" name="is_payed" value="1" class="form-control ">
            </div>
        {% endif %}
            <input type="hidden" id="id_reception" name="id_reception" value="{{ reception.id_reception }}" class="form-control ">

        <div class="text-center">
            <button class="btn btn-success" type="submit">Редактировать</button>
        </div>
    </form>
</div>
