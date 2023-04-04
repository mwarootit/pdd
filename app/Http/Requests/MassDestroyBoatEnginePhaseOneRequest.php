<?php

namespace App\Http\Requests;

use App\Models\BoatEnginePhaseOne;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBoatEnginePhaseOneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('boat_engine_phase_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:boat_engine_phase_ones,id',
        ];
    }
}
