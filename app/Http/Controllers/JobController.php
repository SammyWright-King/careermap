<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Repositories\JobRepository;
use App\Http\Requests\JobRequest;
// use Illuminate\Http\Request;

class JobController extends Controller
{

    protected $job_repository;

    public function __construct(JobRepository $jobRepository) 
    {
        $this->job_repository = $jobRepository;
    }

    //get all jobs
    public function getAll()
    {
        $jobs = $this->job_repository->getAllJobs();
        return response()->json(['jobs' => $jobs]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobs.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $data = $request->except(['_token']);
        $job = $this->job_repository->createJob($data);

        if($job instanceOf Job) {
            return response()->json(['message' => 'Job entry saved successfully']);
        }else {
            return response()->json(['error' => 'Job entry could not be saved!!']);
        }
    }

     //get single job
     public function getOne($job)
     {
        $job = $this->job_repository->getJob($job);
         
        if($job instanceOf Job) {
            return response()->json(['job' => $job]);
        }else {
            return response()->json(['error' => 'Job entry could not be saved!!']);
        }
     }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.single');
    }

}
