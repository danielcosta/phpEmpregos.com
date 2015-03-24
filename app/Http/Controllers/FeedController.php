<?php namespace App\Http\Controllers;

use phpEmpregos\Job\JobRepository;
use Carbon\Carbon;

class FeedController extends Controller
{
    private $jobRepo;

    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }

    public function atom()
    {
        $jobs = $this->jobRepo->getRecent();

        $viewData = [
            'jobs'    => $jobs,
            'updated' => (new Carbon($jobs[0]->published_at))->toAtomString()
        ];

        return \Response::view('Feed.atom', $viewData)->header('Content-Type', 'text/xml; charset=utf-8');
    }

    public function trovit()
    {
        $jobs = $this->jobRepo->getRecent(100);

        $viewData = [
            'jobs' => $jobs,
        ];

        return \Response::view('Feed.trovit', $viewData)->header('Content-Type', 'text/xml; charset=utf-8');
    }
}