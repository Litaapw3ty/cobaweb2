<?php

namespace App\Config;

use Myth\Auth\Config\Validation as MythValidation;

class Validation extends MythValidation
{
    /**
     * --------------------------------------------------------------------
     * Rule Sets
     * --------------------------------------------------------------------
     */
    public array $ruleSets = [
        \CodeIgniter\Validation\Rules::class,
        \CodeIgniter\Validation\FormatRules::class,
        \CodeIgniter\Validation\FileRules::class,
        \CodeIgniter\Validation\CreditCardRules::class,
    ];

    /**
     * --------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    /**
     * --------------------------------------------------------------------
     * Myth Auth – Registration Rules (OPTIONAL, tapi rapi)
     * --------------------------------------------------------------------
     */
    public array $registrationRules = [
        'username' => 'required|min_length[3]|max_length[30]',
        'email'    => 'required|valid_email',
    ];
}
