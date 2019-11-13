<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create() {
        return view('contact.create');
    }

    public function store() {
        $data = $this->validateRequest();

        Mail::to('test@test.com')->send(new ContactFormMail($data));
        return redirect("/contact");
   
    }
    

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    }
}
