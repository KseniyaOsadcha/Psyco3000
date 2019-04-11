<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ assets.outputCss() }}
    {{ assets.outputJs() }}
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/favicon.ico"/>
</head>
<body>
<header>
    <div class="head head-desktop">
        <div class="logo"><a href="{{ url.get(['for':'home-page']) }}"><img src="/img/logo_18.png" alt=""></a></div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'home-page']) }}">Главная</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'about-us']) }}">О нас</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'prices']) }}">Цены</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'contact']) }}">Контакты</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'news']) }}">Блог</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'feedback']) }}">Записаться</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box-number">
            <a class="nav-link" href="tel:+380668660828">+38(066)866-0828</a>
        </div>
    </div>
    <div class="head-mobile">
        <div class="head-m-top">
            <div class="logo"><a href="{{ url.get(['for':'home-page']) }}"><img src="/img/logo_18.png" alt=""></a></div>
            <div class="hamburger"><i class="fas fa-bars"></i></div>
        </div>
        <div class="head-m-menu">
            <div class="head-mobile-menu">
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'home-page']) }}">Главная</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'about-us']) }}">О нас</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'prices']) }}">Цены</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'contact']) }}">Контакты</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'news']) }}">Блог</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box">
                    <a class="nav-link" href="{{ url.get(['for':'feedback']) }}">Записаться</a>
                    <div class="custom-border"></div>
                </div>
                <div class="nav-link-box-number">
                    <a class="nav-link" href="tel:+380668660828">+38(066)866-0828</a>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="before-header-margin">
</div>
{{ content() }}

<footer>
    {#<div class="bg-black-linear">#}
    <div class="footer-title">Контакты</div>
    <div class="footer-container">
        {#<div class="contacts">#}
        <a href="tel:+380668660828"><i class="fas fa-mobile-alt"></i> : 0668660828</a>
        <a href="tel:+380668478437"><i class="fas fa-mobile-alt"></i> : 0668478437</a>
        <a href="mailto:harmony.life.kiev@gmail.com"><i class="far fa-envelope"></i> : harmony.life.kiev@gmail.com</a>
        {#<a href="{{ url.get(['for' : 'admin-index']) }}">Войти</a>#}
        {#</div>#}
        {#<div class="footer-form">#}

        {#</div>#}
    </div>

    {#</div>#}
</footer>
</body>
</html>
