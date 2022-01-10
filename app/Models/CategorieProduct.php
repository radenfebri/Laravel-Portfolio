<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduct extends Model
{
    use HasFactory;

    protected $table = 'categorie_products';

    protected $fillable = ['name', 'slug', 'description', 'status', 'popular',
    'image','meta_title', 'meta_descrip', 'meta_keywords'];

    protected $hidden = [];

}
