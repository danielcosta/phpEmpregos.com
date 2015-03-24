<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="pt-BR">
	<title>phpEmpregos.com</title>
	<subtitle>Vagas Recentes</subtitle>
	<link rel="alternate" type="text/html" href="{{url('')}}" />
	<id>https:///feed/atom</id>
	<link rel="self" type="application/atom+xml" href="{{route('feed.atom')}}" />
	<updated>{{{$updated}}}</updated>
	
    @foreach ($jobs as $i => $job)
    	<entry>
    		<title><![CDATA[{{$job->title}}]]></title>
    		<link href="{{url('')}}/{{vaga_slug($job)}}/?r=feedatom" />
    		<id>{{url('')}}/vaga/{{$job->id}}</id>
    		<updated>{{{date_database_2_atom($job->published_at)}}}</updated>
    		<author><name>phpEmpregos.com</name></author>
    		<summary><![CDATA[
    		    Local: {!!get_or_fallback($job->location)!!}
                |
                Empresa: {!!get_or_fallback($job->advertiser_name)!!}
    		]]></summary>
    	</entry>
    @endforeach
</feed>