<?php

namespace Mezbilisim\VisitorInfo\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorInfoController extends Controller
{
    public function index()
    {
        return view('visitor-info::visitors');
    }

    public function download()
    {

    }
}
