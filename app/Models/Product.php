<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['categorie_id','name','small_description','description','original_price','slug',
    'selling_price','image','qty','tax','status', 'trending','meta_title','meta_keywords','meta_description',];

    protected $hidden = [];

    public function categorieproduct()
    {
        return $this->belongsTo(CategorieProduct::class, 'categorie_id', 'id');
    }
}
