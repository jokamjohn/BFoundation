<?php

namespace App\Http\Controllers\Backend\Youth;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * ProfileController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $email
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $user = $this->profile($email);

        return view('user.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $email
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $user = $this->profile($email);

        return view('user.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        $user = $this->profile($email);

        $data = $request->only('country', 'region', 'gender', 'district', 'address', 'phoneNumber', 'skills');

        $user->profile->fill($data)->save();

        flash()->success('Profile', 'Successfully Updated');

        return redirect()->route('profile.show', $request->user()->email);
    }

    /**
     * @param $email
     * @return mixed
     */
    private function profile($email)
    {
        $user = $this->user->with(['profile'])->whereEmail($email)->firstOrFail();

        if (empty($user)) {
            return "No profile";
        }
        return $user;
    }
}
