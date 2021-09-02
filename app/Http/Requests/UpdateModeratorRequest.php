<?php

namespace  App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Gate;


class UpdateModeratorRequest extends FormRequest
{

    private $id;

    public function __construct()
    {
        $this->id = request()->id;
    }
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

            'edit_email_' . $this->id            =>  "required|string|email|unique:users,email," . $this->id,
            'edit_brn_' . $this->id              =>  'sometimes|nullable|string',
            'edit_active_' . $this->id           =>  'required|in:0,1',
            'edit_name_en_' . $this->id          =>  'required|string',
            'edit_name_ar_' . $this->id          =>  'sometimes|nullable|string',
            'edit_description_en_' . $this->id   =>  'nullable|sometimes|string',
            'edit_description_ar_' . $this->id   =>  'nullable|sometimes|string',
            'edit_image_' . $this->id            =>  'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
            'edit_nationality_id_' . $this->id   =>  'required|integer|exists:countries,id',
            'edit_team_id_' . $this->id          =>  ['sometimes', 'nullable' , Rule::exists('teams', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            'edit_phone_' . $this->id            =>  'required||string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'edit_cell_' . $this->id             => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'edit_staff_fax_' . $this->id        => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            'edit_address_' . $this->id          => 'sometimes|nullable|string',
            'edit_zip_' . $this->id              => 'sometimes|nullable|numeric',
            'edit_skype_' . $this->id            => 'sometimes|nullable|string|email',
            'edit_whatsapp_' . $this->id         => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

        ];
    }

    public function messages()
    {

        return [
            'edit_email_' . $this->id . '.required'              =>  trans('moderator.email_required'),
            'edit_email_' . $this->id . '.string'                =>  trans('moderator.email_string'),
            'edit_email_' . $this->id . '.email'                 =>  trans('moderator.email_valid'),
            'edit_email_' . $this->id . '.unique'                =>  trans('moderator.email_unique'),
            'edit_brn_' . $this->id . '.string'                  =>  trans('moderator.brn_string'),
            'edit_active_' . $this->id . '.required'             =>  trans('moderator.active_required'),
            'edit_active_' . $this->id . '.in'                   =>  trans('moderator.active_in'),
            'edit_name_en_' . $this->id . '.required'              =>  trans('moderator.name_en_required'),
            'edit_name_en_' . $this->id . '.string'                =>  trans('moderator.name_en_string'),

            'edit_name_ar_' . $this->id . '.string'                =>  trans('moderator.name_ar_string'),

            'edit_description_en_' . $this->id . '.string'   => trans('moderator.description_en_string'),
            'edit_description_ar_' . $this->id . '.string'   => trans('moderator.description_ar__string'),


            'edit_image_' . $this->id . '.image'            => trans('moderator.image_not_image'),
            'edit_image_' . $this->id . '.mimes'            => trans('moderator.image_not_valid_ext'),
            'edit_image_' . $this->id . '.max'              => trans('moderator.image_max'),


            'edit_nationality_id_' . $this->id . '.required'  => trans('moderator.nationality_required'),
            'edit_team_id_' . $this->id . '.exists'          => trans('moderator.team_exists'),

            'edit_country_code_' . $this->id . '.required'     => trans('moderator.country_code_required'),
            'edit_country_code_' . $this->id . '.string'       =>  trans('moderator.country_code_string'),
            'edit_country_code_' . $this->id . '.regex'        =>  trans('moderator.country_code_regex'),
            'edit_country_code_' . $this->id . '.exists'        =>  trans('moderator.country_code_exists'),

            'edit_city_code_' . $this->id . '.required'        => trans('moderator.city_code_required'),
            'edit_city_code_' . $this->id . '.string'          =>  trans('moderator.city_code_string'),
            'edit_city_code_' . $this->id . '.regex'           =>  trans('moderator.city_code_regex'),
            'edit_phone_' . $this->id . '.required'            => trans('moderator.phone_required'),
            'edit_phone_' . $this->id . '.string'              => trans('moderator.phone_string'),
            'edit_phone_' . $this->id . '.regex'               => trans('moderator.phone_regex'),

            'edit_cell_code_' . $this->id . '.string'       => trans('moderator.cell_code_string'),
            'edit_cell_code_' . $this->id . '.regex'       => trans('moderator.cell_code_regex'),
            'edit_cell_' . $this->id    . '.string'         => trans('moderator.cell_string'),
            'edit_cell_' . $this->id    . '.string'         => trans('moderator.cell_regex'),

            'edit_fax_country_code_' . $this->id . '.string'     => trans('moderator.fax_country_code_string'),
            'edit_fax_country_code_' . $this->id . '.regex'     => trans('moderator.fax_country_code_regex'),


            'edit_fax_city_code_' . $this->id . '.string'       => trans('moderator.fax_city_code_string'),
            'edit_fax_city_code_' . $this->id . '.regex'       => trans('moderator.fax_city_code_regex'),


            'edit_staff_fax_' . $this->id . '.string'       => trans('moderator.staff_fax_string'),
            'edit_staff_fax_' . $this->id . '.regex'       => trans('moderator.staff_fax_regex'),



            'edit_address_' . $this->id . '.string'       => trans('moderator.address_string'),

            'edit_zip_' . $this->id . '.string'       => trans('moderator.zip_string'),

            'edit_skype_' . $this->id . '.string'       => trans('moderator.skype_string'),

            'edit_skype_' . $this->id . '.email'       => trans('moderator.skype_email'),


            'edit_whatsapp_' . $this->id . '.string'       => trans('moderator.whatsapp_string'),
            'edit_whatsapp_' . $this->id . '.regex'          => trans('moderator.whatsapp_regex'),



        ];
    }
}
