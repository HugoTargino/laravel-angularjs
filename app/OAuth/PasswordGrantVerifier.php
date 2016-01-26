<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/01/16
 * Time: 18:10
 */

namespace AppLaravel\OAuth;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}