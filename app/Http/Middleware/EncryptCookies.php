<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    protected function decryptCookie($name, $cookie)
    {
        return parent::decryptCookie($name, is_array($cookie) ? $cookie : urldecode($cookie));
    }
}
