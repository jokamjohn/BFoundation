<?php

namespace App\Http\Controllers\Backend\Employer;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCreateRequest;
use Bluecollar\Command\CommandBus;
use Bluecollar\Jobs\JobPublishedCommand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * @var CommandBus
     */
    private $commandBus;


    /**
     * JobController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->middleware('auth.employer');

        $this->commandBus = $commandBus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Auth::user()->jobs->where('deadline', '>=', Carbon::now());//Get only employer jobs

        return view('employer.backend.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('name', 'id');

        return view('employer.backend.job.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCreateRequest $request)
    {
        $command = new JobPublishedCommand($request->get('title'), $request->get('phoneNumber'), $request->get('contactName'), $request->get('positions'), $request->get('location'), $request->get('description'), $request->get('deadline'), $request->get('category'));

        $this->commandBus->execute($command);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
