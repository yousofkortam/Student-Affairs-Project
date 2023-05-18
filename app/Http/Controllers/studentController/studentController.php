<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }
}
