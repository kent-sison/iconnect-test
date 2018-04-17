<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Mapper;

class ContactController extends Controller
{
    public function index() {

        Mapper::map(13.5037651, 144.8018674, ['zoom' => 13]);
        Mapper::marker(13.5191651,144.8202148);
        Mapper::marker(13.490344,144.781854);
        Mapper::marker(13.4707195,144.7564119);

        return view('contact.index');
    }

    public function sendContact(Request $request) {

        $this->validate(request(), [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        try {
            \Mail::to($request)->send(new ContactUs($request));
        }
        catch(\Exception $ex) {
            return redirect("/contactus#contact")->with('holder', $ex->getMessage());
        }

        return redirect("/contactus#contact")->with('holder', 'success');
    }
}
