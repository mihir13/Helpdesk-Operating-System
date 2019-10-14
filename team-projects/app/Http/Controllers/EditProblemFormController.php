<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

class EditProblemFormController extends Controller
{
    public function index($id)
    {
      return view('pages/EditProblemForm', ['id' => $id]);
    }	 
}
