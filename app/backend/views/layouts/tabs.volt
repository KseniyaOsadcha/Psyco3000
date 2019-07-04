<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url.get(['for': 'admin-index']) }}">PsyLife</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            {% if(id_role == 0) %}
                <a class="nav-item nav-link" href="{{ url.get(['for': 'login']) }}">Login</a>
            {% elseif (id_role == 4) %}
                <a class="nav-item nav-link" href="{{ url.get(['for': 'account']) }}">Профиль</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'logout']) }}">Logout</a>
            {% elseif (id_role == 1) %}
                <a class="nav-item nav-link" href="{{ url.get(['for': 'account']) }}">Профиль</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'clients']) }}">Клиенты</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'reception']) }}">Расписание</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'all-receptions']) }}">Все записи</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'logout']) }}">Logout</a>
            {% else %}
                <a class="nav-item nav-link" href="{{ url.get(['for': 'account']) }}">Профиль</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'admin-employees']) }}">Сотрудники</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'admin-feedbacks']) }}">Отклики</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'reception']) }}">Расписание</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'all-receptions']) }}">Все записи</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'clients']) }}">Клиенты</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'news']) }}">Блог</a>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'logout']) }}">Logout</a>
            {% endif %}
        </div>
    </div>
</nav>
