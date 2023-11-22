<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'worker_id' => 'required|int|exists:workers,id',
            'department_id' => 'required|int|exists:departments,id',
        ];
    }
}
