<?php

namespace App\Http\Controllers\pagesController;

use App\Http\Controllers\Controller;

class pagesController extends Controller
{
    public function loginPage()
    {
        return View('login');
    }
}
