<?php

namespace App\Http\Requests;

use ArondeParon\RequestSanitizer\Sanitizers\Lowercase;
use ArondeParon\RequestSanitizer\Sanitizers\TrimDuplicateSpaces;
use ArondeParon\RequestSanitizer\Traits\SanitizesInputs;
use Illuminate\Foundation\Http\FormRequest;

class HostnameRequest extends FormRequest
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
                    'fqdn' => 'required|fqdn|max:100|unique:hostnames,fqdn'
                ];
            case 'PUT':
                return [
                    'fqdn' => 'required|fqdn|max:100|unique:hostnames,fqdn,' . $this->id,
                ];
            default:
                break;
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
            'fqdn.required' => trans('hostname.fields.fqdn.validations.required'),
            'fqdn.fqdn' => trans('hostname.fields.fqdn.validations.fqdn'),
            'fqdn.max' => trans('hostname.fields.fqdn.validations.max'),
            'fqdn.unique' => trans('hostname.fields.fqdn.validations.unique')
        ];
    }

    /**
     * Inputs modification rules
     *
     * @var array
     */
    protected $sanitizers = [
        'fqdn' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
    ];
}