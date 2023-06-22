<?php

namespace App\Http\Interfaces;

use App\Models\Job;

interface JobInterface
{
    //save new job to database
    public function createJob(array $data) : Job;

    //get one single job or null return value
    public function getJob(int $id) : Job|NULL;

    //get all job entries in table
    public function getAllJobs();
}