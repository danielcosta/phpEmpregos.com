<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Ajudando a extrair o máximo sucesso de cada nova oportunidade! Vagas PHP para programadores, analistas, testadores e muito mais.">
    <meta name="keywords" content="PHP, vagas, empregos, php empregos, empregos php, programador php, analista de sistemas, desenvolvedor, mysql, zend framework, mvc, clt, pj">
    <meta name="author" content="Mathias Grimm">
    <link rel="author" href="http://www.zend.com/en/yellow-pages/ZEND006756"/>

    <link rel="alternate" type="application/atom+xml" title="phpEmpregos.com - Vagas Recentes" href="{{{ secure_url(URL::route('feed.atom')) }}}" />

    <title>
        @if (isset($title))
            :: phpEmpregos.com :: {{{$title}}} @if ($title) :: @endif
        @else
            ???NO TITLE???
        @endif
    </title>

    <link href="{{ elixir('css/a.css') }}" rel="stylesheet">
    
    <script>
        var RecaptchaOptions = {lang : 'pt',theme : 'clean'};

        (function(){var e=false;top.$gR=function(t){if(e){t.call()}else{if(window.addEventListener){window.addEventListener("load",t)}else{window.attachEvent("onload",t)}}};$gR(function(){e=true})})()
    </script>
</head>

