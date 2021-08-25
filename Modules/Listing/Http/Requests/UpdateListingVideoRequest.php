<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Listing\Rules\ComareArrayCount;

class UpdateListingVideoRequest extends FormRequest
{


    protected function prepareForValidation()
    {
        $this->merge([
            'video_title' => json_decode($this->input('video_title'), true),
            'video_link' => json_decode($this->input('video_link'), true),
            'video_host' => json_decode($this->input('video_host'), true),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "video_title"                             => ['required', 'array', 'present', new ComareArrayCount($this->video_link, $this->video_host)],
            "video_link"                              => ['required', 'array', 'present'],
            "video_host"                              => ['required', 'array', 'present'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit_listing');
    }
}