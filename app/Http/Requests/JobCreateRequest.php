<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * @param Guard $auth
     * @return bool
     */
    public function authorize(Guard $auth)
    {
        return $auth->user()->employer === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description'=>'required|max:500',
            'category'=>'required',
            'location'=>'required',
            'deadline' => 'required|after:' . Carbon::today()->toDateString(),
            'positions'=>'required|numeric',
            'phoneNumber'=>'required',
            'contactName'=>'required'
        ];
    }
}
