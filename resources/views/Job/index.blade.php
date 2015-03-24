@extends('layout.page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <form id="form-search" action="{{route('pesquisar.vagas')}}" method="get">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="term" name="q" value="{{{$sTerm}}}" placeholder="buscar: programador, php, postgres">
                        </div>

                        <div class="col-sm-3">
                            <button class="btn btn-block btn-primary">pesquisar vagas</a>
                        </div>

                        <div class="col-sm-3">
                            <a href="{{route('cadastrar.vaga')}}" class="btn btn-block btn-danger">cadastrar vaga</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="page-header">
        <h1>Vagas PHP <a title="Vagas Recentes - Atom Feed" target="_blank" href="{{route('feed.atom')}}"><i class="fa fa-rss"></i></a></h1>
    </div>

    <div class="row">
        <div class="col-sm-12" id="search-result">
            <div class="list-group">
                @if ($total) 
                    <p>{{{$total}}} vagas encontradas</p>

                    @foreach ($jobs as $i => $job) 
                    
                        <a href="{{{route('vaga.slug', vaga_slug($job, null))}}}" class="list-group-item job-item">
                            <h2 class="list-group-item-heading">{{{$job->title}}}</h2>

                            <h5>{{{date_format_2($job->published_at)}}}</h5>

                            <p class="list-group-item-text">
                                <b>Código: {{{$job->id}}}</b>
                                <br>

                                <b>Empresa: {{{get_or_fallback($job->advertiser_name)}}}</b>
                                <br>
                                <b>Local: {{{get_or_fallback($job->location)}}}</b>
                            </p>
                        </a>
                    @endforeach

                    @if (count($pages))
                        <div class="text-center">
                            <ul class="pagination pagination-lg">
                                @foreach ($pages as $i => $b)
                                    @if ($b)
                                        <li @if ($page == $i) class="active" @endif >
                                             <a href="{{route('pesquisar.vagas')}}/?p={{$i}}&q={{$sTerm}}">{{$i}}</a>
                                        </li>
                                    @else
                                        <li class="disabled"><a>...</a></li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    @endif

                @else
                <h5>
                    Nenhuma vaga encontrada com os critérios informados.
                </h5>

                <a href="/?>cadastrar-vaga" class="">Cadastrar uma vaga Agora</a>
                @endif
            </div>

        </div>
    </div>
</div>
@stop