<?php namespace phpEmpregos\Job;

use \DB;

class EloquentJobRepository implements JobRepository
{
    public function __construct()
    {

    }

    public function find($id)
    {
        return Job::find($id);
    }

    public function getRecent($count = 5)
    {
        $select = Job::where('status', '=', 'PUBLISHED')
            ->orderBy('published_at', 'desc');

        if ($count) {
            $select->take($count);
        }

        return $select->get();
    }

    public function findByExternalLink($externalLink)
    {
        return Job::where('external_link', $externalLink)->first();
    }

    public function save(Job $job)
    {
        $job->save();
    }

    public function search(&$params)
    {
        $limit = $params['limit'];
        $page  = $params['page' ];
        $q     = $params['q'    ];

        $where = '';
        $bind  = [];

        if ($q) {
            $q = "%{$q}%";

            $where = "
                and (
                    id                 like :q
                    or title           like :q
                    or location        like :q
                    or description     like :q
                    or advertiser_name like :q
                    or advertiser_url  like :q
                )
            ";

            $bind = [':q' => $q];
        }

        $sql = "
            select
                count(*) as total
            from
                job j
            where
                j.status = '" . JOB::STATUS_PUBLISHED . "'
                {$where}
        ";

        $total = DB::selectOne($sql, $bind)->total;

        $params['pages'] = ceil($total / $limit);
        $params['total'] = $total;

        if ($page > $params['pages']) {
            $page = 1;
            $params['page'] = 1;
        }

        $offset = ($limit * $page) - $limit;

        $sql = "
            select
                *
            from
                job j
            where
                j.status = '" . JOB::STATUS_PUBLISHED . "'
                {$where}
            order by
                published_at desc,
                created_at desc
            limit
                {$offset}, {$limit}
        ";

        $jobs = DB::select($sql, $bind);

        return $jobs;
    }
}