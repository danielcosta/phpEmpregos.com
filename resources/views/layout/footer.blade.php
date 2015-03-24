<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 text-left">
                <div class="row">
                    <div class="col-xs-12 text-left">
                        Receber vagas por e-mail
                    </div>
                    <div class="col-xs-12">
                        <form id="form-subscribe" class="form-inline">
                            <div class="form-group" id="fgSubscribeEmail">
                                <input type="text" name="subscribeEmail" id="subscribe-email" class="form-control" placeholder="e-mail">
                            </div>

                            <button class="btn btn-danger">Cadastrar</button>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-6 text-right">
                <a title="phpEmpregos.com no facebook" target="_blank" href="https://www.facebook.com/PeAgaPeEmpregos"> <i class="fa fa-facebook-square fa-4x"></i></a>&nbsp;
                <a title="phpEmpregos.com no Twitter" target="_blank" href="https://twitter.com/phpEmpregos"> <i class="fa fa-twitter-square fa-4x"></i></a>&nbsp;
                <a title="Vagas Recentes - Atom Feed" target="_blank" href="{{{route('feed.atom')}}}"><i class="fa fa-rss fa-4x"></i></a>
            </div>
        </div>
    </div>
</footer>