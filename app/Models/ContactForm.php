<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
       
    protected $table = 'contact_form_messages';


    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'order_number',
        'message',
    ];
}
