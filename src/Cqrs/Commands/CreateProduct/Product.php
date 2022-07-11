<?php

namespace Src\Cqrs\Commands\CreateProduct;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'price'
    ];
}
