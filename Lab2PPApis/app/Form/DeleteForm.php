<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DeleteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('id', 'text', [
                'rules' => 'required|min:1'
            ]);
    }
}