<?php

namespace  Modules\Agency\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Gate;


class ChangeStaffTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit_team');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "team_id"          => ['required', Rule::exists('teams', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
            "staff_id"          => ['required', Rule::exists('users', 'id')->where(function ($q) {
                $q->where('agency_id', request('agency_id'));
            })],
        ];
    }
}
