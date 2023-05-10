<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/add-dept',
        '/add-new-student',
        '/login',
        '/add-new-role',
        '/add-new-doctor',
        '/add-new-course'
    ];
}
