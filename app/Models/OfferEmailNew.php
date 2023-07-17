<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferEmailNew extends Model
{
  protected $fillable = [
    'email',
    'confirmed',
];
}
