<div class="article-image" style="
        background: url('/img/news/{{ article.id_news }}.jpg') center center no-repeat;
        background-size: cover;
        "></div>
<div class="article-container">
    <div class="article">
        <div class="article-title">
            {{ article.title }}
        </div>
        <div class="article-text">
            {{ article.text }}
        </div>
        <div class="date_add">
            {{ date( "d.m.Y" , strtotime(article.date_add)) }}
        </div>
    </div>
</div>
