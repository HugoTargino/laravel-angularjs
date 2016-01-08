<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/16
 * Time: 10:59
 */

namespace AppLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];
}