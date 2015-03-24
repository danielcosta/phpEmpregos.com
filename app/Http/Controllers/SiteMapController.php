<?php namespace App\Http\Controllers;

use phpEmpregos\Job\JobRepository;

class SiteMapController extends Controller
{
    protected $jobRepo;
    
    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }
    
	public function xml()
	{
        $jobs = $this->jobRepo->getRecent(0);

        $viewData = [
            'jobs'    => $jobs,
            'lastmod' => substr($jobs[0]->published_at, 0, 10),
            'today'   => date('Y-m-d')
        ];
        
        return \Response::view('Sitemap.xml', $viewData)->header('Content-Type', 'text/xml; charset=utf-8');
	}
}