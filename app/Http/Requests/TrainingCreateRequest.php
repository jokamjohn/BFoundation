<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class TrainingCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
            'title' => 'required|max:250',
            'description' => 'required|max:1500',
            'location' => 'required',
            'date' => 'required|after:' . Carbon::today()->toDateString(),
            'phoneNumber' => 'required',
            'contactName' => 'required',
            'organisation' => 'required',
            'category' => 'required',
            'venue' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required',
            'title.max' => 'the title cannot exceed 250 characters',
            'description' => 'Description is required',
            'description.max' => 'Description cannot exceed 1500 characters',
            'location' => 'required',
            'date' => 'The deadline show be after ' . Carbon::today()->toFormattedDateString(),
            'phoneNumber' => 'Contact phone number is required',
            'contactName' => 'The contact name is required',
            'organisation' => 'Organisation name is required',
            'category' => 'The training category is required',
            'venue.required' => 'The training venue is required'
        ];
    }
}
