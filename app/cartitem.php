<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartitem extends Model
{
    protected $table = 'cartitems';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
