<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', Field::TEXT, [
                'label' => trans('customer.fields.first_name.label'),
                'rules' => 'required|string|min:2|max:255',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('last_name', Field::TEXT, [
                'label' => trans('customer.fields.last_name.label'),
                'rules' => 'required|string|min:2|max:255',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => trans('customer.fields.description.label'),
                'rules' => 'nullable|string|min:20|max:500'
            ])
            ->add('birthdate', Field::DATE, [
                'label' => trans('customer.fields.birthdate.label'),
                'rules' => 'nullable|date',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('email', Field::EMAIL, [
                'label' => trans('customer.fields.email.label'),
                'rules' => 'required|email|max:255',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('password', Field::PASSWORD, [
                'label' => trans('customer.fields.password.label'),
                'rules' => 'required'
            ])
            ->add('url_facebook', Field::TEXT, [
                'label' => trans('customer.fields.url_facebook.label'),
                'rules' => 'nullable|url|regex:/http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z0-9_\-\.]+\/?',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('url_instagram', Field::TEXT, [
                'label' => trans('customer.fields.url_instagram.label'),
                'rules' => 'nullable|url|regex:/https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('url_twitter', Field::TEXT, [
                'label' => trans('customer.fields.url_twitter.label'),
                'rules' => 'nullable|url|regex:/http(s)?:\/\/(.*\.)?twitter\.com\/[A-z0-9_]+\/?',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('url_linkedin', Field::TEXT, [
                'label' => trans('customer.fields.url_linkedin.label'),
                'rules' => 'nullable|url|regex:/http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('url_website', Field::TEXT, [
                'label' => trans('customer.fields.url_website.label'),
                'rules' => 'nullable|url',
                'template' => 'application.layouts.fields.text',
                'description' => null
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => trans('customer.fields.submit.label')
            ]);
    }
}