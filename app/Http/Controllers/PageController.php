<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
public function index(){
     $data="this is database";
	//return view('pages.index')->with("data1","$data");
	return view('pages.index',['data1'=>$data]);
}
	public function index2(){
		
		return view('pages.index2');
		
	}
}
