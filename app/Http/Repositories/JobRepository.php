<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\JobInterface;
use App\Models\Job;

class JobRepository implements JobInterface
{
    /**
     * create new job entry into jobs table
     */
    public function createJob(array $data) : Job 
    {
        $new_job = Job::firstOrCreate($data);
        return $new_job;
    }

    /**
     * find job with id or return null
     */
    public function getJob(int $id) : Job|NULL 
    {
        $job = Job::find($id);
        return $job;
    }

    /**
     * fetch all jobs in table
     */
    public function getAllJobs() 
    {
        return Job::latest()->get();
    }
}