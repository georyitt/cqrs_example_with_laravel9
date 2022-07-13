<?php

namespace Src\Products\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'price'
    ];
}
