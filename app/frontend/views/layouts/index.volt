<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140487369-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-140487369-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ assets.outputCss() }}
    {{ assets.outputJs() }}
    {#<meta name="robots" content="nofollow"/>#}
    {{ tag.getTitle() }}
    {{ tag.getDescription() }}
    {{ tag.getKeywords() }}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">


    <link rel="shortcut icon" type="image/x-icon" href="/img/bird.png"/>
</head>
<body>
<header>
    <div class="head head-desktop">
        <div class="logo"><a href="{{ url.get(['for':'home-page']) }}"><img src="/img/logo.png" alt=""></a></div>
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
            <a class="nav-link" href="tel:+380995657016">+38(099)565-70-16</a>
        </div>
    </div>
    <div class="head-mobile">
        <div class="head-m-top">
            <div class="logo"><a href="{{ url.get(['for':'home-page']) }}"><img src="/img/logo.png" alt=""></a></div>
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
                    <a class="nav-link" href="tel:+380995657016">+38(099)565-70-16</a>
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
        <a href="tel:+380995657016"><i class="fas fa-mobile-alt"></i> : 0995657016</a>
        {#<a href="tel:+380668478437"><i class="fas fa-mobile-alt"></i> : 0668478437</a>#}
        <a href="mailto:harmony.life.kiev@gmail.com"><i class="far fa-envelope"></i> : psylife3000@gmail.com</a>
        <a href="{{ url.get(['for' : 'admin-index']) }}"><i class="far fa-user"></i> Войти</a>
        {#</div>#}
        {#<div class="footer-form">#}

        {#</div>#}
    </div>

    {#</div>#}
</footer>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'a4Jl23LAtG';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
        s.src = '//code.jivosite.com/script/widget/'+widget_id
        ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
        if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
        else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
