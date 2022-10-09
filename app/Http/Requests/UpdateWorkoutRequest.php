<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutRequest extends FormRequest
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
            'exercises'               => ['required'],
            'exercises.*.exercise_id' => ['required', 'integer'],
            'exercises.*.weight'      => ['required', 'integer'],
            'exercises.*.rpe'         => ['required', 'integer'],
        ];
    }
}
