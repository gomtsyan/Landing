<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactUs';
    protected $fillable = ['name', 'value'];
}
