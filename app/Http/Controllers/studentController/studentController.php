<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

}
