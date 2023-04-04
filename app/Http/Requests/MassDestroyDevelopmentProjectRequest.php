<?php

namespace App\Http\Requests;

use App\Models\DevelopmentProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDevelopmentProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('development_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:development_projects,id',
        ];
    }
}
