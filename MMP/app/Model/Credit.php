<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credits';
    protected $fillable = ['name','orderID','address','phone','card_number'];
}
