<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table    = "Newsletters";
    protected $fillable = [
        'email', 
    ];
}
