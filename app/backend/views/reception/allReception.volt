<div id="reception-index" class="content">
    <h1 class="text-center">все записи</h1>
    <p>
        <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            Фильтр
        </a>
    </p>
    <div class="collapse card col-md-5 col-sm-12" id="collapseExample">
        <div class="mb-4 card-body">
            <form id="reception-filter">
                <div class="form-group row d-flex justify-content-around">
                    <label for="employee">Врачи</label>
                    <select name="employee" id="employee" class="form-control col-9">
                        {% if id_doc  %}
                            <option value="{{ id_doc }}">{{ employees.firstname }}</option>
                        {% else %}
                            <option value="0">Все</option>
                            {% for employee in employees %}
                                <option value="{{ employee.id_employee }}">{{ employee.firstname }}</option>
                            {% endfor %}
                        {% endif %}
                    </select>
                </div>
                <div class="form-group row d-flex justify-content-around">
                    <label for="office">Офис</label>
                    <select name="office" id="office" class="form-control col-9">
                        <option value="0">Любой</option>
                        <option value="1">Оболонь м</option>
                        <option value="2">Оболонь б</option>
                        <option value="3">Кавказская</option>
                    </select>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="date">Дата</label>
                    <input type="date" name="date" id="date" class="form-control col-9">
                </div>
                <div class="form-group row d-flex justify-content-around">
                    <label for="time">Время</label>
                    <select name="time" id="time" class="form-control col-9">
                        <option value="0">Любое</option>
                        {% for time in times %}
                            <option value="{{ time }}">{{ time }}</option>
                        {% endfor %}
                    </select>
                </div>
                <div class="form-group row d-flex justify-content-around">
                    <label for="client">Клиент</label>
                    <select name="client" id="client" class="form-control col-9">
                        <option value="0">Все</option>
                        {% for client in clients %}
                            <option value="{{ client.id_client }}">{{ client.name }}</option>
                        {% endfor %}
                    </select>
                </div>
                <div class="form-group row d-flex justify-content-around">
                    <label for="is_payed">Оплата</label>
                    <select name="is_payed" id="is_payed" class="form-control col-9">
                        <option value="0">Не важно</option>
                        <option value="1">Не была</option>
                        <option value="2">Была</option>
                    </select>
                </div>
                <button class="btn btn-dark " type="submit">Готово</button>
                <button class="btn btn-danger " type="reset">Очистить</button>
            </form>
        </div>
    </div>
    {{ partial('reception/receptionsTable',['receptions':receptions]) }}
</div>

