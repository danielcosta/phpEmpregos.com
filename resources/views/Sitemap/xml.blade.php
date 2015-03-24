<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://phpempregos.com</loc>
        <lastmod>{{$today}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>https://phpempregos.com/feed/atom</loc>
        <lastmod>{{$lastmod}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>https://phpempregos.com/pesquisar-vaga</loc>
        <lastmod>{{$today}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>https://phpempregos.com/cadastrar-vaga</loc>
        <lastmod>2014-08-11</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>https://phpempregos.com/sobre</loc>
        <lastmod>2014-08-08</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>https://phpempregos.com/contato</loc>
        <lastmod>2014-05-24</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @foreach ($jobs as $i => $job)
        <url>
            <loc>{{url('')}}/{{vaga_slug($job)}}</loc>
            <lastmod></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>
