    <div class="news-container">
        <div class="section-title">Полезные статьи</div>

        {% for article in news %}
            <div class="article-block">
                <div class="article-img">
                    <img src="img/news/{{ article.id_news }}.jpg" alt="">
                </div>
                <div class="article-date_add">
                    {{ date("d.m.y", strtotime(article.date_add)) }}
                </div>
                <div class="article-content">
                    <div class="article-title">
                        {{ article.title }}
                    </div>
                    <div class="article-shortcut">
                        {{ article.abbreviated_text }}
                    </div>
                    <a href="{{ url.get(['for':'article-view','id_news': article.id_news]) }}" class="btn btn-danger btn-read">Читать дальше...</a>
                </div>
            </div>
        {% endfor %}
    </div>
