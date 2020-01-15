<?php

namespace App\Http\Requests;

use App\Trainer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'price' => 'required|integer|max:32000|min:0',
            'number_of_sessions' => 'required|integer|max:32000|min:0',
            'difficulty' => 'required|in:easy,medium,hard,insane',
            'trainer_id' => 'required|integer|bail|' .
                Rule::exists('users', 'id')
                    ->where('type', Trainer::TYPE_TRAINER)
        ];
    }
}
