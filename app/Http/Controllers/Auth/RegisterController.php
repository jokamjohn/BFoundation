<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\YouthEmailVerification;
use App\Notifications\YouthWelcome;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/youth/job/opportunities';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'birthDate' => 'required|date',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'birthDate' => $data['birthDate'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        //Add a profile to a user.
        $user->profile()->save(new Profile());

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        flash()->overlay('Successful', 'Please verify your email by clicking the link, sent to your email');

        $user->notify(new YouthEmailVerification($user->token));

        return redirect()->route('verify.email');
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

            flash()->info('Oopos', 'This link expired');

            return redirect()->route('login');
        }

        flash()->success('Verified', 'Your email has been verified, you can login');

        Auth::login($user);

        $user->notify(new YouthWelcome($user));

        return redirect($this->redirectPath());
    }

    /**Get view with verification info
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verify()
    {
        return view('auth.verify');
    }

}
