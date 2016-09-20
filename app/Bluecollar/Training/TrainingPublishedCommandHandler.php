<?php


namespace Bluecollar\Training;


use App\Events\TrainingPublished;
use App\Training;
use App\User;
use Bluecollar\Contracts\CommandHandler;
use Illuminate\Support\Facades\Auth;

class TrainingPublishedCommandHandler implements CommandHandler
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Training
     */
    private $training;

    /**
     * TrainingPublishedCommandHandler constructor.
     * @param User $user
     * @param Training $training
     */
    public function __construct(User $user, Training $training)
    {
        $this->user = $user;
        $this->training = $training;
    }


    /**The handle method every handler class show implement.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $publishedTraining = $this->training->post($command);

        if (Auth::check()){
            $this->user->findOrFail(Auth::id())->trainings()->attach($publishedTraining);
        }

        event(new TrainingPublished($publishedTraining));
    }
}