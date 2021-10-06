<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    //Table Name
    protected $table = 'orderitems';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
