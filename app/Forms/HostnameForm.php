<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class HostnameForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('fqdn', Field::TEXT);
    }
}