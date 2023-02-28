<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewExaminationRequest extends FormRequest
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
            'exam_title' => ['required', Rule::unique('examinations', 'title')],
            'exam_course' => ['required', Rule::exists('courses', 'id')],
            'exam_date' => ['required'],
            'exam_start_time' => ['required'],
            'exam_stop_time' => ['required'],
        ];
    }
}
