<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-auto">
    <div class="page-header">
        <h2>Новый клиент</h2>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="name">Фио:</label>
            <input required type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
        <div class="form-group">
            <label for="diagnosis">Диагноз:</label>
            <textarea name="diagnosis" id="diagnosis" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="client_notes">Нотатки:</label>
            <textarea name="client_notes" id="client_notes" rows="5" class="form-control"></textarea>
        </div>
        {% if id_employee == null %}
            <div class="form-group">
                <label for="id_employee">Лечащий врач:</label>
                <select name="id_employee" required id="id_employee" class="form-control">
                    {% for employee in employees %}
                        <option value="{{ employee.id_employee }}">{{ employee.firstname }}</option>
                    {% endfor %}
                </select>
            </div>
        {% else %}
            <input type="hidden" name="id_employee" value="{{ id_employee }}">
        {% endif %}
        <div class="text-center">
            <button type="submit" class="btn btn-success">Готово</button>
        </div>
    </form>
</div>
