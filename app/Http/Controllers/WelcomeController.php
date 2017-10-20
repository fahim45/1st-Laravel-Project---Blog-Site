<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $blogs = Blog::where('publication_status', 1)->paginate(2);
        return view('front.home.home-content', ['blogs'=>$blogs]);
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
