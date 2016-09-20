<?php


namespace Bluecollar\Jobs;


use App\Events\JobPublished;
use App\Job;
use App\User;
use Bluecollar\Contracts\CommandHandler;
use Illuminate\Support\Facades\Auth;

class JobPublishedCommandHandler implements CommandHandler
{
    /**
     * @var Job
     */
    private $job;
    /**
     * @var User
     */
    private $user;

    /**
     * JobPublishedCommandHandler constructor.
     * @param User $user
     * @param Job $job
     */
    public function __construct(User $user, Job $job)
    {
        $this->job = $job;
        $this->user = $user;
    }


    /**The handle method every handler class show implement.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $publishedJob = $this->job->post($command);

        if (Auth::check()) {
            $this->user->findOrFail(Auth::id())->jobs()->attach($publishedJob->id);
        }

        event(new JobPublished($publishedJob));
    }
}