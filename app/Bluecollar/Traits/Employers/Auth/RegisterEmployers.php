<?php

namespace Bluecollar\Traits\Employers\Auth;



use App\User;
use Illuminate\Http\Request;
use Validator;

trait RegisterEmployers
{
    /**Validate the request parameters.
     *
     * @param Request $request
     */
    protected function validateRegistrationCredentials(Request $request)
    {
        Validator::make($request->all(), [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'birthDate' => 'required|date',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**Create a new employer account in the database.
     *
     * @param Request $request
     */
    protected function createUser(Request $request)
    {
        return User::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'birthDate' => $request['birthDate'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'employer' => 1
        ]);
    }
}