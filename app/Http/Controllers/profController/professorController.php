<?php

namespace App\Http\Controllers\profController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class professorController extends Controller
{
    public function __construct() {
        $this->middleware('professor');
    }
}
