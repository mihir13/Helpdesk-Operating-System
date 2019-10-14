<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

class ExitNewFormNoSaveController extends Controller
{
    public function index()
    {
	return view('pages/splash');
    }
}
