<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow"/>
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=l7ct9917kgqm1veovl0eah1zbqpov0o373r4xbgt9706w5gf'></script>
    {#<script>tinymce.init({ selector: #mytextarea });</script>#}
    {{ assets.outputCss() }}
    {{ assets.outputJs() }}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="/img/bird.png"/>
</head>
<body>
{#{{ context.getRole() }}#}
{{ partial('layouts/tabs') }}
{{ flash.output() }}
{{ flashDirect.output() }}
<div id="alert"></div>

{{ content() }}
</body>
</html>