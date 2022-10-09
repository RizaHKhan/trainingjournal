<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'program_id'              => ['required', 'integer'],
            'date'                    => ['required', 'date'],
            'exercises'               => ['required'],
            'exercises.*.exercise_id' => ['required', 'integer'],
            'exercises.*.weight'      => ['required', 'integer'],
            'exercises.*.rpe'         => ['required', 'integer'],
        ];
    }
}
