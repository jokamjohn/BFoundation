<?php

namespace App\Http\Controllers\Backend\Employer;

use App\Category;
use App\Http\Controllers\Controller;
use Bluecollar\Command\CommandBus;
use Bluecollar\Training\TrainingPublishedCommand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * TrainingController constructor.
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
        $trainings = Auth::user()->trainings->where('date', '>=', Carbon::now());

        return view('employer.backend.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('name', 'id');

        return view('employer.backend.training.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $command = new TrainingPublishedCommand($request->get('title'), $request->get('phoneNumber'), $request->get('contactName'), $request->get('venue'), $request->get('location'), $request->get('description'), $request->get('date'), $request->get('category'), $request->get('organisation'));

        $this->commandBus->execute($command);

        return redirect()->route('training.index');
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
