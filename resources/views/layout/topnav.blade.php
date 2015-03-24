<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">phpEmpregos.com</a>
        </div>

        
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">

                <li>
                    <a href="/">Início</a>
                </li>

                <li>
                    <a href="/pesquisar-vagas">Vagas</a>
                </li>

                <li>
                    <a href="/cadastrar-vaga">Cadastrar Vaga</a>
                </li>

                <li>
                    <a href="/sobre">Sobre</a>
                </li>

                <li>
                    <a href="/contato">Contato</a>
                </li>
            </ul>

            @if (0)
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/sg">
                                Source Gen
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="">
                                Advertisers
                            </a>
                        </li>

                        <li>
                            <a href="">
                                Jobs
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="">Logout</a></li>                            
                    </ul>
                </li>
            </ul>
            @endif
            
        </div><!--/.nav-collapse -->
        
    </div>
</div>