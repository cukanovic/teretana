<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainerRequest extends FormRequest
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
        $emailUniqueRule = Rule::unique('users', 'email');
        $passwordIsRequired = true;
        if ($trainer = $this->route('trainer')) {
            $emailUniqueRule->whereNot('id', $trainer->id);
            $passwordIsRequired = false;
        }

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|' . $emailUniqueRule,
            'password' => 'string|min:5|' . ($passwordIsRequired ? 'required' : 'nullable'),
        ];
    }
}
