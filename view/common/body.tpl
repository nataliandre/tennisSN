<!DOCTYPE html>
<html lang="ru"><head>
    <title>{$title} {include file='../elementy/title.txt' } </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="{$description} {include file='../elementy/description.txt' }" > 
    <meta name="keywords" content="{$keywords} {include file='../elementy/keywords.txt' }" >
    <meta name="Robots" content="ALL">
    <meta name="revisit-after" content="3 days">

    <link rel="icon" href="" type="image/x-icon">


    <!-- styles -->
    {$styles}
    <link rel="shortcut icon" href="/custom/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/shadowbox/shadowbox.css">
    <link rel="stylesheet" href="/standart/css/bootstrap.css">
    <link rel="stylesheet" href="/custom/css/css.css">
    <link rel="stylesheet" href="/custom/css/fonts.css">

    <!-- scripts -->
    <script src="/standart/js/jquery-2.1.4.min.js" ></script>
    <script src="/standart/js/bootstrap.js" ></script>
    <script src="/standart/js/jquery.form.js"></script>
    <script src="/custom/js/translite.js"></script>
</head>
<body>
<body>
<header>
    {include file=$designNavbarType }
</header>
    {block name="body"}{/block}
<footer class="no-select">
</footer>
</body>
</html>
