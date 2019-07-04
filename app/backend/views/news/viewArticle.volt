<div class=" col-lg-8 col-md-10 col-sm-10 col-xs-12 mg-auto">
    <div class="page-header">
        <h2>{{ article.title }}</h2>
    </div>
    <div class="form-group">
        <label for="title" class="bg-light w-100 p-2">Фото:</label>
        <div>
            <img src="/img/news/{{ article.id_news }}.jpg" alt="Нет фото" class="view-photo ">
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="bg-light w-100 p-2">Сокращенный текст:</label>
        <div>
            {{ article.abbreviated_text }}
        </div>
    </div>
    <div class="form-group">
        <label for="text" class="bg-light w-100 p-2">Текст:</label>
        {{ article.text }}
    </div>
    <div class="form-group">
        <label for="text" class="bg-light w-100 p-2">Валидность:</label>
        <div class="form-group">
            <label class="container">Уже на сайте
                <input disabled type="radio" {% if article.is_valid == 2 %} checked="checked" {% endif %}
                       id="is_valid" name="is_valid" value="1">
                <span class="checkmark"></span>
            </label>
            <label class="container ">Не валидно
                <input disabled type="radio" name="is_valid" id="is_valid" value="2"
                        {% if article.is_valid == 1 %} checked="checked" {% endif %}>
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="text" class="bg-light w-100 p-2">Дата написания:</label>
        {{ article.date_add }}
    </div>
    <a class="change-status btn btn-success btn-sm mb-1"
       href="{{ url.get(['for': 'edit-article', 'id_news' : article.id_news ]) }}">
        Редактировать
    </a>
</div>
