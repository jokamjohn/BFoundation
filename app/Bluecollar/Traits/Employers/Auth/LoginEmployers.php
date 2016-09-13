<?php


namespace Bluecollar\Traits\Employers\Auth;


use App\User;
use Auth;
use Illuminate\Http\Request;

trait LoginEmployers
{

//    /**Validate the email and password of the employer.
//     *
//     * @param Request $request
//     */
//    protected function validateLoginCredentials(Request $request)
//    {
//        Validator::make($request->only('email', 'password'),
//            ['email' => 'required|email', 'password' => 'required'],
//            ['email.required' => 'Email is required',
//                'email.email' => 'Please enter a validate email',
//                'password.required' => 'Password is required']);
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function handleUserAuthentication(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $remember = $request->get('remember');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'employer' => 1, 'verified' => true], $remember)) {

            return redirect($this->redirectPath);

        } elseif (User::whereEmail($email)->exists()){
            return redirect()->back()
                ->withErrors(['email' => 'Please check your email for the verification link to verify your account and be able to login.']);
        } else {
            return redirect()->back()
                ->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
}