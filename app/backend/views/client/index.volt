<div id="clients-index" class="content">
    <h1 class="text-center">Клиенты</h1>
    <a href="{{ url.get(['for' : 'add-client']) }}" class="btn btn-dark float-right">Создать нового</a>
    <p>
        <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Фильтр
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="col-md-5 mb-4">
            <form>
                <div class="form-group row">
                    <select id="client-filter" class="form-control col-9">
                        <option value="id_client ASC">От старых к новым</option>
                        <option selected value="id_client DESC">От новых к старым</option>
                        <option value="name ASC">По алфивиту</option>
                      {% if id_role != 1 %}  <option value="id_employee ASC">По лечащим врачам</option> {% endif %}
                    </select>
                </div>
            </form>
        </div>
    </div>
    {{ partial('client/clients',['clients':clients]) }}
</div>

