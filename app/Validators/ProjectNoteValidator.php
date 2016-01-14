<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/16
 * Time: 10:59
 */

namespace AppLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required'

    ];
}