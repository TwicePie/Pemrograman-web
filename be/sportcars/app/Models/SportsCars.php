<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsCars extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'brand', 'price', 'image_url', 'stock'];
}
