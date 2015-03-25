@extends('layout.page')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{$job->title}}</h1>

            <h5>
                {{date_format_2($job->published_at)}}
            </h5>

            <p>
                <b>Código:</b> {{$job->id}}

                <br>

                <b>Local:</b> {{get_or_fallback($job->location)}}

                <br>

                <b>Empresa:</b> {{get_or_fallback($job->advertiser_name)}}

                <br>

                <b>Site:</b> {!! get_advertiser_url_or_fallback($job->advertiser_url) !!}
            </p>

        </div>

        <div class="row">
            <div class="col-sm-12" style="text-align:justify;text-justify:inter-word;">
                {!! nl2br($job->description) !!}
            </div>
        </div>

        <div>
            <br>

            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://phpEmpregos.com/{{vaga_slug($job)}}" data-via="phpEmpregos" data-lang="pt" data-hashtags="phpEmpregos">Tweetar</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=366759760021856&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-share-button" data-href="https://phpEmpregos.com/{{vaga_slug($job)}}" data-type="button_count"></div>
        </div>

        @if($job->email)

        <div class="page-header">
            <h3>Quero me candidatar</h3>
            <p>
                Envie agora mesmo seu CV. <br>
                Preencha o formulário abaixo e seus dados serão enviados para o responsável pela vaga.
            </p>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <form id="form-send-cv" class="form-horizontal-" enctype="multipart/form-data" action="{{route('enviarcv')}}" method="post">
                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                    <input type="hidden" name="id" value="{{$job->id}}">

                    <div class="form-group" id="fgName">
                        <label for="name" class="control-label">Nome *</label>
                        <input type="text" name="name" class="form-control" id="name" maxleght="50" value="{{$aForm['sName']}}">
                    </div>


                    <div class="form-group" id="fgEmail">
                        <label for="email" class="control-label">Email *</label>
                        <input type="email" name="email" class="form-control" id="email" maxlength="254" value="{{$aForm['sEmail']}}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Telefone</label>
                        <input type="text" name="phone" class="form-control" id="phone" maxlength="25" value="{{$aForm['sPhone']}}">
                    </div>

                    <div class="form-group">
                        <label for="comment" class="control-label">Informações adicionais</label>
                        <textarea name="comment" class="form-control" id="coment" rows="4" maxlength="4000">{{$aForm['sComment']}}</textarea>
                    </div>

                    @if ($job->question_1 || $job->question_2 || $job->question_3)
                        <fieldset>
                            <legend>O Empregador pergunta:</legend>

                            @if ($job->question_1)
                                <div class="form-group" id="fgQuestion1">
                                    <label for="question1" class="control-label">{{$job->question_1}} *</label>
                                    <textarea
                                        class       = "form-control"
                                        id          = "question1"
                                        name        = "question1"
                                        rows        = "2"
                                        maxlength   = "4000"
                                    ></textarea>
                                </div>
                            @endif

                            @if ($job->question_2)
                                <div class="form-group" id="fgQuestion2">
                                    <label for="question2" class="control-label">{{$job->question_2}} *</label>
                                    <textarea
                                        class       = "form-control"
                                        id          = "question2"
                                        name        = "question2"
                                        rows        = "2"
                                        maxlength   = "4000"
                                    ></textarea>
                                </div>
                            @endif

                            @if ($job->question_3)
                            <div class="form-group" id="fgQuestion3">
                                <label for="question1" class="control-label">{{$job->question_3}} *</label>
                                <textarea
                                    class       = "form-control"
                                    id          = "question3"
                                    name        = "question3"
                                    rows        = "2"
                                    maxlength   = "4000"
                                ></textarea>
                            </div>
                            @endif
                        </fieldset>
                    @endif

                    <div class="form-group" id="fgCV">
                        <label for="CV" class="control-label">CV *</label>
                        <input type="file" id="CV" name="CV">
                <span class="help-blocl">
                    Formatos válidos: pdf, docx, doc, txt, rtf, odt e sxw
                    Tamanho Máximo 1 MB
                </span>
                    </div>

                    <div class="form-group">
                        <?php /* =recaptcha_get_html(RECAPTCHA_PUBLIC_KEY); */ ?>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                            <button type="submit" class="btn btn-danger">enviar meu CV</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <br>

        <script>
            $gR(function(){
                $("#form-send-cv").submit(function(){
                    $g.cleanContainerAlert();
                    $g.cleanFormGroupFeedback();

                    var hasError = false;

                    if (!$("#name").val().trim()) {
                        $("#fgName").addClass('has-error');
                        $("#container-alert-danger ul").append('<li>O campo [Nome] é obrigatório</li>\n');
                        hasError = true;
                    }

                    if ($("#email").val().trim()) {
                        if (!$g.isEmailValid($("#email").val().trim())) {
                            $("#fgEmail").addClass('has-error');
                            $("#container-alert-danger ul").append('<li>O campo [Email] inválido</li>\n');
                            hasError = true;
                        }
                    } else {
                        $("#fgEmail").addClass('has-error');
                        $("#container-alert-danger ul").append('<li>O campo [Email] é obrigatório</li>\n');
                        hasError = true;
                    }

                    @if ($job->question_1 || $job->question_2 || $job->question_3)
                        var bAllQuestions = true;

                        @if ($job->question_1)
                            if (!$("#question1").val().trim()) {
                                $("#fgQuestion1").addClass('has-error');
                                bAllQuestions = false;
                                hasError      = true;
                            }
                        @endif

                        @if ($job->question_2)
                            if (!$("#question2").val().trim()) {
                                $("#fgQuestion2").addClass('has-error');
                                bAllQuestions = false;
                                hasError      = true;
                            }
                        @endif

                        @if ($job->question_3)
                            if (!$("#question3").val().trim()) {
                                $("#fgQuestion3").addClass('has-error');
                                bAllQuestions = false;
                                hasError      = true;
                            }
                        @endif

                        if (!bAllQuestions) {
                            $("#container-alert-danger ul").append('<li>Todas as perguntas são obrigatórias</li>\n');
                        }
                    @endif

                    if (!$("#CV").val().trim()) {
                        $("#fgCV").addClass('has-error');
                        $("#container-alert-danger ul").append('<li>O campo [CV] é obrigatório</li>\n');
                        hasError = true;
                    } else {
                        var aExt      = $("#CV").val().trim().toLowerCase().split('.');
                        var sExt      = aExt[aExt.length - 1];
                        var aValidExt = ['pdf', 'docx', 'doc', 'txt', 'rtf', 'odt', 'sxw' ];
                        if (-1 == aValidExt.indexOf(sExt)) {
                            $("#fgCV").addClass('has-error');
                            $("#container-alert-danger ul").append('<li>Formato do CV inválido. Somente são aceitos os formatos pdf, docx, doc, txt, rtf, odt e sxw</li>\n');
                            hasError = true;
                        }
                    }

                    if (hasError) {
                        window.scrollTo(0, 0);
                        $("#container-alert-danger").slideDown();
                    }

                    return !hasError;

                });

            });

        </script>


    </div>
@stop