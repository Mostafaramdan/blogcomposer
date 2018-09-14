<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;

class contactUscontroller extends Controller
{
public function contact(){
	
	return view('pages.contact');
}
	public function dosend(Request $request){
	
$this->validate($request, [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|min:10',
]);	
				
$name=$request->input('name');	
$email=$request->input('email');	
$subject=$request->input('subject');	
	$Contact = new contactUs($name,$email,$subject);
		
		//Mail::to('mostafaramdan5544@gmail.com')->send($Contact);
	
	return redirect('/contactUs')->with('success','message sent succefully');
	
	}
	

}
