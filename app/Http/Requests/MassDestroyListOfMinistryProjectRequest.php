<?php

namespace App\Http\Requests;

use App\Models\ListOfMinistryProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyListOfMinistryProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('list_of_ministry_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:list_of_ministry_projects,id',
        ];
    }
}
