<?php

namespace App\Http\Requests;

use ArondeParon\RequestSanitizer\Sanitizers\TrimDuplicateSpaces;
use ArondeParon\RequestSanitizer\Traits\SanitizesInputs;
use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
{
    use SanitizesInputs;

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
        switch ($this->method()) {
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|string|min:2|max:255',
                    'description' => 'nullable|string|min:2|max:500'
                ];
            case 'PUT':
                return [
                    'name' => 'required|string|min:2|max:255',
                    'description' => 'nullable|string|min:2|max:500'
                ];
            default:
                return [];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('website.fields.name.validations.required'),
            'name.string' => trans('website.fields.name.validations.string'),
            'name.min' => trans('website.fields.name.validations.min'),
            'name.max' => trans('website.fields.name.validations.max'),
            'description.nullable' => trans('website.fields.description.validations.nullable'),
            'description.string' => trans('website.fields.description.validations.string'),
            'description.min' => trans('website.fields.description.validations.min'),
            'description.max' => trans('website.fields.description.validations.max'),
        ];
    }

    /**
     * Inputs modification rules
     *
     * @var array
     */
    protected $sanitizers = [
        'name' => [
            TrimDuplicateSpaces::class
        ],
        'description' => [
            TrimDuplicateSpaces::class
        ]
    ];
}
