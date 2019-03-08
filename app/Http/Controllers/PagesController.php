<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Home';
        // return view('pages.index', compact($title));
        return view('pages.index')->with(compact('title'));  
    }

    public function about() {
        $title = 'About Me';
        return view('pages.about')->with(compact('title'));
    }

    public function services() { 
        $title = 'Services';
        return view('pages.services')->with(compact('title'));
    }
}
