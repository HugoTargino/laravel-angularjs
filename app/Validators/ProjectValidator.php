<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/16
 * Time: 10:59
 */

namespace AppLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required'
    ];
}