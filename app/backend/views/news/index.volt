<div id="news-index" class="content">
    <h1 class="text-center">Блог</h1>
    <a href="{{ url.get(['for' : 'add-article']) }}" class="btn btn-dark float-right">Создать новость</a>
    <div id="news-content">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                <tr class="">
                    <th class="">Название</th>
                    <th class="">Фото</th>
                    <th class="">Сокращенный текст</th>
                    <th class="">На сайте</th>
                    <th class="">Дата добавления</th>
                    <th class=" text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                {% for article in news %}
                    <tr class=" translate-item">
                        <td class="">
                            {{ article.title }}
                        </td>
                        <td class="">
                            <img src="/img/news/{{ article.id_news }}.jpg" alt="Нет фото" class="view-photo ">
                        </td>
                        <td class="">
                            {{ article.abbreviated_text|default('') }}
                        </td>
                        <td class="">
                            <label data-id_news="{{ article.id_news }}" data-status="2" class="container change_news_status">Уже на сайте
                                <input type="radio" {% if article.is_valid == 2 %} checked="checked" {% endif %}
                                       id="is_valid{{ article.id_news }}" name="is_valid{{ article.id_news }}" value="2">
                                <span class="checkmark"></span>
                            </label>
                            <label data-id_news="{{ article.id_news }}" data-status="1" class="container change_news_status">Не валидно
                                <input type="radio" name="is_valid{{ article.id_news }}" id="is_valid{{ article.id_news }}" value="1"
                                        {% if article.is_valid == 1 %} checked="checked" {% endif %}>
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td class="">
                            {{ article.date_add }}
                        </td>
                        <td class=" align-middle text-center">
                            <a class="change-status btn btn-success btn-sm mb-1"
                               href="{{ url.get(['for': 'edit-article', 'id_news' : article.id_news ]) }}">
                                Редактировать
                            </a>
                            <a class="change-status btn btn-success btn-sm mb-1"
                               href="{{ url.get(['for': 'view-article', 'id_news' : article.id_news ]) }}">
                                Посмотреть
                            </a>
                        </td>
                    </tr>

                {% endfor %}
                </tbody>
            </table>
        </div>
        <div id="news_paginator">
            {% if total_count > limit %}
                {{ partial('layouts/paginator') }}
            {% endif %}
        </div>
    </div>
</div>

