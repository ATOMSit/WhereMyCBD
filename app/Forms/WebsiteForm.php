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
                'rules' => 'required|string|min:2|max:255'
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'nullable|string|min:20|max:500'
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}
