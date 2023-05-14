<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable =['name','price','img','created_at','updated_at','category'];
    protected $hidden = ['created_at','updated_at','category'];

}
