<?php namespace App\Http\Controllers;

use Redirect;
use Request;
use phpEmpregos\Job\Job;
use phpEmpregos\Job\JobRepository;

class JobController extends Controller
{
    /**
     * @var JobRepository
     */
    protected $jobRepo;
    
    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }
    
    public function index()
    {
        $page = (int) Request::input('p');
        $q    = strip_tags(Request::input('q'));
        
        if ($page < 1) {
            $page = 1;
        }

        $params = [
            'limit' => 5,
            'page'  => $page,
            'q'     => $q
        ];
        
        $jobs   = $this->jobRepo->search($params);
        $pages  = $params['pages'];
        $aPages = paginate($page, $pages, 1, 4);

        $viewData = [
            'title' => 'Pesquisar Vagas PHP',
            'sTerm' => $q,
            'jobs'  => $jobs,
            'pages' => $aPages, 
            'page'  => $params['page'],
            'total' => $params['total']
        ];

        return $this->makeView($viewData);
    }
    
    public function show($slug)
    {
        if (!$id = get_slug_id($slug)) {
            return Redirect::to(route('pesquisar.vagas'), 301);
        }
        
        try {
            $job = $this->jobRepo->find($id);
            
            if (Job::STATUS_PUBLISHED != $job->status) {
                throw new Exception();
            }
        } catch (\Exception $ex) {
            return Redirect::to(route('pesquisar.vagas'), 301);
        }
        
        if ($job->location) {
            $sTitle = $job->title . ' :: ' . $job->location;
        } else {
            $sTitle = $job->title;
        }
        
        $viewData = [
            'title' => $sTitle,
            'job'   => $job
        ];
        
        return $this->makeView($viewData);
    }
    
    
    
    public function create()
    {
        $viewData = [
            'title' => 'Cadastrar Vaga PHP'
        ];
        
        return $this->makeView($viewData);
    }
}
