<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class WebsiteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'nullable|string|min:20|max:500'
            ])
            ->add('offer', Field::SELECT, [
                'choices' => [
                    'ecommerce' => 'ECommerce',
                    'premium' => 'Premium',
                    'blog' => 'Blog'
                ],
            ])
            ->add('renewal', Field::SELECT, [
                'choices' => [
                    'automatic' => 'Automatique',
                    'manual' => 'Manuel',
                ],
            ])
            ->add('hostname', 'form', [
                'class' => HostnameForm::class,
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}
