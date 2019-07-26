<?php

namespace App\Forms\AuthForms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class RegisterForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', Field::TEXT, [
            ])
            ->add('last_name', Field::TEXT, [
            ])
            ->add('email', Field::TEXT, [
            ])
            ->add('url_instagram', Field::TEXT)
            ->add('password', Field::PASSWORD)
            ->add('password_confirmation', Field::PASSWORD)
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}