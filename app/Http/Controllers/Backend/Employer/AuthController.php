<?php

namespace App\Http\Controllers\Backend\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerLoginRequest;
use App\Http\Requests\EmployerRegisterRequest;
use App\Notifications\EmployerEmailVerification;
use App\User;
use Auth;
use Bluecollar\Traits\Employers\Auth\LoginEmployers;
use Bluecollar\Traits\Employers\Auth\RegisterEmployers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{

    use RegisterEmployers;
    use LoginEmployers;

    protected $redirectPath = '/employer/dashboard';

    /**
     * EmployerAuthController constructor.
     *
     */
    public function __construct()
    {

    }

    /**Show the register form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('employer.auth.register');
    }

    /**Create an employer account in the system.
     *
     * @param EmployerRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $EmployerAuthRequest
     */
    public function postRegister(EmployerRegisterRequest $request)
    {
        $user = $this->createUser($request);

        Auth::login($user);//TODO show note to user to verify mail.

        $user->notify(new EmployerEmailVerification($user->token));

        flash()->success('Sign Up', 'Successfully Signed up');

        return redirect($this->redirectPath);
    }

    /**Login view for employers.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('employer.auth.login');
    }

    /**
     * @param EmployerLoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(EmployerLoginRequest $request)
    {
        return $this->handleUserAuthentication($request);
    }

    /**Confirm the email of the signed up user.
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmEmail($token)
    {

        try {
            $user = User::whereToken($token)->firstOrFail()->confirmEmail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('auth.employer.login');
        }

        flash()->success('Verified', 'Your email has been verified, you can login');
        Auth::login($user);
        return redirect($this->redirectPath);
    }
}
