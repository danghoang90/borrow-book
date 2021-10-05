<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller implements BaseInterface
{
    function index() {
        return view('layouts.dashboard');
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function destroy($id)
    {
        // TODO: Implement delete() method.
    }
}
