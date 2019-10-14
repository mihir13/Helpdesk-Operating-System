<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

class NewFormController extends Controller
{
   public function index()
   {
	return view ('pages/ProblemForm');
   }	
}
