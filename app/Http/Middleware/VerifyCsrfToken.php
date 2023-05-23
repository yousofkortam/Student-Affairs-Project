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
        '/admin/add-dept',
        '/admin/add-new-student',
        '/admin/login',
        '/admin/add-new-role',
        '/admin/add-new-doctor',
        '/admin/add-new-course',
        '/admin/active-courses-register',
        '/admin/deactive-courses-register',
        '/student/canregister/{id}',
        '/admin/student/{id}/edit',
        '/admin/professor/{id}/edit',
        '/courses/{id}/add-lecture',
        '/student/register',
        '/professor/courses/student/mark',
        '/login',
    ];
}
