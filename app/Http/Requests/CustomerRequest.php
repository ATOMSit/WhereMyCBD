<?php

namespace App\Http\Requests;

use ArondeParon\RequestSanitizer\Sanitizers\Capitalize;
use ArondeParon\RequestSanitizer\Sanitizers\Lowercase;
use ArondeParon\RequestSanitizer\Sanitizers\TrimDuplicateSpaces;
use ArondeParon\RequestSanitizer\Sanitizers\Uppercase;
use ArondeParon\RequestSanitizer\Traits\SanitizesInputs;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                    'first_name' => 'required|regex:/^[A-Za-záéíóú -]+$/|min:2|max:100',
                    'last_name' => 'required|regex:/^[A-Za-záéíóú -]+$/|min:2|max:100',
                    'description' => 'nullable|string|min:20|max:500',
                    'birthdate' => 'nullable|date',
                    'email' => 'required|email|max:100|unique:customers,email',
                    'password' => 'required_with:password_confirmation|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
                    'url_facebook' => 'nullable|url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i',
                    'url_instagram' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?instagram\.com\/.+/i',
                    'url_twitter' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?twitter\.com\/.+/i',
                    'url_linkedin' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/.+/i',
                    'url_website' => 'nullable|url'
                ];
            case 'PUT':
                return [
                    'first_name' => 'required|regex:/^[A-Za-záéíóú -]+$/|min:2|max:100',
                    'last_name' => 'required|regex:/^[A-Za-záéíóú -]+$/|min:2|max:100',
                    'description' => 'nullable|string|min:20|max:500',
                    'birthdate' => 'nullable|date',
                    'email' => 'required|email|max:255|unique:customers,email,' . $this->id,
                    'password' => 'required_with:password_confirmation|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
                    'url_facebook' => 'nullable|url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i',
                    'url_instagram' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?instagram\.com\/.+/i',
                    'url_twitter' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?twitter\.com\/.+/i',
                    'url_linkedin' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/.+/i',
                    'url_website' => 'nullable|url'
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
            'first_name.required' => trans('user.fields.first_name.validations.required'),
            'first_name.regex' => trans('user.fields.first_name.validations.regex'),
            'first_name.min' => trans('user.fields.first_name.validations.min'),
            'first_name.max' => trans('user.fields.first_name.validations.max'),
            'last_name.required' => trans('user.fields.last_name.validations.required'),
            'last_name.regex' => trans('user.fields.last_name.validations.regex'),
            'last_name.min' => trans('user.fields.last_name.validations.min'),
            'last_name.max' => trans('user.fields.last_name.validations.max'),
            'description.nullable' => trans('user.fields.description.validations.nullable'),
            'description.string' => trans('user.fields.description.validations.string'),
            'description.min' => trans('user.fields.description.validations.min'),
            'description.max' => trans('user.fields.description.validations.max'),
            'birthdate.nullable' => trans('user.fields.birthdate.validations.nullable'),
            'birthdate.date' => trans('user.fields.birthdate.validations.date'),
            'email.required' => trans('user.fields.email.validations.required'),
            'email.email' => trans('user.fields.email.validations.email'),
            'email.max' => trans('user.fields.email.validations.max'),
            'email.unique' => trans('user.fields.email.validations.unique'),
            'password.required_with' => trans('user.fields.password.validations.required'),
            'password.min' => trans('user.fields.password.validations.min'),
            'password.regex' => trans('user.fields.password.validations.regex'),
            'url_facebook.nullable' => trans('user.fields.url_facebook.validations.nullable'),
            'url_facebook.url' => trans('user.fields.url_facebook.validations.url'),
            'url_facebook.regex' => trans('user.fields.url_facebook.validations.regex'),
            'url_instagram.nullable' => trans('user.fields.url_instagram.validations.nullable'),
            'url_instagram.url' => trans('user.fields.url_instagram.validations.url'),
            'url_instagram.regex' => trans('user.fields.url_instagram.validations.regex'),
            'url_twitter.nullable' => trans('user.fields.url_twitter.validations.nullable'),
            'url_twitter.url' => trans('user.fields.url_twitter.validations.url'),
            'url_twitter.regex' => trans('user.fields.url_twitter.validations.regex'),
            'url_linkedin.nullable' => trans('user.fields.url_linkedin.validations.nullable'),
            'url_linkedin.url' => trans('user.fields.url_linkedin.validations.url'),
            'url_linkedin.regex' => trans('user.fields.url_linkedin.validations.regex'),
            'url_website.nullable' => trans('user.fields.url_website.validations.nullable'),
            'url_website.url' => trans('user.fields.url_website.validations.url')
        ];
    }

    /**
     * Inputs modification rules
     *
     * @var array
     */
    protected $sanitizers = [
        'first_name' => [
            Uppercase::class,
            TrimDuplicateSpaces::class
        ],
        'last_name' => [
            Capitalize::class,
            TrimDuplicateSpaces::class
        ],
        'description' => [
            TrimDuplicateSpaces::class
        ],
        'birthdate' => [

        ],
        'email' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
        'password' => [

        ],
        'url_facebook' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
        'url_instagram' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
        'url_twitter' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
        'url_linkedin' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ],
        'url_website' => [
            Lowercase::class,
            TrimDuplicateSpaces::class
        ]
    ];
}
