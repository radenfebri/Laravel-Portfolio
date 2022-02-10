<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['nama_kategori', 'slug'];

    protected $hidden = [];

    public function articles()
    {
        return $this->hasMany(Article::class, 'kategori_id');
    }
}
