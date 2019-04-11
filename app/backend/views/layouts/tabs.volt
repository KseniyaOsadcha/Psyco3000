<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url.get(['for': 'admin-index']) }}">PsyLife</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ url.get(['for': 'login']) }}">Login</a>
            <a class="nav-item nav-link" href="{{ url.get(['for': 'register']) }}">Register</a>
            <a class="nav-item nav-link" href="{{ url.get(['for': 'logout']) }}">Logout</a>
            <a class="nav-item nav-link" href="{{ url.get(['for': 'account']) }}">Профиль</a>
            <a class="nav-item nav-link" href="{{ url.get(['for': 'admin-feedbacks']) }}">Клиенты</a>
            <a class="nav-item nav-link" href="{{ url.get(['for': 'admin-employees']) }}">Сотрудники</a>
            <a class="nav-item nav-link" href="#">Расписание</a>
        </div>
    </div>
</nav>
