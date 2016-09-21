<?php

namespace App\Http\Controllers\Backend\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerLoginRequest;
use App\Http\Requests\EmployerRegisterRequest;
use App\Notifications\EmployerEmailVerification;
use App\Notifications\EmployerWelcome;
use App\User;
use Auth;
use Bluecollar\Traits\Employers\Auth\LoginEmployers;
use Bluecollar\Traits\Employers\Auth\RegisterEmployers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
        $this->middleware('guest.employer',[ 'only' => ['register','login','verify']]);
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

        $user->notify(new EmployerEmailVerification($user->token));

        flash()->success('Sign Up', 'Successfully Signed up');

        return redirect()->route('employer.verify.email');
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

        $user->notify(new EmployerWelcome($user));

        return redirect($this->redirectPath);
    }

    /**Show verification note to a new registered partner.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verify()
    {
        return view('employer.auth.verify');
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/employer/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
