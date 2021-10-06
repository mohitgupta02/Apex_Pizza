<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //Table Name
    protected $table = 'categories';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
