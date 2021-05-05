<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|email',
            'brn'      =>  'nullable|sometimes|string',
            'name_en'      =>  'required|string',
            'name_ar'      =>  'nullable|sometimes|string',
            'description_en'      =>  'nullable|sometimes|string',
            'description_ar'      =>  'nullable|sometimes|string',
            'image'             =>  'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
            'nationality_id'             =>  'required|integer|exists:countries,id',
            'remove_image'             =>  'required|integer',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
