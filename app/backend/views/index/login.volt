    <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-10 mg-auto">
        <div class="page-header">
            <h2>Логин</h2>
        </div>
        <form  method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input required type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input required type="password" name="password" class="form-control" id="password">
            </div>
            <div class="text-center">
                <button class="btn btn-success">Войти</button>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'register']) }}">Зарегистрироваться</a>
            </div>
        </form>
    </div>
