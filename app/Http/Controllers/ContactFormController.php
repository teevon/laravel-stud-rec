<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function create() {
        return view('contact.create');
    }

    public function store() {
        dd($this->validateRequest());
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    }
}
