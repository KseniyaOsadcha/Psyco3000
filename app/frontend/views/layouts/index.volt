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
    <div class="head">
        <div class="logo"><a href="{{ url.get(['for':'home-page']) }}"><img src="img/logo_18.png" alt=""></a></div>

        {#<div class="nav-link-box">#}
            {#<a class="nav-link" href="">О нас</a>#}
            {#<div class="custom-border"></div>#}
        {#</div>#}
        <div class="nav-link-box">
            <a class="nav-link" href="">Цены</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="">Контакты</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="{{ url.get(['for':'news']) }}">Блог</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box">
            <a class="nav-link" href="">Записаться</a>
            <div class="custom-border"></div>
        </div>
        <div class="nav-link-box-number">
            <a class="nav-link" href="">+(380)95-004-24-53</a>
        </div>
    </div>
</header>
<div class="mt-8">
    <br>
</div>
{{ content() }}

<footer>
    <div class="bg-black-linear">
        <div class="footer-title">Контакты</div>
        <div class="footer-container">
            {#<div class="contacts">#}
                <div><i class="fas fa-mobile-alt"></i> : 0950042453</div>
                <div><i class="fas fa-mobile-alt"></i> : 0668478437</div>
                <div><i class="far fa-envelope"></i> : theksenic@gmail.com</div>
            {#</div>#}
            {#<div class="footer-form">#}

            {#</div>#}
        </div>
    </div>
</footer>
</body>
</html>
