<?php

namespace  App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Gate;


class CreateModeratorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return owner();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'email'            =>  'required|string|email|unique:users,email',
            'brn'              =>  'sometimes|nullable|string',
            'active'           =>  'required|in:0,1',
            'name_en'          =>  'required|string',
            'name_ar'          =>  'sometimes|nullable|string',
            'description_en'   =>  'nullable|sometimes|string',
            'description_ar'   =>  'nullable|sometimes|string',
            'image'            =>  'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
            'nationality_id'   =>  'required|integer|exists:countries,id',
            'phone'            =>  'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'cell'             => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'staff_fax'        => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'address'          => 'sometimes|nullable|string',
            'zip'              => 'sometimes|nullable|numeric',
            'skype'            => 'sometimes|nullable|string|email',
            'whatsapp'         => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',


            'password'         => 'required|confirmed|min:6',
            'agency_id'        => 'required|integer|exists:agencies,id',
            'business_id'      => 'required|integer|exists:businesses,id',

            "team_id"          => ['sometimes', 'nullable' , Rule::exists('teams', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
        ];
    }
}
