@extends('layout.page')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Contato</h1>
        </div>

        <form id="form-send-message" class="form-horizontal">

            <div class="form-group" id="fgName">
                <label for="name" class="col-sm-2 control-label">Nome *</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" id="name" maxlength="100" autofocus="autofocus">
                    <span class="help-block">

                    </span>
                </div>
            </div>

            <div class="form-group" id="fgEmail">
                <label for="email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="email" maxlength="200">
                </div>
            </div>

            <div class="form-group" id="fgMessage">
                <label for="email" class="col-sm-2 control-label">Mensagem *</label>
                <div class="col-sm-4">
                    <textarea name="message" class="form-control" id="message" rows="6" maxlength="4000"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <?/*recaptcha_get_html(RECAPTCHA_PUBLIC_KEY);*/ ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <button type="submit" class="btn btn-danger">Enviar Mensagem</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
    $gR(function(){
        $("#form-send-message").submit(function(){
            $g.cleanContainerAlert();
            $g.cleanFormGroupFeedback();

            var hasError = false;
            var idFocus  = null;

            if (!$("#name").val().trim()) {
                $("#fgName").addClass('has-error');
                $("#container-alert-danger ul").append('<li>O campo [Nome] é obrigatório</li>\n');
                hasError = true;

                if (!idFocus) {
                   idFocus = 'name';
                }
            }

            if ($("#email").val().trim()) {
                if (!$g.isEmailValid($("#email").val().trim())) {
                    $("#fgEmail").addClass('has-error');
                    $("#container-alert-danger ul").append('<li>O campo [Email] inválido</li>\n');
                    hasError = true;

                    if (!idFocus) {
                       idFocus = 'email';
                    }
                }
            } else {
                $("#fgEmail").addClass('has-error');
                $("#container-alert-danger ul").append('<li>O campo [Email] é obrigatório</li>\n');
                hasError = true;
                if (!idFocus) {
                   idFocus = 'email';
                }
            }

            if (!$("#message").val().trim()) {
                $("#fgMessage").addClass('has-error');
                $("#container-alert-danger ul").append('<li>O campo [Mensagem] é obrigatório</li>\n');
                hasError = true;
                if (!idFocus) {
                   idFocus = 'message';
                }
            }

            if (hasError) {
                window.scrollTo(0, 0);
                $("#container-alert-danger").slideDown();
                $("#" + idFocus).focus();
            } else {
                $g.post({
                    "url"       : "/pt/d/Index/xSendMessage",
                    "fCallback" : top.xSendMessageResponse
                });
            }

            return false;
        });
    });

    top.xSendMessageResponse = function(oResp)
    {
        if ($g.hasError(oResp, true)) {
            Recaptcha.reload_internal('t');
        } else {
            document.location = "/";
        }
    };

    </script>
@stop