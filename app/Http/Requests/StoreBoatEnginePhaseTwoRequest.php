<?php

namespace App\Http\Requests;

use App\Models\BoatEnginePhaseTwo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBoatEnginePhaseTwoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('boat_engine_phase_two_create');
    }

    public function rules()
    {
        return [
            'date_of_receival' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'island' => [
                'string',
                'nullable',
            ],
            'no_of_share' => [
                'string',
                'nullable',
            ],
            'ward' => [
                'string',
                'nullable',
            ],
            'recipients' => [
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
