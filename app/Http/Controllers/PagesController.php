<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='BookS';
        return view('pages.index', compact('title'));
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
}
