<?php namespace phpEmpregos\Job;

interface JobRepository
{
    /**
     * @param int $id
     * @return Job
     */
    public function find($id);

    /**
     * @param int $count
     * @return Job[]
     */
    public function getRecent($count = 5);

    /**
     * @param string $externalLink
     * @return Job
     */
    public function findByExternalLink($externalLink);

    /**
     * @param Job $job
     * @return void
     */
    public function save(Job $job);

    /**
     * @param array $params
     * @return Job[]
     */
    public function search(&$params);
}