<?php namespace phpEmpregos\Job;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    const STATUS_DRAFT     = 'DRAFT';
    const STATUS_PENDING   = 'PENDING';
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_REJECTED  = 'REJECTED';
    const STATUS_FILLED    = 'FILLED';

    protected $table = 'job';
}