<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', Field::TEXT, [
                'rules' => 'required|string|min:2|max:255'
            ])
            ->add('last_name', Field::TEXT, [
                'rules' => 'required|string|min:2|max:255'
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'nullable|string|min:20|max:500'
            ])
            ->add('birthdate', Field::DATE, [
                'rules' => 'nullable|date'
            ])
            ->add('email', Field::EMAIL, [
                'rules' => 'required|email|max:255'
            ])
            ->add('password', Field::PASSWORD, [
                'rules' => 'required'
            ])
            ->add('url_facebook', Field::TEXT, [
                'rules' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z0-9_\-\.]+\/?'
            ])
            ->add('url_instagram', Field::TEXT, [
                'rules' => 'nullable|url|regex:/https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)'
            ])
            ->add('url_twitter', Field::TEXT, [
                'rules' => 'nullable|url|regex:/http(s)?:\/\/(.*\.)?twitter\.com\/[A-z0-9_]+\/?',
            ])
            ->add('url_linkedin', Field::TEXT, [
                'rules' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?',
            ])
            ->add('url_website', Field::TEXT, [
                'rules' => 'nullable|url',
            ]);
    }
}
