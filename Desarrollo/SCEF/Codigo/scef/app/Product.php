<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'slug', 'name', 'description', 'status', 'image', 'price', 'qty', 'promo'
  ];
}
