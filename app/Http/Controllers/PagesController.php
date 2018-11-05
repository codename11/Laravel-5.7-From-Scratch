<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        $tasks = [
            "Go to the store", 
            "Go to the market", 
            "Go to work",
            "Go to concerto"
        ];

        return view('welcome')->withTasks($tasks);
    }

    public function about(){
        return view('about');
    }
    
    public function contact(){
        return view('contact');
    }

}
