<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    //Table Name
    protected $table = 'items';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
