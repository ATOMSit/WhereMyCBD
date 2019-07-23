<?php

namespace App\Forms\AuthForms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', Field::TEXT, [
                'rules' => 'required|email|min:2|max:255'
            ])
            ->add('password', Field::PASSWORD, [
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}