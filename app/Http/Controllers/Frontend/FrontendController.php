<?php

namespace App\Http\Controllers\Frontend;

use App\Job;
use App\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobs()
    {
        $jobs = Job::with('employer')->where('deadline', '>=', Carbon::now())->paginate();

        return view('frontend.job.index', compact('jobs'));
    }

    public function job($slug)
    {
        $jobs = Job::with(['employer', 'category'])->where('deadline', '>=', Carbon::now())->whereSlug($slug)->get();

        return view('frontend.job.show', compact('jobs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trainings()
    {
        $trainings = Training::with([ 'trainer', 'category'])->where('date', '>=', Carbon::now())->paginate();

        return view('frontend.training.index', compact('trainings'));
    }

    public function training($slug)
    {
        $trainings = Training::with(['trainer', 'category'])->where('date', '>=', Carbon::now())->whereSlug($slug)->get();

        return view('frontend.training.show', compact('trainings'));
    }


}
