<?php

namespace App\Http\Requests;

use App\Models\ListOfMinistryProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListOfMinistryProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_of_ministry_project_edit');
    }

    public function rules()
    {
        return [
            'name_of_the_project' => [
                'string',
                'nullable',
            ],
            'island' => [
                'string',
                'nullable',
            ],
            'date_of_implementation' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'budget' => [
                'string',
                'nullable',
            ],
            'location_village' => [
                'string',
                'nullable',
            ],
            'recipients' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'date_of_monitoring' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
