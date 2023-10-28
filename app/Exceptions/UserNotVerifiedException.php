<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;

class UserNotVerifiedException extends AuthorizationException
{
    public function __construct()
    {
        parent::__construct('L\'utilisateur n\'est pas vérifié.');

        $this->code = 422;
    }

    public function render($request)
    {
        return view('exceptions.403');
    }
}
