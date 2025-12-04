<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {   
        $data = $request->all();
        
        ContactForm::create($data);


        // Refresh the page and show success message
        return back()->with("message","Thank you for contacting us. We will reach out to you as soon as possible. Please keep a look at your emails and your spam folder.");
    }
}
