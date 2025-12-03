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

        return back();
    }
}
