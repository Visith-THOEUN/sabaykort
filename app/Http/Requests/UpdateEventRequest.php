<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Symfony\Component\HttpFoundation\Response;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('event.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'detail' => ['required'],
            'group_id' => ['required'],
            'event_date' => ['required'],
            'khqr_khr' => ['nullable', File::types(['jpg', 'jpeg', 'png'])],
            'khqr_usd' => ['nullable', File::types(['jpg', 'jpeg', 'png'])],
        ];
    }
}
