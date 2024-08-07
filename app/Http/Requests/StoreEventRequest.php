<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class StoreEventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(  ): array
    {
        $id = $this->route('id');
        return [
            'title' => [  'required', 'max:255', 'min:3', $id
                ? Rule::unique('events','title')->ignore($id)
                : Rule::unique('events','title') ],
            'begin_datetime' => 'required|date_format:Y-m-d\TH:i',
            'duration' => 'required',
            'formal'=> 'nullable',
            'category_id'=>'required|array|exists:categories,id'
        ];
    }
}
