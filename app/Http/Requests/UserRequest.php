<?php

namespace App\Http\Requests;

use ArondeParon\RequestSanitizer\Sanitizers\Capitalize;
use ArondeParon\RequestSanitizer\Sanitizers\Lowercase;
use ArondeParon\RequestSanitizer\Sanitizers\TrimDuplicateSpaces;
use ArondeParon\RequestSanitizer\Sanitizers\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use ArondeParon\RequestSanitizer\Traits\SanitizesInputs;

class UserRequest extends FormRequest
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
                    'first_name' => 'required|string|min:2|max:255',
                    'last_name' => 'required|string|min:2|max:255',
                    'description' => 'nullable|string|min:20|max:500',
                    'birthdate' => 'nullable|date',
                    'email' => 'required|email|max:255|unique:users,email',
                    'email_verified_at' => 'nullable|datetime',
                    'password' => 'required',
                    'url_facebook' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z0-9_\-\.]+\/?',
                    'url_instagram' => 'nullable|url|regex:/https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)',
                    'url_twitter' => 'nullable|url|regex:/http(s)?:\/\/(.*\.)?twitter\.com\/[A-z0-9_]+\/?',
                    'url_linkedin' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?',
                    'url_website' => 'nullable|url'
                ];
            case 'PUT':
                return [
                    'first_name' => 'required|string|min:2|max:255',
                    'last_name' => 'required|string|min:2|max:255',
                    'description' => 'nullable|string|min:20|max:500',
                    'birthdate' => 'nullable|date',
                    'email' => 'required|email|max:255|unique:users,email,' . $this->id,
                    'email_verified_at' => 'nullable|datetime',
                    'password' => 'required',
                    'url_facebook' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z0-9_\-\.]+\/?',
                    'url_instagram' => 'nullable|url|regex:/https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)',
                    'url_twitter' => 'nullable|url|regex:/http(s)?:\/\/(.*\.)?twitter\.com\/[A-z0-9_]+\/?',
                    'url_linkedin' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?',
                    'url_website' => 'nullable|url'
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
            'first_name.required' => 'A title is required',
            'first_name.string' => 'A title is required',
            'first_name.min' => 'A title is required',
            'first_name.max' => 'A title is required',

            'last_name.required' => 'A title is required',
            'last_name.string' => 'A title is required',
            'last_name.min' => 'A title is required',
            'last_name.max' => 'A title is required',

            'description.nullable' => '',
            'description.string' => '',
            'description.min' => '',
            'description.max' => '',

            'birthdate.nullable' => '',
            'birthdate.date' => '',

            'email.required' => '',
            'email.email' => '',
            'email.max' => '',
            'email.unique' => '',

            'password.required' => '',

            'url_facebook.nullable' => '',
            'url_facebook.url' => '',
            'url_facebook.regex' => '',

            'url_instagram.nullable' => '',
            'url_instagram.url' => '',
            'url_instagram.regex' => '',

            'url_twitter.nullable' => '',
            'url_twitter.url' => '',
            'url_twitter.regex' => '',

            'url_linkedin.nullable' => '',
            'url_linkedin.url' => '',
            'url_linkedin.regex' => '',

            'url_website.nullable' => '',
            'url_website.url' => ''
        ];
    }

    /**
     * Inputs modification rules
     *
     * @var array
     */
    protected $sanitizers = [
        'first_name' => [
            Capitalize::class,
            TrimDuplicateSpaces::class
        ],
        'last_name' => [
            Uppercase::class,
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
