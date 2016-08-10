<!DOCTYPE html>
<html lang="ru"><head>
    <title>{$title}  </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="{$description} " >
    <meta name="keywords" content="{$keywords}" >
    <meta name="Robots" content="ALL">
    <meta name="revisit-after" content="3 days">

    <link rel="icon" href="/custom/img/tennisIconD.ico" type="image/x-icon">


    <!-- styles -->
    {$styles}
    <link rel="shortcut icon" href="/custom/img/tennisIconD.ico" type="image/x-icon">


    <link rel="stylesheet" href="/custom/css/css.css">
    <link rel="stylesheet" href="/standart/css/bootstrap.custom.css">
    <link rel="stylesheet" href="/custom/css/fonts.css">
    {block name="css"}{/block}

    {foreach from=$CssUser item=$path}
        <link rel="stylesheet" href="/custom/css/{$path}">
    {/foreach}
    {block name="scriptb"}{/block}
    <!-- scripts -->
    <script src="/standart/js/jquery.min.js" ></script>
    <script src="/standart/js/bootstrap.js" ></script>
    <script src="/standart/js/validate.js"></script>
    <script src="/custom/js/jquery.form.js"></script>

    {foreach from=$ScriptUser item=$path}
        <script type="text/javascript" src="/custom/js/{$path}"></script>
    {/foreach}

    {block name="script"}{/block}


</head>

<body class="{$classBodyCss}">
<header>
    {include file=$designNavbarType }
</header>
    {block name="body"}{/block}


<div id="ajaxMessagesContainer">

</div>
<footer class="no-select">

    

</footer>
</body>
</html>
{foreach from=$EndScriptUser item=$path}
    <script type="text/javascript" src="/custom/js/{$path}"></script>
{/foreach}

