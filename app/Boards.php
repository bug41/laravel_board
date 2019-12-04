<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    protected $fillable = [
        'email', 'title', 'content','reg_date'
    ];    
    
    /*
    protected $guarded = [];
    */
}
