<?php

namespace App\Http\Requests;

use App\Models\DevelopmentProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDevelopmentProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('development_project_edit');
    }

    public function rules()
    {
        return [
            'remarks' => [
                'string',
                'nullable',
            ],
            'name_of_the_project' => [
                'string',
                'nullable',
            ],
            'starting_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'prodoc' => [
                'array',
            ],
        ];
    }
}
