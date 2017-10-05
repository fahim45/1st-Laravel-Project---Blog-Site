<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('front.home.home-content');
    }
    public function support(){
        return view('front.support.support-content');
    }
    public function aboutUs(){
        return view('front.about-us.about-content');
    }
    public function blog(){
        return view('front.blog.blog-content');
    }
    public function contactUs(){
        return view('front.contact-us.contact-content');
    }

}
