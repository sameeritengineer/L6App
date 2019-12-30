<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
    	$data = ['name'=>'sameer ahmad','age'=>30];
        return view('welcome',compact('data'));
    }
}
