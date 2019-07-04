    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-auto">
        <div class="page-header">
            <h2>Регистрация</h2>
        </div>
        <form  method="post">
            <div class="form-group">
                <label for="first_name">Имя:</label>
                <input required type="text" name="firstname" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия:</label>
                <input required type="text" name="lastname" class="form-control" id="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input required type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input required type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="s_password">Повторите пароль:</label>
                <input required type="password" name="second_password" class="form-control" id="s_password">
            </div>
            <div class="text-center">
                <button class="btn btn-success">Зарегистрироваться</button>
                <a class="nav-item nav-link" href="{{ url.get(['for': 'login']) }}">или Войти</a>

            </div>
        </form>
    </div>
