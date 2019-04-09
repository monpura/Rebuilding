<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$title = 'Welcome to Nano Star Appliance';
    	return view('pages.index')->with('title', $title);
    }

    public function about(){
    	$title = 'About Nano Star Appliance';
    	return view('pages.about')->with('title', $title);
    }

    public function services(){
     	$data = array(
     		'title' => 'Nano Star Appliance Services',
     		'services' => ['Web Design', 'Programming', 'SEO']
     	);
    	return view('pages.services')->with($data);
    }        
}
