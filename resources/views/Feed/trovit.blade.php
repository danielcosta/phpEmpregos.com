<?xml version="1.0" encoding="utf-8"?>
<trovit>
    @foreach ($jobs as $job)
        @if (strlen($job->description) >= 30)
            <ad>
                <id><![CDATA[{{$job->id}}]]></id>
                <url><![CDATA[{{url('')}}/{{vaga_slug($job)}}/?r=trovitfeed]]></url>
                <title><![CDATA[{!!$job->title!!}]]></title>
                <content><![CDATA[{!!$job->description!!}]]></content>
                <region><![CDATA[{!!$job->location!!}]]></region>
                <category><![CDATA[PHP]]></category>
                <company><![CDATA[{!!$job->advertiser_name!!}]]></company>
                <date><![CDATA[{{(new DateTime($job->published_at))->format('d/m/Y h:i:s')}}]]></date>
            </ad>
        @endif
    @endforeach
</trovit>
