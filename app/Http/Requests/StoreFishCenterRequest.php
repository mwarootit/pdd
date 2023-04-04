<?php

namespace App\Http\Requests;

use App\Models\FishCenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFishCenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fish_center_create');
    }

    public function rules()
    {
        return [
            'island' => [
                'string',
                'nullable',
            ],
            'date_of_recieval' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'item' => [
                'string',
                'nullable',
            ],
            'quantity' => [
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
