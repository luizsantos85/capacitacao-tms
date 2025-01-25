<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('panel.index', compact('user'));
    }
}
