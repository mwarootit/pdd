<?php

namespace App\Http\Requests;

use App\Models\BoatEnginePhaseTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBoatEnginePhaseTwoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('boat_engine_phase_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:boat_engine_phase_twos,id',
        ];
    }
}
